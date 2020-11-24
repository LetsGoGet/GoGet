<?php
/*
Plugin Name: Andy bbpress show view count
Plugin URI: 
Description:
Author: Andy Chen
Author URI:
Version: 1.0.0
*/

if( !function_exists('get_wpbbp_post_view') ) :
////////////////////////////////////////////////////////////////////////////////
// get bbpress topic view counter
////////////////////////////////////////////////////////////////////////////////
function get_wpbbp_post_view($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return number_format($count);
}
function set_wpbbp_post_view($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if( $count == '' ){
        add_post_meta($postID, $count_key, '1');
    } else {
        $new_count = $count + 1;
        update_post_meta($postID, $count_key, $new_count);
    }
}
endif;


if( !function_exists('add_wpbbp_topic_counter') ) :
////////////////////////////////////////////////////////////////////////////////
// init the view counter in bbpress single topic
////////////////////////////////////////////////////////////////////////////////
function add_wpbbp_topic_counter() {
global $wp_query;
$bbp = bbpress();
$active_topic = $bbp->current_topic_id;
set_wpbbp_post_view( $active_topic );
}
add_action('bbp_template_after_single_topic', 'add_wpbbp_topic_counter');
endif;




// function ntwb_register_custom_views() {
// 	bbp_register_view( 'most-viewed-topics', __( 'Popular Topics' ), array( 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num' ), false );

// }
// add_action( 'bbp_register_views', 'ntwb_register_custom_views' );