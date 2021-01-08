<?php
/*
Plugin Name: GoGet anonymous bbp topic
Plugin URI: 
Description:
Author: Andy Chen
Author URI:
Version: 1.0.0
*/

//This plugin is to hide the author name when the topic is set to anonymous

/* related code in other plugins:

1. apply_filters( 'bbp_get_reply_author_link', $author_link, $r, $args ); ==> this line is executed in plugins/bbpress/includes/replies/template.php

2. if($isAnonymous == true) $isAnonymous = 1;
   add_post_meta($topic_id, 'isAnonymous', $isAnonymous);
   => These two lines is executed in plugins/bbpress/includes/topics/functions.php. GoGet developers added these two lines.
   
   
3. apply_filters( 'bbp_get_topic_author_link', $author_link, $args ); ==> this line is executed in plugins/bbpress/includes/topics/template.php
   
*/


if( !function_exists('GoGet_hide_reply_author_name_if_anonymous') ) :
function GoGet_hide_reply_author_name_if_anonymous($author_link, $r, $args ){
    // if (current_user_can('administrator')){
    //     return $author_link; // display author link if current user is an administrator
    // }
    $reply_id = is_numeric( $args )
			? bbp_get_reply_id( $args )
			: bbp_get_reply_id( $r['post_id'] );
	$topic_id = bbp_get_topic_id();
    $isAnonymous = get_post_meta( $topic_id, 'isAnonymous', true );
    $sameAuthorAsTopic = bbp_get_reply_author_id($reply_id) == bbp_get_topic_author_id($topic_id); // if the topic is anonymous, hide the author's name also in the reply chain
    
    if($isAnonymous and $sameAuthorAsTopic){  // should treat this reply as anonymous
        return (get_current_user_id() == bbp_get_reply_author_id($reply_id) or current_user_can('administrator')) ? $author_link . '(已匿名)' : "匿名樓主";
    }
    return $author_link;
}
endif;

add_filter('bbp_get_reply_author_link', 'GoGet_hide_reply_author_name_if_anonymous', 10, 3);


if( !function_exists('GoGet_hide_topic_author_name_if_anonymous') ) :
function GoGet_hide_topic_author_name_if_anonymous($author_link, $args ){
    // if (current_user_can('administrator')){
    //     return $author_link; // display author link if current user is an administrator
    // }
    if ( is_numeric( $args ) ) { 
        $topic_id = bbp_get_topic_id( $args ); 
    } else { 
        $topic_id = bbp_get_topic_id( $r['post_id'] ); 
    } 
    $isAnonymous = get_post_meta( $topic_id, 'isAnonymous', true );
    
    if($isAnonymous){  // should treat this reply as anonymous
        return (get_current_user_id() == bbp_get_topic_author_id($topic_id) or current_user_can('administrator')) ? $author_link . '(已匿名)' : "匿名樓主";
    }
    return $author_link;
}
endif;

add_filter('bbp_get_topic_author_link', 'GoGet_hide_topic_author_name_if_anonymous', 10, 2);
