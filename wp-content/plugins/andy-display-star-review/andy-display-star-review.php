<?php
/*
Plugin Name: Andy display star review
Plugin URI: 
Description:
Author: Andy Chen
Author URI:
Version: 1.0.0
*/

// to display fields in bbp new topic form
add_action( 'bbp_theme_after_reply_content', 'bbp_display_star_review' );
if ( ! function_exists( 'bbp_display_star_review' ) ) :
    function bbp_display_star_review() {
        //for issue 49 start
        $forumId = bbp_get_forum_id();
        if ($forumId == 0){
            $forumId = bbp_get_topic_forum_id();
        }
        if ($forumId==70){
            return;
        }
        //for issue 49 end
        if(bbp_get_reply_id() == bbp_get_topic_id()){ // only show rating and rating form for the main content but not for the replies
            echo('<br>');
            if (mycred_user_paid_for_content($user_id=get_current_user_id(), $post_id=bbp_get_topic_id()) || mycred_is_admin(get_current_user_id())){
                echo(do_shortcode('[videowhisper_review]'));
            }else{
                global $post,$current_user;
                if ($post->post_author != $current_user->ID){
                    echo('<div class="text-center"><h3>解鎖文章方可給予評論</h3></div>');
                }
            }
            echo(do_shortcode('[videowhisper_reviews]'));
        }
    }
endif;
