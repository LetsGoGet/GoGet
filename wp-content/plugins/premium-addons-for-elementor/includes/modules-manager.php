<?php

namespace PremiumAddons\Includes;

use PremiumAddons\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

final class Modules_Manager {

    //Class instance
    private static $instance = null;

	/**
	 * @var Module_Base[]
	 */
    private $modules = [];
    
    public function __construct() {
        
        $this->require_files();

        $this->register_modules();

    }
    
    /**
	 * Require Files.
	 *
	 * @since 1.6.1
     * @access public
     * 
     * @return void
	 */
    public function require_files() {

        require_once PREMIUM_ADDONS_PATH . 'base/module-base.php';
        
    }
    
    /**
	 * Register Modules.
	 *
	 * @since 1.6.1
     * @access public
     * 
     * @return void
	 */
    public function register_modules() {

        $modules = [
			'woocommerce'
        ];
        
		foreach ( $modules as $module_name ) {

			$class_name = str_replace( '-', ' ', $module_name );

			$class_name = str_replace( ' ', '', ucwords( $class_name ) );
            
            $namespace = str_replace( 'Includes', '', __NAMESPACE__ );
            
			$class_name =  $namespace . 'Modules\\' . $class_name . '\Module';
            
			/** @var Module_Base $class_name */         
            $this->modules[ $module_name ] = $class_name::instance();
			
		}
        
    }

    /**
     * 
     * Creates and returns an instance of the class
     * 
     * @since 1.0.0
     * @access public
     * 
     * @return object
     * 
     */
    public static function get_instance() {

        if( self::$instance == null ) {

            self::$instance = new self;

        }
        
        return self::$instance;
    }

}