<?php

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

if ( ! class_exists( 'GAOO_Deactivator' ) ):
	class GAOO_Deactivator {
		/**
		 * Init the deactivation of this plugin, with multisite support.
		 *
		 * @global wpdb $wpdb        WordPress database abstraction object.
		 *
		 * @param bool $network_wide Activation is network wide or not
		 */
		public static function init( $network_wide ) {
			// Check if action is triggered by proper page.
			check_admin_referer( 'deactivate-plugin_' . ( isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '' ) );

			global $wpdb;

			// Run the deactivation with multisite support.
			if ( is_multisite() && $network_wide ) {
				$old_blog = $wpdb->blogid;
				$blogids  = $wpdb->get_col( "SELECT blog_id FROM {$wpdb->blogs}" );

				foreach ( $blogids as $blog_id ) {
					switch_to_blog( $blog_id );
					self::deactivate();
				}

				switch_to_blog( $old_blog );

				return;
			}

			// Run activation on single site install.
			self::deactivate();
		}

		/**
		 * Run the plugin deactivation.
		 */
		public static function deactivate() {
			GAOO_Utils::stop_cronjob();
		}
	}

endif;