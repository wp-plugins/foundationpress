<?php
/**
 * FoundationPress - Foundation CSS for WordPress
 *
 * @author Abid Omar
 * @version 0.0.1
 * @package Main
 */
/*
 Plugin Name: FoundationPress
 Plugin URI: http://costartpress.com
 Description: FoundationPress gives you the Foundation CSS framework styles in WordPress
 Author: Abid Omar
 Author URI: http://omarabid.com
 Version: 0.0.1
 Text Domain: wp-fp
 License: GPLv3
*/
if (!class_exists('wp_fp')) {
    /**
     * FoundationPress Starter Class
     *
     * This is the plug-in Backbone class. This class is used to Initialize,
     * Install, Activate, Deactivate and Uninstall the plug-in.
     */
    class wp_fp
    {
        /**
         * Plugin version
         * @var string
         */
        public $version = "0.0.1";

        /**
         * Minimal WordPress version required
         * @var string
         */
        public $wp_version = "3.5";

        function __construct()
        {
            //
            // 1. Check plugin requirements
            //
            if (!$this->check_requirements()) {
                return;
            }

            //
            // 2. Define constants and load dependencies
            //
            $this->define_constants();
            $this->load_dependencies();

            //
            // 3. Activation hooks
            //
            register_activation_hook(__FILE__, array(&$this, 'activate'));
            register_deactivation_hook(__FILE__, array(&$this, 'deactivate'));
            register_uninstall_hook(__FILE__, 'wp_fp::uninstall');

            //
            // 4. i18n
            //
            add_action('init', array(&$this, 'i18n'));

            //
            // 5. Load Bootstrap files
            //
            add_action('wp_enqueue_scripts', array(&$this, 'load_foundation'));


            //
            // 6. Run the plugin!
            //
            add_action('plugins_loaded', array(&$this, 'start'));
        }

        /**
         * Checks that the WordPress setup meets the plugin requirements
         * @global string $wp_version
         * @return boolean
         */
        private function check_requirements()
        {
            global $wp_version;
            if (!version_compare($wp_version, $this->wp_version, '>=')) {
                add_action('admin_notices', 'wp_fp::display_req_notice');
                return false;
            }
            return true;
        }

        /**
         * Display the requirement notice
         * @static
         */
        static function display_req_notice()
        {
            global $wp_fp;
            echo '<div id="message" class="error"><p><strong>';
            echo __('Sorry, BootstrapPress re requires WordPress ' . $wp_fp->wp_version . ' or higher.
            Please upgrade your WordPress setup', 'wp-fp');
            echo '</strong></p></div>';
        }

        /**
         * Define Global Constants for the plug-in
         */
        private function define_constants()
        {
            /* [foundationpress/plugin.php] */
            define('FP_BASENAME', plugin_basename(__FILE__));
            /* [/devl/dev/wp-content/plugins/foundationpress] */
            define('FP_DIR', dirname(__FILE__));
            /* [bootstrappress] */
            define('FP_FOLDER', plugin_basename(dirname(__FILE__)));
            /* [/devl/dev/wp-content/plugins/foundationpress/] */
            define('FP_ABSPATH', trailingslashit(str_replace("\\", "/", WP_PLUGIN_DIR . '/' . plugin_basename(dirname(__FILE__)))));
            /* [http://bootstrappress.com/dev/wp-content/plugins/foundationpress/] */
            define('FP_URLPATH', trailingslashit(WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__))));
            /* [http://bootstrappress.com/dev/wp-admin/] */
            define('FP_ADMINPATH', get_admin_url());
        }

        /**
         * Load required files for the plug-in
         */
        private function load_dependencies()
        {
            // Admin Panel
            if (is_admin()) {
            }
            // Front-End Site
            require_once('shortcodes/sc.php');
        }

        /**
         * Activate the plugin
         */
        public function activate()
        {

        }

        /**
         * Deactivate the plugin
         */
        public function deactivate()
        {

        }

        /**
         * First time activation
         */
        public function install()
        {

        }

        /**
         * Uninstall the plugin
         */
        static function uninstall()
        {

        }

        /**
         * Plugin Internationalization
         */
        public function i18n()
        {
            load_plugin_textdomain('wp-fp', false, basename(dirname(__FILE__)) . '/lang/');
        }

        /**
         * Load Bootstrap files
         */
        public function load_foundation()
        {
            wp_enqueue_script('fp-modernizr', FP_URLPATH . 'client/js/modernizr.js', array('jquery'));
            wp_enqueue_script('fp-core', FP_URLPATH . 'client/js/foundation.js', array('fp-modernizr'));
            wp_enqueue_script('fp-app', FP_URLPATH . 'client/js/app.js', array('fp-core'));
            wp_enqueue_style('bs-core', FP_URLPATH . 'client/css/foundation.css');
        }

        /**
         * Run the plugin!
         */
        public function start()
        {
            // Uncomment these lines to prevent WordPress from
            // automatically adding <br> and <p> to posts
            //remove_filter('the_content', 'wpautop');
            //remove_filter('the_excerpt', 'wpautop');
        }

    }
}

$wp_fp = new wp_fp();