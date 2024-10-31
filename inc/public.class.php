<?php

    // If this file is called directly, abort.
    defined( 'WPINC' ) || die;

    class GAOO_Public {

        private $csstidy;

        /**
         * GAOO_Public constructor.
         */
        public function __construct() {
            add_action( 'wp_head', array(
                $this,
                'head_script'
            ), -1 );

            add_action( 'wp_enqueue_scripts', array(
                $this,
                'enqueue_scripts'
            ) );

            add_shortcode( 'ga_optout', array(
                $this,
                'shortcode'
            ) );

            if ( has_filter( 'widget_text', 'do_shortcode' ) !== false ) {
                add_filter( 'widget_text', 'do_shortcode' );
            }

            $this->csstidy = new csstidy();
            $this->csstidy->load_template( 'highest_compression' );
        }

        /**
         * Enqueue scripts and styles for the public pages.
         */
        public function enqueue_scripts() {
            $min = SCRIPT_DEBUG ? '' : '.min';

            wp_register_script( 'gaoo-public', GAOO_PLUGIN_URL . '/assets/public' . $min . '.js', array(), false, true );
        }

        /**
         * Handle the shortcode.
         *
         * @return string HTML code or empty string on error.
         */
        public function shortcode() {
            $form_data = GAOO_Utils::get_options();
            $ua_code   = GAOO_Utils::get_code( $form_data[ 'ga_plugin' ], $form_data[ 'ua_code' ] );

            // Disable shortcode if status is deactivated or set to manual but empty UA-Code
            if ( $form_data[ 'status' ] == 'off' || empty( $ua_code ) ) {
                return '';
            }

            $current_status = isset( $_COOKIE[ 'ga-disable-' . $ua_code ] ) && $_COOKIE[ 'ga-disable-' . $ua_code ] == true ? 'activate' : 'deactivate';
            $json_data      = GAOO_Utils::get_json( $form_data, $ua_code );

            if ( empty( $json_data ) ) {
                return '';
            }

            wp_localize_script( 'gaoo-public', 'gaoo_data', $json_data );
            wp_enqueue_script( 'gaoo-public' );

            do_action( 'gaoo_before_shortcode', $ua_code, $current_status );

            $html = '<a href="javascript:gaoo_handle_optout();" id="gaoo-link" class="gaoo-link-' . esc_attr( $current_status ) . '">' . esc_html( $json_data[ "link_" . $current_status ] ) . '</a>';

            if ( ! empty( $form_data[ 'custom_css' ] ) && $this->csstidy->parse( $form_data[ 'custom_css' ] ) ) {
                $html .= '<style type="text/css">' . $this->csstidy->print->plain() . '</style>';
            }

            do_action( 'gaoo_after_shortcode', $ua_code, $current_status );

            return $html;
        }

        /**
         * Adds the GA Opt-Out code to the header.
         */
        public function head_script() {
            $form_data = GAOO_Utils::get_options();
            $ua_code   = GAOO_Utils::get_code( $form_data[ 'ga_plugin' ], $form_data[ 'ua_code' ] );

            do_action( 'gaoo_before_head_script', $ua_code );

            if ( $form_data[ 'status' ] == 'on' && ! empty( $ua_code ) ) {
                echo "<script>var disableStr = 'ga-disable-{$ua_code}'; if (document.cookie.indexOf(disableStr + '=true') > -1) { window[disableStr] = true; }</script>";
            }

            if ( ! empty( $form_data[ 'tracking_code' ] ) ) {
                echo preg_replace( '/\s+/', ' ', stripslashes( $form_data[ 'tracking_code' ] ) );
            }

            do_action( 'gaoo_after_head_script', $ua_code );
        }

    }