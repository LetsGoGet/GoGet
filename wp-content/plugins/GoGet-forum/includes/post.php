<?php
namespace GoGetForums\includes;

// to display fields in bbp new topic form
add_action('bbp_theme_before_topic_form_content', __NAMESPACE__ . '\\add_post');
function add_post(){
    //get forum id
    $forumId = bbp_get_forum_id();

    switch ($forumId){
        case 30:
            $testForum = new testForum();
            break;
        default:
            break;
    }
}