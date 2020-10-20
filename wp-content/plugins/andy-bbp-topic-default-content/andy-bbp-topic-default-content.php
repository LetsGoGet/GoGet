<?php
/*
Plugin Name: Andy bbp topic default content
Plugin URI: 
Description:
Author: Andy Chen
Author URI:
Version: 1.0.0
*/

function bbp_get_topic_default_content( $forumId ) {
    $content = '';
    $path = ABSPATH.'wp-content/plugins/andy-bbp-topic-default-content/article_templates/' . $forumId . '.html';
    if(file_exists($path)){
        $content = file_get_contents($path);
    }
    else{
        $content = '';
    }
    return $content;
}
add_filter( 'bbp_andy_get_topic_default_content', 'bbp_get_topic_default_content');