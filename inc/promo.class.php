<?php

    // If this file is called directly, abort.
    defined( 'WPINC' ) || die;

    /**
     * Class GAOO_Promo Handling the promotion.
     */
    class GAOO_Promo {

        /**
         * @var string $option_key_off Option name to store status
         */
        private static $option_key_off = GAOO_PREFIX . 'promotion_off';

        /**
         * @var string $transient_key_cache Transient name for API cached data
         */
        private static $transient_key_cache = GAOO_PREFIX . 'data_cache';

        /**
         * @var string $transient_key_notices Transient name for showing admin notices or not
         */
        private static $transient_key_notices = GAOO_PREFIX . 'admin_notices_cache';

        /**
         * @var string $url The URL for the API
         */
        private static $url = 'https://www.schweizersolutions.com/wordpress.org/?p=opt-out-for-google-analytics';

        /**
         * Enable the promotion box.
         *
         * @return bool
         */
        public static function enable() {
            return delete_option( self::$option_key_off );
        }

        /**
         * Check if promotion box is enabled.
         *
         * @return bool
         */
        public static function is_enabled() {
            return empty( get_option( self::$option_key_off, 0 ) );
        }

        /**
         * Disable the promotion box.
         *
         * @return bool
         */
        public static function disable() {
            return update_option( self::$option_key_off, 1 );
        }

        /**
         * Clear cache for API response data.
         *
         * @return bool
         */
        public static function clear_cache() {
            return delete_transient( self::$transient_key_cache ) && delete_transient( self::$transient_key_notices );
        }

        /**
         * Render admin notices in WP admin.
         */
        public static function render_admin_notice() {
            if ( get_transient( self::$transient_key_notices ) !== false ) {
                return;
            }

            $data = self::get_data();

            if ( ! empty( $data[ 'promo' ] ) ) {
                foreach ( $data[ 'promo' ] as $promo ) {
                    if ( ! empty( $promo[ 'hide_if_active' ] ) && is_array( $promo[ 'hide_if_active' ] ) && self::should_hide( $promo[ 'hide_if_active' ] ) ) {
                        continue;
                    }

                    echo '<div class="notice notice-info is-dismissible">' . $promo[ 'notice' ] . '</div>';
                }

                set_transient( self::$transient_key_notices, time(), MONTH_IN_SECONDS * 3 );
            }
        }

        /**
         * Check if specific plugin is activated, to hide promo.
         *
         * @param array $plugins Array with plugins which should be checked.
         *
         * @return bool True if at least one plugin is active, otherwise false.
         */
        public static function should_hide( $plugins ) {
            if ( empty( $plugins ) || ! is_array( $plugins ) ) {
                return false;
            }

            $active_plugins = (array) get_option( 'active_plugins' );

            return ! empty( array_intersect( $plugins, $active_plugins ) );
        }

        /**
         * Render the promotion box.
         *
         * @param bool $pinned_only Render only the promotion which is pinned. (Default: false)
         * @param bool $echo Echo or return the HTML code. (Default: false)
         * @param bool $popup Render the promotion in a popup box (Default: false)
         *
         * @return string HTML code on success, otherwise empty string.
         */
        public static function render( $pinned_only = false, $echo = false, $popup = false ) {
            $template = '';
            $data     = self::get_data();

            if ( is_array( $data ) ) {

                $data[ 'popup' ] = $popup;

                if ( $pinned_only ) {
                    $key = array_search( true, array_column( $data[ 'promo' ], 'pinned' ) );

                    if ( $key === false ) {
                        unset( $data[ 'promo' ] );
                    }
                    else {
                        $data[ 'promo' ] = array( $data[ 'promo' ][ $key ] );
                    }
                }

                if ( ! empty( $data[ 'promo' ] ) ) {
                    ob_start();

                    extract( $data, EXTR_SKIP );

                    require( GAOO_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'promotion.php' );

                    $template = ob_get_contents();

                    if ( $template === false ) {
                        $template = '';
                    }

                    @ob_end_clean();
                }
            }

            if ( ! $echo ) {
                return $template;
            }

            echo $template;
        }

        /**
         * Get the data from the promotion API. The returned data will be cached for one hour.
         *
         * @return bool|mixed|string|null
         */
        public static function get_data() {
            $body = get_transient( self::$transient_key_cache );

            if ( $body === false ) {
                $lng = strstr( GAOO_LOCALE, '_', true );

                if ( empty( $lng ) ) {
                    $lng = 'en';
                }

                $body    = '';
                $request = wp_remote_get( add_query_arg( 'lng', $lng, self::$url ), array( 'sslverify' => false ) );

                if ( is_wp_error( $request ) ) {
                    return false;
                }

                if ( wp_remote_retrieve_response_code( $request ) == 200 ) {
                    $body = wp_remote_retrieve_body( $request );
                    $body = json_decode( $body, true );

                    if ( json_last_error() !== JSON_ERROR_NONE ) {
                        $body = '';
                    }

                    set_transient( self::$transient_key_cache, $body, HOUR_IN_SECONDS );
                }
            }

            return empty( $body ) ? null : $body;
        }

        /**
         * Get all promotion links with text.
         *
         * @return array|null Array with links, otherwise null.
         */
        public static function get_links() {
            $data = self::get_data();

            if ( empty( $data[ 'promo' ] ) ) {
                return null;
            }

            $data = array_filter( $data['promo'], function ( $arr ) {
                if ( ! empty( $arr[ 'hide_if_active' ] ) && is_array( $arr[ 'hide_if_active' ] ) && GAOO_Promo::should_hide( $arr[ 'hide_if_active' ] ) ) {

                    return false;
                }

                return isset( $arr[ 'link_text' ] );
            } );

            $data = GAOO_Utils::get_array_columns( $data, array(
                'link',
                'link_text'
            ) );

            return empty( $data ) ? null : $data;
        }

    }