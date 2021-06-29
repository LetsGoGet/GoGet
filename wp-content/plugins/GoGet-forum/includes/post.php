<?php

namespace GoGetForums\includes;

use GoGetForums\includes\forums\interview_experience;

// to display fields in bbp new topic form
add_action('bbp_theme_before_topic_form_content', __NAMESPACE__ . '\\add_post');
if (!function_exists('add_post')) :
    function add_post()
    {
        //get forum id
        $forumId = bbp_get_forum_id();

        switch ($forumId) {
            case 30:
                $forum = new interview_experience($forumId);
                $forum->init_components();
                break;
            default:
                break;
        }
    }
endif;

// save post
add_filter('goget_forum_get_custom_post_fields',  __NAMESPACE__ . '\\save_post');
if (!function_exists('save_post')) :
    function save_post()
    {
        $forumId = bbp_get_forum_id();
        $forum = null;
        switch ($forumId) {
            case 30:
                $forum = new interview_experience($forumId);
                if ($forum != null) {
                    $form_data = validate_form($forum->validator->get());
                    $topic_title = $form_data['goget_company'] . ' ' . $form_data['goget_job_title'][0] . ' 面試經驗';
                    /**
                     * TODO: 確保 $form_data 內有 $form['isAnonymous'], 且格式為 boolean, 同 tag
                     * 最後回傳 array($form['topic_title'], $form['isAnonymous'], $form['tags'], 'content', $form_data);
                     */
                    return array($topic_title, '是否匿名', 'tags', 'content', $form_data);
                }
                break;
        }
    }

    /**
     * array_intersect_key() ->  找出 array $key 交集的欄位
     * filter_input_array() -> 以 validator 作為欄位驗證標準
     */
    function validate_form($validator)
    {
        $intersected_array = array_intersect_key($_POST, $validator);

        /** TODO: FILTER_SANITIZE_STRING 有些中文或英文字會被篩選刪除，待確認後再啟用 */
        //$filtered_array =  filter_var_array($intersected_array, $validator);

        return $intersected_array;
    }
endif;


add_filter('goget_forum_get_topic_post_meta',  __NAMESPACE__ . '\\get_topic_post_meta');
if (!function_exists('get_topic_post_meta')) :
    function get_topic_post_meta($reply_id)
    {
        $post_meta = get_post_meta($reply_id);

        // 篩選 array 中 prefix 為 "goget_" 的值
        $filtered_data =  array_filter($post_meta, function ($v, $k) {
            return strpos($k, 'goget_') !== false;
        }, ARRAY_FILTER_USE_BOTH);

        return array_map(function ($value) {
            // Example: data " a:2:{i:0;s:6:"金融";i:1;s:5:"(無)";} " would be unserialized into ['金融', '無']
            // if the data can't be serialized, it will return false
            if (!unserialize($value[0]))
                return $value;
            return unserialize($value[0]);
        }, $filtered_data);
    }
endif;

// show topic content
add_filter('goget_forum_get_topic_content',  __NAMESPACE__ . '\\get_topic_content');
if (!function_exists('get_topic_content')) :
    function get_topic_content($reply_id)
    {
        $post_meta = get_topic_post_meta($reply_id);

        //generate content by each forum's behavior
        $forumId = bbp_get_forum_id();
        switch ($forumId) {
            case "30":
                $forum = new interview_experience($forumId);
                return $forum->get_content($post_meta);
            default:
                return null;
        }
    }
endif;
