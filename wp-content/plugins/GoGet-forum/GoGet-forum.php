<?php

/**
 * Plugin Name: GoGet - Forum
 */

if ( !class_exists( 'GoGetForums' ) ) {
    class GoGetForums {
        /**
         * @var string
         */
        public  $version = '0.1.0' ;

        /**
         * Initiate the class
         *
         * @package GoGetForums
         * @since 0.1.0-dev
         */
        public function __construct(){
            $this->load_constants();
            error_log("asdf");
            require_once GOGETFORUMS_INCLUDES_PATH . 'forum-assets.php';
            add_action('init', array( $this, 'includes' ), 4);
        }

        /**
         * Include files needed by GoGetForum
         *
         * @package GoGetForum
         * @since 0.1.0-dev
         */
        public function includes()
        {
            error_log("hiiiii");
            require_once GOGETFORUMS_INCLUDES_PATH . 'forum.php';
            require_once GOGETFORUMS_INCLUDES_PATH . 'post.php';
            require_once GOGETFORUMS_INCLUDES_PATH . 'component_function.php';
        }


        /**
         * Defines constants needed throughout the plugin.
         *
         * @package GoGetForums
         * @since 0.1.0-dev
         */
        public function load_constants(){
            /**
             * Define the plugin version
             */
            define( 'GOGETFORUMS_VERSION', $this->version );

            if ( !defined( 'GOGETFORUMS_PLUGIN_URL' ) ) {
                /**
                 * Define the plugin url
                 */
                define( 'GOGETFORUMS_PLUGIN_URL', plugins_url( '/', __FILE__ ) );
            }
            if ( !defined( 'GOGETFORUMS_INSTALL_PATH' ) ) {
                /**
                 * Define the install path
                 */
                define( 'GOGETFORUMS_INSTALL_PATH', dirname( __FILE__ ) . '/' );
            }
            if ( !defined( 'GOGETFORUMS_INCLUDES_PATH' ) ) {
                /**
                 * Define the include path
                 */
                define( 'GOGETFORUMS_INCLUDES_PATH', GOGETFORUMS_INSTALL_PATH . 'includes/' );
            }
            if ( !defined( 'GOGETFORUMS_TEMPLATE_PATH' ) ) {
                /**
                 * Define the template path
                 */
                define( 'GOGETFORUMS_TEMPLATE_PATH', BUDDYFORMS_INSTALL_PATH . 'templates/' );
            }
            if ( !defined( 'GOGETFORUMS_ASSETS' ) ) {
                /**
                 * Define the template path
                 */
                define( 'GOGETFORUMS_ASSETS', plugins_url( 'assets/', __FILE__ ) );
            }
        }
    }
}