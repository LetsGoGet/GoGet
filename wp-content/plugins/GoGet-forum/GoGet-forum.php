<?php

/**
 * Plugin Name: GoGet - Forum
 */

//require component_function file
require('component_function.php');

// to display fields in bbp new topic form
add_action('bbp_theme_before_topic_form_content', 'test');
if (!function_exists('test')) :
    function test()
    {
        //get forum id
        $forumId = bbp_get_forum_id();

        if ($forumId == 30) {
            // Using Quill
            echo ('<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">');
            echo ('<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>');

            // Dropdown
            $test_data = [1, 2, 3];
            Dropdown($test_data);

            // Textarea
            $test_data = "test default content";
            Textarea($test_data);

            // SingleSelection
            $test_data = [
                'content' => ['很簡單', '簡單', '普通', '困難', '很困難'],
                'color' => ['blue', 'blue', 'orange', 'red', 'red'],
            ];
            SingleSelection($test_data);
        }
    }
endif;
