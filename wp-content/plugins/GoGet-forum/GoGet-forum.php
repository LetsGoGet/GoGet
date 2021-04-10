<?php
/**
 * Plugin Name: GoGet - Forum
 */

// to display fields in bbp new topic form
add_action('bbp_theme_before_topic_form_content', 'test');
if (!function_exists('test')) :
    function test()
    {
        //get forum id
        $forumId = bbp_get_forum_id();

        if ($forumId == 30){
            echo("hi");
        }
    }
endif;