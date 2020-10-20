<?php
/*
Plugin Name: andy search topic only
Plugin URI: 
Description:
Author: Andy Chen
Author URI:
Version: 1.0.0
*/

add_filter ('bbp_before_has_search_results_parse_args', 'rew_amend_search') ;

function rew_amend_search ($args) {
	$args['post_type'] =  bbp_get_topic_post_type() ;
return $args ;
}

