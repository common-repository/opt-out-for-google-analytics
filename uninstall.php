<?php

    /**
     * Fired when the plugin is uninstalled.
     *
     * When populating this file, consider the following flow
     * of control:
     *
     * - This method should be static
     * - Check if the $_REQUEST content actually is the plugin name
     * - Run an admin referrer check to make sure it goes through authentication
     * - Verify the output of $_GET makes sense
     * - Repeat with other user roles. Best directly by using the links/query string parameters.
     * - Repeat things for multisite. Once for a single site in the network, once sitewide.
     *
     */

    // If uninstall not called from WordPress, then exit.
    defined( 'WP_UNINSTALL_PLUGIN' ) || die;

    require_once __DIR__ . DIRECTORY_SEPARATOR . 'constants.php';
    require_once GAOO_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'utils.class.php';

    if ( GAOO_Utils::get_option( 'uninstall_keep_data' ) != 'on' ) { // User decided to keept the data after uninstall.
        global $wpdb;

        $blogids = array( false );

        if ( is_network_admin() && is_multisite() ) {
            $old_blog = $wpdb->blogid;
            $blogids  = $wpdb->get_col( "SELECT blog_id FROM {$wpdb->blogs}" );
        }

        foreach ( $blogids as $blog_id ) {

            if ( $blog_id ) {
                switch_to_blog( $blog_id );
            }

            // Remove all options
            $wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->options} WHERE option_name LIKE %s", $wpdb->esc_like( '_transient_' . GAOO_PREFIX ) . '%' ) );
            $wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->options} WHERE option_name LIKE %s", $wpdb->esc_like( GAOO_PREFIX ) . '%' ) );
            $wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->usermeta} WHERE meta_name LIKE %s", $wpdb->esc_like( GAOO_PREFIX ) . '%' ) );

            // Optimize DB
            $wpdb->query( "OPTIMIZE TABLE $wpdb->options" );
            $wpdb->query( "OPTIMIZE TABLE $wpdb->usermeta" );
        }

        if ( $blog_id ) {
            switch_to_blog( $old_blog );
        }

        // remove the languages files
        $language_files = glob( WP_CONTENT_DIR . DIRECTORY_SEPARATOR . 'languages' . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . GAOO_PLUGIN_NAME . '-*' );

        if ( ! empty( $language_files ) ) {
            array_walk( $language_files, function ( $file ) {
                unlink( $file );
            } );
        }
    }

    delete_option( GAOO_PREFIX . 'promotion_off' );