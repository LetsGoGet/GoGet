<?php

namespace GoGetForums;

/**
 * Plugin Name: GoGet - Forum
 */

if (!class_exists('GoGetForums')) {
    class GoGetForums
    {
        /**
         * @var string
         */
        public  $version = '0.1.0';

        /**
         * Initiate the class
         *
         * @package GoGetForums
         * @since 0.1.0
         */
        public function __construct()
        {
            $this->load_constants();
            add_action('init', array($this, 'includes'), 4);
        }

        /**
         * Include files needed by GoGetForum
         *
         * @package GoGetForum
         * @since 0.1.0-dev
         */
        public function includes()
        {
            require_once GOGETFORUMS_INCLUDES_PATH . 'forum-assets.php';

            /** forum classes
             *  Important: These classes has to be required before post.php to prevent "class not found exception"
             */
            require_once GOGETFORUMS_INCLUDES_PATH . '/forums/forum.php';
            require_once GOGETFORUMS_INCLUDES_PATH . '/forums/interview_experience.php';
            require_once GOGETFORUMS_INCLUDES_PATH . '/forums/work_experience.php';

            /** validators */
            require_once GOGETFORUMS_INCLUDES_PATH . '/validators/validator.php';
            require_once GOGETFORUMS_INCLUDES_PATH . '/validators/interview_experience_val.php';
            require_once GOGETFORUMS_INCLUDES_PATH . '/validators/work_experience_val.php';

            /** posts */
            require_once GOGETFORUMS_INCLUDES_PATH . 'post.php';

            /** api */
            require_once GOGETFORUMS_INCLUDES_PATH . 'api/live-search.php';

            /**
             * component classes
             */
            require_once GOGETFORUMS_INCLUDES_PATH . 'component_function.php';
        }


        /**
         * Defines constants needed throughout the plugin.
         *
         * @package GoGetForums
         * @since 0.1.0-dev
         */
        public function load_constants()
        {
            /**
             * Define the plugin version
             */
            define('GOGETFORUMS_VERSION', $this->version);

            if (!defined('GOGETFORUMS_PLUGIN_URL')) {
                /**
                 * Define the plugin url
                 */
                define('GOGETFORUMS_PLUGIN_URL', plugins_url('/', __FILE__));
            }
            if (!defined('GOGETFORUMS_INSTALL_PATH')) {
                /**
                 * Define the install path
                 */
                define('GOGETFORUMS_INSTALL_PATH', dirname(__FILE__) . '/');
            }
            if (!defined('GOGETFORUMS_INCLUDES_PATH')) {
                /**
                 * Define the include path
                 */
                define('GOGETFORUMS_INCLUDES_PATH', GOGETFORUMS_INSTALL_PATH . 'includes/');
            }
            if (!defined('GOGETFORUMS_TEMPLATE_PATH')) {
                /**
                 * Define the template path
                 */
                define('GOGETFORUMS_TEMPLATE_PATH', GOGETFORUMS_INSTALL_PATH . 'templates/');
            }
            if (!defined('GOGETFORUMS_ASSETS')) {
                /**
                 * Define the template path
                 */
                define('GOGETFORUMS_ASSETS', plugins_url('assets/', __FILE__));
            }
            if (!defined('GOGETFORUMS_FORM_PREFIX')) {
                /**
                 * Define the plugin url
                 */
                define('GOGETFORUMS_FORM_PREFIX', 'goget_');
            }
        }
    }

    function activate_gogetforum_at_plugin_loader()
    {
        // Init BuddyForms.
        $GLOBALS['gogetforums'] = new GoGetForums();

        // Maybe init other service in the future
    }

    activate_gogetforum_at_plugin_loader();
}
