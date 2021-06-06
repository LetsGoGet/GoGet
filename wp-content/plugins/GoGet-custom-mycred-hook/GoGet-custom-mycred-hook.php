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



// Hook definitions starts here


//////// POINT DECUCTION FOR TOPIC BEING TRASHED //////////
// Deduct points when bbpress topics being trashed, by either the author or administrator
// When a bbpress topic is trashed, the visibility in the frontend is removed, but the topic will still be accessible in the backend unless admin user delete the topic permanently
// Action "bbp_trash_topic" is called by bbpress plugin
// By default, only admin users can trash topics. "bbp style pack" plugin are used to enable normal users to trash their topic.
// myCred bbpress hooks supports point deduction for bbpress topic being "deleted" (by admin user) but not for "trashed"

add_action( 'mycred_setup_hooks', 'goget_register_trash_topic_hook' );
function goget_register_trash_topic_hook( $installed ) {

	$installed['goget_point_deduction_for_trashed_topic'] = array(
		'title'       => __( '[GoGet] %plural% for topic being trashed', 'mycredcu' ),
		'description' => __( 'Deduct %plural% when bbpress topics being trashed (i.e, to remove frontend visibility. Similar to delete but the topic will still be accessible in the backend), by either the author or administrator.', 'mycredcu' ),
		'callback'    => array( 'myCRED_Hook_GoGet_Trashed_Topic' )
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
add_action( 'mycred_load_hooks', 'mycredpro_load_goget_trashed_topic_hook', 10 );
function mycredpro_load_goget_trashed_topic_hook() {

	class myCRED_Hook_GoGet_Trashed_Topic extends myCRED_Hook {

		/**
		 * Construct
		 */
		function __construct( $hook_prefs, $type = 'mycred_default' ) {

// id must start with lower case !!!!!!!
			parent::__construct( array(
				'id'       => 'goget_point_deduction_for_trashed_topic',
				'defaults' => array(
				)
			), $hook_prefs, $type );
		}

		/**
		 * Run
		 * @since 1.0
		 * @version 1.0
		 */
		public function run() {

			add_action( 'bbp_trash_topic', array( $this, 'goget_point_deduction_for_trashed_topic' ), 10, 1);

		}

		/**
		 * @since 1.0
		 * @version 1.0
		 */
		public function goget_point_deduction_for_trashed_topic( $topic_id ) {
		    $forumId = bbp_get_topic_forum_id($topic_id);  //for issue 49 start
		    if ($forumId==70){ 
		        return;
		    }
		    //for issue 49 end
		    
		    $user_id = bbp_get_topic_author_id($topic_id);
		    
    		// Check if user is excluded (required)
    		if ( $this->core->exclude_user( $user_id ) ) return;
    		
    		if (mycred_is_admin(get_current_user_id())){
    		    $log = '文章「' . bbp_get_topic_title() . '」被管理員下架';
    		}else{
    		    $log = '刪除文章「' . bbp_get_topic_title() . '」';
    		}
    
    		// Execute
    		$this->core->add_creds(
    			'goget_point_deduction_for_trashed_topic',
    			$user_id,
    			-50,    // the amount of point deducted
    			$log,
    			$topic_id,
    			'',
    			$m
    		);
		}
	}
}




//////// POINT AWARD FOR TOPIC CREATING TOPIC //////////
// Award authors for creating bbpress topics
// do_action( 'bbp_new_topic', $topic_id, $forum_id, $anonymous_data, $topic_author ) is called by bbpress plugin in bbpress/includes/topics/functions.php

add_action( 'mycred_setup_hooks', 'goget_register_create_topic_hook' );
function goget_register_create_topic_hook( $installed ) {

	$installed['goget_point_award_for_creating_topic'] = array(
		'title'       => __( '[GoGet] %plural% for topic being created', 'mycredcu' ),
		'description' => __( 'Award authors for creating bbpress topics', 'mycredcu' ),
		'callback'    => array( 'myCRED_Hook_GoGet_Create_Topic' )
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
add_action( 'mycred_load_hooks', 'mycredpro_load_goget_create_topic_hook', 10 );
function mycredpro_load_goget_create_topic_hook() {

	class myCRED_Hook_GoGet_Create_Topic extends myCRED_Hook {

		/**
		 * Construct
		 */
		function __construct( $hook_prefs, $type = 'mycred_default' ) {

// id must start with lower case !!!!!!!
			parent::__construct( array(
				'id'       => 'goget_point_award_for_creating_topic',
				'defaults' => array(
				)
			), $hook_prefs, $type );
		}

		/**
		 * Run
		 * @since 1.0
		 * @version 1.0
		 */
		public function run() {

			add_action( 'bbp_new_topic', array( $this, 'goget_point_award_for_creating_topic' ), 10, 4);

		}

		/**
		 * @since 1.0
		 * @version 1.0
		 */
		public function goget_point_award_for_creating_topic( $topic_id, $forum_id, $anonymous_data, $topic_author ) {
		    if ($forum_id==70){ //for issue 49 start
		        return;
		    }//for issue 49 end

		    
		    $user_id = $topic_author;
		    
    		// Check if user is excluded (required)
    		if ( $this->core->exclude_user( $user_id ) ) return;
    		
    		$link_with_title = '<a href="' . bbp_get_topic_permalink($topic_id) . '">' . bbp_get_topic_title($topic_id) . '</a>';
    		
            $log = '建立文章 ' . $link_with_title;
            
    		// Execute
    		$this->core->add_creds(
    			'goget_point_award_for_creating_topic',
    			$user_id,
    			50,    // the amount of point awarded
    			$log,
    			$topic_id,
    			'',
    			$m
    		);
		}
	}
}






//////// POINT AWARD FOR SUBMITTING REVIEWS //////////
// Award authors for submitting reviews
// do_action('GoGet_star_review_new_review', $post_id, $rating_id, $rating, $current_user->ID) is called by plugins/rate-star-review/rate-star-review.php

add_action( 'mycred_setup_hooks', 'goget_register_submit_review_hook' );
function goget_register_submit_review_hook( $installed ) {

	$installed['goget_point_award_for_submitting_review'] = array(
		'title'       => __( '[GoGet] %plural% for submitting review', 'mycredcu' ),
		'description' => __( 'Award users for submitting review', 'mycredcu' ),
		'callback'    => array( 'myCRED_Hook_GoGet_Submit_Review' )
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
add_action( 'mycred_load_hooks', 'mycredpro_load_goget_submit_review_hook', 10 );
function mycredpro_load_goget_submit_review_hook() {

	class myCRED_Hook_GoGet_Submit_Review extends myCRED_Hook {

		/**
		 * Construct
		 */
		function __construct( $hook_prefs, $type = 'mycred_default' ) {

// id must start with lower case !!!!!!!
			parent::__construct( array(
				'id'       => 'goget_point_award_for_submitting_review',
				'defaults' => array(
				)
			), $hook_prefs, $type );
		}

		/**
		 * Run
		 * @since 1.0
		 * @version 1.0
		 */
		public function run() {

			add_action( 'GoGet_star_review_new_review', array( $this, 'goget_point_award_for_submitting_review' ), 10, 4);

		}

		/**
		 * @since 1.0
		 * @version 1.0
		 */
		public function goget_point_award_for_submitting_review( $topic_id, $rating_id, $rating, $user_id ) {
		    
    		// Check if user is excluded (required)
    		if ( $this->core->exclude_user( $user_id ) ) return;
    		
    		$link_with_title = '<a href="' . bbp_get_topic_permalink($topic_id) . '">' . bbp_get_topic_title($topic_id) . '</a>';
    		
            $log = '評論文章 ' . $link_with_title;
            
    		// Execute
    		$this->core->add_creds(
    			'goget_point_award_for_submitting_review',
    			$user_id,
    			3,    // the amount of point awarded
    			$log,
    			$topic_id,
    		    array(
    			    'rating_id' => $rating_id,
    			    'rating' => $rating
    		    ),
    			$m
    		);
    		
    		echo '<script type="text/javascript">location.reload(true);</script>'; // refresh page
		}
	}
}







//////// POINT AWARD FOR RECEIVING RATING //////////
// Award authors for receiving ratings
// do_action('GoGet_star_review_new_review', $post_id, $rating_id, $rating, $current_user->ID) is called by plugins/rate-star-review/rate-star-review.php
// Important remark: The awarded points will not be changed even if the rating user changes the rating afterward. If we want to implement this, we have to create another hook for editing reviews

add_action( 'mycred_setup_hooks', 'goget_register_receive_review_hook' );
function goget_register_receive_review_hook( $installed ) {

	$installed['goget_point_award_for_receiving_review'] = array(
		'title'       => __( '[GoGet] %plural% for receiving review', 'mycredcu' ),
		'description' => __( 'Award users for receiving review', 'mycredcu' ),
		'callback'    => array( 'myCRED_Hook_GoGet_Receive_Review' )
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
add_action( 'mycred_load_hooks', 'mycredpro_load_goget_receive_review_hook', 10 );
function mycredpro_load_goget_receive_review_hook() {

	class myCRED_Hook_GoGet_Receive_Review extends myCRED_Hook {

		/**
		 * Construct
		 */
		function __construct( $hook_prefs, $type = 'mycred_default' ) {

// id must start with lower case !!!!!!!
			parent::__construct( array(
				'id'       => 'goget_point_award_for_receiving_review',
				'defaults' => array(
				)
			), $hook_prefs, $type );
		}

		/**
		 * Run
		 * @since 1.0
		 * @version 1.0
		 */
		public function run() {

			add_action( 'GoGet_star_review_new_review', array( $this, 'goget_point_award_for_receiving_review' ), 9, 4);

		}

		/**
		 * @since 1.0
		 * @version 1.0
		 */
		public function goget_point_award_for_receiving_review( $topic_id, $rating_id, $rating, $user_id) {
		    
		    $author_id = bbp_get_topic_author_id($topic_id);

    		// Check if user is excluded (required)
    		if ( $this->core->exclude_user( $author_id ) ) return;

    		if ($rating == 5) {
    			$awarded_points = 3;
    		}
    		elseif ($rating == 4) {
    			$awarded_points = 1;
    		}
    		else {
    			$awarded_points = 0;
    		}

    		if ($awarded_points == 0) return;
 
    		$link_with_title = '<a href="' . bbp_get_topic_permalink($topic_id) . '">' . bbp_get_topic_title($topic_id) . '</a>';

            $log = '文章 ' . $link_with_title . ' 獲得' . $rating . '星評論';
            
    		// Execute
    		$this->core->add_creds(
    			'goget_point_award_for_receiving_review',
                $author_id,
    			$awarded_points,    // the amount of point awarded
    			$log,
    			$topic_id,
    			array(
    			    'reviewer' => $user_id,
    			    'rating_id' => $rating_id,
    			    'rating' => $rating
    		    ),
    			$m
    		);
		}
	}
}