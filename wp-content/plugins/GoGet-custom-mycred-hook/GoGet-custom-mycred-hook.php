<?php
/*
Plugin Name: GoGet custom mycred hook
Plugin URI:
Description:
Author: Andy Chen
Author URI:
Version: 1.0.0
*/

/*

This plugin contains GoGet custom mycred hooks for point award and deduction.

The links below are good examples on building a custom mycred hook
https://mycred.me/tutorials/how-to-make-your-custom-hook/
https://gist.github.com/gabrielmerovingi/5536bdf423ca6c5c79e3

[IMPORTANT] After writing the code, you must go to the website backend (https://www.letsgoget.info/wp-admin/admin.php?page=mycred-hooks) to turn it on (drag and drop the hook and hit 'save'). The constructor of the hook class only executes upon this action.


Plugin dependency
1. This plugin works only when mycred plugin is activated.

*/



// Hook definition starts here


//////// POINT DECUCTION FOR TOPIC BEING TRASHED //////////
// Deduct points when bbpress topics being trashed, by either the author or administrator
// When a bbpress topic is trashed, the visibility in the frontend is removed, but the topic will still be accessible in the backend unless admin user delete the topic permanently
// Action "bbp_trash_topic" is called by bbpress plugin
// By default, only admin users can trash topics. "bbp style pack" plugin are used to enable normal users to trash their topic.
// myCred bbpress hooks supports point deduction for bbpress topic being "deleted" (by admin user) but not for "trashed"

add_action( 'mycred_setup_hooks', 'register_trash_topic_hook' );
function register_trash_topic_hook( $installed ) {

	$installed['goget_point_deduction_for_trashed_topic'] = array(
		'title'       => __( '%plural% for topic being trashed', 'mycredcu' ),
		'description' => __( 'Deduct %plural% when bbpress topics being trashed (i.e, to remove frontend visibility. Similar to delete but the topic will still be accessible in the backend), by either the author or administrator.', 'mycredcu' ),
		'callback'    => array( 'myCRED_Hook_Trashed_Topic' )
	);
	return $installed;
}

/**
 * Custom Hook: Load custom hook
 * Since 1.6, this would be the proper way to add in the hook class from a theme file
 * or from a plugin file.
 * @since 1.0
 * @version 1.0
 */
add_action( 'mycred_load_hooks', 'mycredpro_load_trashed_topic_hook', 10 );
function mycredpro_load_trashed_topic_hook() {

	class myCRED_Hook_Trashed_Topic extends myCRED_Hook {

		/**
		 * Construct
		 */
		function __construct( $hook_prefs, $type = 'mycred_default' ) {

// id must start with lower case !!!!!!!
			parent::__construct( array(
				'id'       => 'goget_point_deduction_for_trashed_topic',
				'defaults' => array(
				// 	'post_type' => 'post',
				// 	'taxonomy'  => 'category',
				// 	'log'       => '%plural% for publishing content'
				)
			), $hook_prefs, $type );
		}

		/**
		 * Run
		 * @since 1.0
		 * @version 1.0
		 */
		public function run() {

			add_action( 'bbp_trash_topic', array( $this, 'point_deduction_for_trashed_topic' ), 10, 1);

		}

		/**
		 * @since 1.0
		 * @version 1.0
		 */
		public function point_deduction_for_trashed_topic( $topic_id ) {
		    $user_id = bbp_get_topic_author_id($topic_id);
		    
    		// Check if user is excluded (required)
    		if ( $this->core->exclude_user( $user_id ) ) return;
    		
    		if (current_user_can('administrator')){
    		    $log = '文章「' . bbp_get_topic_title() . '」被管理員下架';
    		}else{
    		    $log = '刪除文章「' . bbp_get_topic_title() . '」';
    		}
    
    		// Execute
    		$this->core->add_creds(
    			'point_deduction_for_trashed_topic',
    			$user_id,
    			-50,    // the amount of point deducted
    			$log,
    			0,
    			'',
    			$m
    		);
		}
	}
}