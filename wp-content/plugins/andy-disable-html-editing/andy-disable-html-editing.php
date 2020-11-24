<?php
/*
Plugin Name: andy disable html editing
Plugin URI: 
Description:
Author: Andy Chen
Author URI:
Version: 1.0.0
*/

function bbp_enable_visual_editor( $args = array() ) {
    $args['tinymce'] = true;
    $args['quicktags'] = false;
    return $args;
}
add_filter( 'bbp_after_get_the_content_parse_args', 'bbp_enable_visual_editor' );
