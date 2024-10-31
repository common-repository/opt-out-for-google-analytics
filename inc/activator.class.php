<?php

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

if ( ! class_exists( 'GAOO_Activator' ) ):
	class GAOO_Activator {
		/**
		 * Init the activation of this plugin, with multisite support.
		 *
		 * @global wpdb $wpdb        WordPress database abstraction object.
		 *
		 * @param bool $network_wide Activation is network wide or not
		 */
		public static function init( $network_wide ) {
			global $wpdb;

			// Checks if user has permission do activate plugin
			if ( ! current_user_can( 'activate_plugins' ) ) {
				return;
			}

			self::check_dependencies();

			// Run the activation with multisite support.
			if ( is_multisite() && $network_wide ) {
				$old_blog = $wpdb->blogid;
				$blogids  = $wpdb->get_col( "SELECT blog_id FROM {$wpdb->blogs}" );

				foreach ( $blogids as $blog_id ) {
					switch_to_blog( $blog_id );
					self::activate();
				}

				switch_to_blog( $old_blog );

				return;
			}

			// Run activation on single site install.
			self::activate();
		}

		/**
		 * Checks if all dependencies for this plugin.
		 * If not matched, the plugin will not be activated.
		 *
		 * @since 1.0
		 *
		 * @global string $wp_version Current version of WordPress.
		 * @global wpdb $wpdb         WordPress database abstraction object.
		 *
		 * @param string $phpv        Mandatory PHP version. (Default: 7.0)
		 * @param string $wpv         Mandatory WordPress version. (Default: 4.0)
		 * @param string $dbv         Mandatory Database version. (Default: 5.6)
		 */
		public static function check_dependencies( $phpv = '7.0', $wpv = '4.0', $dbv = '5.6' ) {
			global $wp_version, $wpdb;

			// Check the installed PHP version.
			if ( version_compare( PHP_VERSION, $phpv, '<' ) ) {
				$text = esc_html__( 'This plugin can not be activated because it requires a PHP version greater than %1$s. Your PHP version can be updated by your hosting company.', 'opt-out-for-google-analytics' );
				deactivate_plugins( basename( __FILE__ ) );
				wp_die( '<p>' . sprintf( $text, $phpv ) . '</p> <a href="' . admin_url( 'plugins.php' ) . '">' . esc_html__( 'Go back', 'opt-out-for-google-analytics' ) . '</a>' );
			}

			// Check the installed WordPress version.
			if ( version_compare( $wp_version, $wpv, '<' ) ) {
				$text = esc_html__( 'This plugin can not be activated because it requires a WordPress version greater than %1$s. Please go to Dashboard &#9656; Updates to gran the latest version of WordPress.', 'opt-out-for-google-analytics' );
				deactivate_plugins( basename( __FILE__ ) );
				wp_die( '<p>' . sprintf( $text, $wpv ) . '</p> <a href="' . admin_url( 'plugins.php' ) . '">' . esc_html__( 'Go back', 'opt-out-for-google-analytics' ) . '</a>' );
			}

			// Check the installed Database version.
			$mysql_version = $wpdb->get_var( "SELECT @@version;" );

			if ( ! is_null( $mysql_version ) && version_compare( strtok( $mysql_version, '-' ), $dbv, '<' ) ) {
				$text = esc_html__( 'This plugin can not be activated because it requires a Database version greater than %1$s. Your Database version can be updated by your hosting company.', 'opt-out-for-google-analytics' );
				deactivate_plugins( basename( __FILE__ ) );
				wp_die( '<p>' . sprintf( $text, $dbv ) . '</p> <a href="' . admin_url( 'plugins.php' ) . '">' . esc_html__( 'Go back', 'opt-out-for-google-analytics' ) . '</a>' );
			}
		}

		/**
		 * Run the plugin activation.
		 *
		 * @since 1.0
		 */
		public static function activate() {
			GAOO_Utils::start_cronjob( true );
		}

		/**
		 * Run the activation if a new blog created on multisite.
		 *
		 * @since 1.0
		 *
		 * @param int $blog_id ID of the blog.
		 */
		public function new_blog( $blog_id ) {
			// Run only if plugin is activated network-wide
			if ( ! is_plugin_active_for_network( plugin_basename( dirname( __DIR__ ) ) . DIRECTORY_SEPARATOR . GAOO_PLUGIN_NAME . '.php' ) ) {
				return;
			}

			$old_blog = get_current_blog_id();

			switch_to_blog( $blog_id );
			self::activate();
			switch_to_blog( $old_blog );
		}

		/**
		 * Compare to versions.
		 *
		 * @param string $ver1    1st version number to compare
		 * @param string $ver2    2nd version number to compare
		 * @param string $compare How to compare versions (Conditions: >, <, >=, <=, ==, >=)
		 *
		 * @return bool True if matched, otherwiese false.
		 */
		public static function version_compare( $ver1, $ver2, $compare = '<' ) {
			$ver1 = rtrim( str_replace( '.', '', $ver1 ), '0' );
			$ver2 = rtrim( str_replace( '.', '', $ver2 ), '0' );

			if ( $compare == '>' && $ver1 > $ver2 ) {
				return true;
			} elseif ( $compare == '<' && $ver1 < $ver2 ) {
				return true;
			} elseif ( $compare == '>=' && $ver1 >= $ver2 ) {
				return true;
			} elseif ( $compare == '<=' && $ver1 <= $ver2 ) {
				return true;
			} elseif ( $compare == '==' && $ver1 == $ver2 ) {
				return true;
			} elseif ( $compare == '!=' && $ver1 != $ver2 ) {
				return true;
			} else {
				return false;
			}
		}
	}

endif;