<?php
global $bsp_style_settings_form ;
global $bsp_style_settings_search ;
global $bsp_style_settings_t ;


function generate_style_css() {
	require_once(ABSPATH . 'wp-admin/includes/file.php');
	global $bsp_css_location ;
	ob_start(); // Capture all output (output buffering)
	require (BSP_PLUGIN_DIR . '/css/styles.php');
	$css = ob_get_clean(); // Get generated CSS (output buffering)
	if (!empty ($bsp_css_location ['activate css location']) && !empty($bsp_css_location ['location'])) {
		$location = $bsp_css_location ['location'] ;
			// if it starts with '/' -  remove
			if (0 === strpos($location, '/')) {
			$location = substr( $location, 1, strlen($location) ) ;
			}
		// if it doesn't end with a '/' add one
		if (substr( $location, strlen($location)-1, strlen($location) ) !== '/') {
			$location = $location.'/' ;
		}
		$path = get_home_path();
		$path = $path.'/'.$location ;
		file_put_contents($path.'bspstyle.css', $css, LOCK_EX ); // Save it
		//then copy the test admin file to the same location (otherwise we don't need to as it is already in the css directory
		copy(BSP_PLUGIN_DIR . '/css/bsp_test.css', $path.'bsp_test.css');
	}
	else 
	file_put_contents(BSP_PLUGIN_DIR . '/css/bspstyle.css', $css, LOCK_EX ); // Save it

	
}

function bsp_enqueue_css() {
	global $bsp_css_location ;
	$bsp_ver = get_option('bsp_version') ;
	//register style so that it runs after bbpress (bbp-default)
	if (!empty ($bsp_css_location ['activate css location']) && !empty($bsp_css_location ['location'])) {
		$location = $bsp_css_location ['location'] ;
			// if it starts with '/' -  remove
		if (0 === strpos($location, '/')) {
			$location = substr( $location, 1, strlen($location) ) ;
		}
		// if it doesn't end with a '/' add one
		if (substr( $location, strlen($location)-1, strlen($location) ) !== '/') {
			$location = $location.'/' ;
		}
		$location = home_url().'/'.$location ;
		wp_register_style('bsp', $location.'bspstyle.css', array( 'bbp-default' ), $bsp_ver, 'screen');
	}
	else wp_register_style('bsp', plugins_url('css/bspstyle.css',dirname(__FILE__) ), array( 'bbp-default' ), $bsp_ver, 'screen');
	wp_enqueue_style( 'bsp');
	
	wp_enqueue_style( 'dashicons');
}

add_action('wp_enqueue_scripts', 'bsp_enqueue_css');


add_action( 'admin_enqueue_scripts', 'bsp_enqueue_color_picker' );
add_action( 'admin_enqueue_scripts', 'bsp_test' );



function bsp_test2 () {
wp_register_style('bsp_test', plugins_url('css/bsp_test.css',dirname(__FILE__) ));	
wp_enqueue_style( 'bsp_test');
}

//adds a test file for the 'not working' tab
function bsp_test () {
	global $bsp_css_location ;
	$bsp_ver = get_option('bsp_version') ;
	//register style so that it runs after bbpress (bbp-default)
if (!empty ($bsp_css_location ['activate css location']) && !empty($bsp_css_location ['location'])) {
	$location = $bsp_css_location ['location'] ;
			// if it starts with '/' -  remove
			if (0 === strpos($location, '/')) {
			$location = substr( $location, 1, strlen($location) ) ;
			}
		// if it doesn't end with a '/' add one
		if (substr( $location, strlen($location)-1, strlen($location) ) !== '/') {
			$location = $location.'/' ;
		}
	$location = home_url().'/'.$location ;
	wp_register_style('bsp_test', $location.'bsp_test.css');
	}
	else wp_register_style('bsp_test', plugins_url('css/bsp_test.css',dirname(__FILE__) ));	
	wp_enqueue_style( 'bsp_test');
		
}

function bsp_enqueue_color_picker( $hook_suffix ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'bsp_enqueue_color_picker', plugins_url('js/bsp.js',dirname( __FILE__ )), array( 'wp-color-picker' ), false, true );
	
	}

	
if (!empty ( $bsp_style_settings_form['SubmittingActivate'])) add_action( 'wp_enqueue_scripts', 'bsp_enqueue_submit' );


function bsp_enqueue_submit() {
	wp_enqueue_script( 'bsp_enqueue_submit', plugins_url('js/bsp_enqueue_submit.js',dirname( __FILE__ )));
	}
	
	
if (!empty ( $bsp_style_settings_search['SearchingActivate'])) add_action( 'wp_enqueue_scripts', 'bsp_enqueue_search' );


function bsp_enqueue_search() {
	wp_enqueue_script( 'bsp_enqueue_search', plugins_url('js/bsp_enqueue_search.js',dirname( __FILE__ )) );
	}
	
//add the author delete topic/reply if enabled
if (!empty ($bsp_style_settings_t['participant_trash_topic_confirm']) || !empty ($bsp_style_settings_t['participant_trash_reply_confirm'] ) ) {
add_action( 'wp_enqueue_scripts', 'bsp_delete_check' );
}

function bsp_delete_check() {
	wp_enqueue_script( 'bsp_delete_check', plugins_url('js/bsp_delete.js',dirname( __FILE__ )) );
}

function generate_delete_js() {
	require_once(ABSPATH . 'wp-admin/includes/file.php');
	global $bsp_style_settings_t ;
	$message = (!empty($bsp_style_settings_t['participant_trash_topic_text']) ? $bsp_style_settings_t['participant_trash_topic_text'] : 'Are you sure you want to delete this topic?');
	ob_start(); // Capture all output (output buffering)
	if (!empty ($bsp_style_settings_t['participant_trash_topic_confirm'] ) ) {
	echo 'jQuery( function($) {       
    $(\'a.bbp-topic-trash-link\').click( function( event ) {
		if( ! confirm( \''.$message.'\' ) ) {
            event.preventDefault();
        }           
		});
	});' ;
	}
	if (!empty ($bsp_style_settings_t['participant_trash_reply_confirm'] ) ) {
	$message = (!empty($bsp_style_settings_t['participant_trash_reply_text']) ? $bsp_style_settings_t['participant_trash_reply_text'] : 'Are you sure you want to delete this reply?');
				
	echo 'jQuery( function($) {       
    $(\'a.bbp-reply-trash-link\').click( function( event ) {
		if( ! confirm( \''.$message.'\' ) ) {
            event.preventDefault();
        }           
		});
	});' ;
	}
	$js = ob_get_clean(); // Get generated js (output buffering)
	file_put_contents(BSP_PLUGIN_DIR . '/js/bsp_delete.js', $js, LOCK_EX ); // Save it
}


