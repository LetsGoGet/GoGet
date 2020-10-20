<?php

//this file holds buddypress filters and functions

///////////////////////PROFILE FOR BUDDYPRESS

//This function is used if profiles are switched off, or just for logged in users
//code taken from plugin members_page_only_for_logged_in_users.

Function bsp_buddypress_surpress_members_pages () {
		$current_url = $_SERVER['REQUEST_URI'];
		global $bsp_profile ;
		$current_user = wp_get_current_user()->ID;
		$test = false ;
			//if only logged in set $test
			if ($bsp_profile['profile'] == 1  && is_user_logged_in() ) $test = true ;
			//if only users own profile
			if ($bsp_profile['profile'] == 2 && is_user_logged_in() ) {
			//see if username is in the url - ie matches
			$current_username = wp_get_current_user()->user_login ;
			if (strpos($current_url,$current_username)==true) $test=true ;
			}
			//if turn off all profiles then set in all cases...
			if ($bsp_profile['profile'] == 3 ) $test = false ;
			//then set true for keymaster
			if ( bbp_is_user_keymaster($current_user)) $test = true ;
			//and check if moderators are allowed to see
			$role = bbp_get_user_role( $current_user );
			if ($role == 'bbp_moderator' && (!empty ($bsp_profile['moderator']))  )	$test = true ;
		
		
		
		
    if ( $test == false && ( bp_is_activity_component() || bp_is_groups_component() || bp_is_forums_component() || bp_is_blogs_component() ||  strpos($current_url,'/profile/')==true || strpos($current_url,'/friends/')==true || strpos($current_url,'/following/')==true || strpos($current_url,'/followers/')==true))
		{
		$redirect_url = site_url();
		header( 'Location: ' . $redirect_url );	
		die();				
		}
}
	
//only run if bp is active
add_action( 'bp_include', 'bsp_buddy1' );	




function bsp_buddy1 () {

	global $bsp_profile ;
		if (function_exists('bp_is_register_page') && function_exists('bp_is_activation_page') ) {
			if (!empty ($bsp_profile['profile'] ) ) {
				if ($bsp_profile['profile'] == 1  || $bsp_profile['profile'] == 3 ){
				add_action('wp','bsp_buddypress_surpress_members_pages');
				} 
			}	
		}
	else {
		if (!empty ($bsp_profile['profile'] ) ) {
			if ($bsp_profile['profile'] == 1  || $bsp_profile['profile'] == 3 ){
				add_action('wp_head','bsp_buddypress_surpress_members_pages');
			} 
		}	
	}

}

