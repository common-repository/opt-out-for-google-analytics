<?php
    /*
     * Plugin Name: Opt-Out for Google Analytics (DSGVO / GDPR)
     * Plugin URI: https://www.schweizersolutions.com/?utm_source=wordpress&utm_medium=plugin&utm_campaign=plugin_uri
     * Description: Adds the possibility for the user to opt out from Google Analytics. The user will not be tracked by Google Analytics on this site until he allows it again, clears his cookies or uses a different browser.
     * Version: 2.3
     * Author: Schweizer Solutions GmbH
     * Author URI: https://www.schweizersolutions.com/?utm_source=wordpress&utm_medium=plugin&utm_campaign=author_uri
     * License: GPL-2.0+
     * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
     */

    // If this file is called directly, abort.
    defined( 'WPINC' ) || die;

    require_once __DIR__ . DIRECTORY_SEPARATOR . 'constants.php';

    require_once GAOO_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'utils.class.php';
    include_once GAOO_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'activator.class.php';
    include_once GAOO_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'deactivator.class.php';

    // Add custom schedules for the cronjob
    add_filter( 'cron_schedules', array( new GAOO_Utils(), 'add_cron_schedules' ), 9999 );

    register_activation_hook( __FILE__, array( 'GAOO_Activator', 'init' ) );
    register_deactivation_hook( __FILE__, array( 'GAOO_Deactivator', 'init' ) );

    Class GAOO {
        /**
         * Handling the start of the plugin
         */
        public function init() {
            $this->load_dependencies();
            $this->run();
        }

        /**
         * Load all classes.
         */
        public function load_dependencies() {
            require_once GAOO_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'singleton.class.php';
            require_once GAOO_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'messages.class.php';

            require_once GAOO_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'csstidy' . DIRECTORY_SEPARATOR . 'class.csstidy.php';

            include_once GAOO_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'promo.class.php';
            include_once GAOO_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'admin.class.php';
            include_once GAOO_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'public.class.php';
        }

        /**
         * Runs initialisation of the plugin
         */
        public function run() {
            // Load translations
            defined( 'GAOO_LOCALE' ) || define( 'GAOO_LOCALE', determine_locale() );

            // Starts Classes
            new GAOO_Admin();
            new GAOO_Public();

            // Load activator for MU support
            add_action( 'wpmu_new_blog', array( new GAOO_Activator, 'new_blog' ) );
        }

        /**
         * Redirect to setting page, if plugin got activated.
         *
         * @param string $plugin Activated plugin
         */
        public function activated_plugin( $plugin ) {
            if ( isset( $_REQUEST[ 'action' ] ) && $_REQUEST[ 'action' ] == 'activate' && $plugin == plugin_basename( __FILE__ ) ) {
                exit( wp_redirect( esc_url( admin_url( 'options-general.php?page=gaoo' ) ) ) );
            }
        }
    }

    // Start the plugin.
    $gaoo = new GAOO();

    add_action( 'init', array( $gaoo, 'init' ) );
    add_action( 'activated_plugin', array( $gaoo, 'activated_plugin' ) );