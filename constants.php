<?php
    // If this file is called directly, abort.
    defined( 'WPINC' ) || die;

    // Define global paths
    defined( 'GAOO_PLUGIN_NAME' ) || define( 'GAOO_PLUGIN_NAME', trim( dirname( plugin_basename( __FILE__ ) ), DIRECTORY_SEPARATOR ) );
    defined( 'GAOO_PLUGIN_DIR' ) || define( 'GAOO_PLUGIN_DIR', WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . GAOO_PLUGIN_NAME );
    defined( 'GAOO_PLUGIN_URL' ) || define( 'GAOO_PLUGIN_URL', WP_PLUGIN_URL . DIRECTORY_SEPARATOR . GAOO_PLUGIN_NAME );
    defined( 'GAOO_PREFIX' ) || define( 'GAOO_PREFIX', '_gaoo_' );
    defined( 'GAOO_VERSION' ) || define( 'GAOO_VERSION', '2.3' );
    defined( 'GAOO_SHORTCODE' ) || define( 'GAOO_SHORTCODE', '[ga_optout]' );
    defined( 'GAOO_CAPABILITY' ) || define( 'GAOO_CAPABILITY', 'manage_options' );
    defined( 'GAOO_CRONJOB' ) || define( 'GAOO_CRONJOB', 'gaoo_cronjob' );