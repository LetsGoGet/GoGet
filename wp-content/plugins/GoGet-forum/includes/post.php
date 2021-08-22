<?php

namespace GoGetForums\includes;

use GoGetForums\includes\forums\interview_experience;
use GoGetForums\includes\forums\work_experience;

// to display fields in bbp new topic form
add_action('bbp_theme_before_topic_form_content', __NAMESPACE__ . '\\add_post');
if (!function_exists('add_post')) :
    function add_post()
    {
        //get forum id
        $forumId = bbp_get_forum_id();

        switch ($forumId) {
            case 28:
                $forum = new interview_experience($forumId);
                $forum->init_components();
                break;
            case 30:
                $forum = new work_experience($forumId);
                $forum->init_components();
                break;
            case 70:
                bbp_the_content(array('context' => 'topic')); //bbpress default
                break;
            default:
                break;
        }
    }
endif;

// save post
add_filter('goget_forum_get_custom_post_fields',  __NAMESPACE__ . '\\save_post');
if (!function_exists('save_post')) :
    function save_post($forum_id)
    {
        $forum = null;
        switch ($forum_id) {
            case 28:
                $forum = new interview_experience($forum_id);
                if ($forum != null) {
                    $form_data = validate_form($forum->validator->get());

                    $topic_title = $form_data[ GOGETFORUMS_FORM_PREFIX . 'company'] . ' ' . $form_data[ GOGETFORUMS_FORM_PREFIX . 'job_title'][0] . ' 面試經驗';
                    $tags = concat_tag_string($form_data, $forum->tag_meta_keys);
                    $anonymous = $form_data[GOGETFORUMS_FORM_PREFIX . 'anonymous'] == '是';

                    // array("標題", "是否匿名", "標籤", "(已棄用)文章內容", "文章內容")
                    return array($topic_title, $anonymous, $tags, implode(',', $form_data), $form_data);
                }
                break;
            case 30:
                $forum = new work_experience($forum_id);
                if ($forum != null) {
                    $form_data = validate_form($forum->validator->get());

                    $topic_title = $form_data[ GOGETFORUMS_FORM_PREFIX . 'company'] . ' ' . $form_data[ GOGETFORUMS_FORM_PREFIX . 'job_title'][0] . ' 面試經驗';
                    $tags = concat_tag_string($form_data, $forum->tag_meta_keys);
                    $anonymous = $form_data[GOGETFORUMS_FORM_PREFIX . 'anonymous'] == '是';

                    // array("標題", "是否匿名", "標籤", "(已棄用)文章內容", "文章內容")
                    return array($topic_title, $anonymous, $tags, 'content', $form_data);
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

    /** 依照該 forum 需要加入 tag 的 meta_key array
     * 取出 $form_data 對應的值, 串接成一個 tag string
     * ex. "金融, 科技, 遠端工作"
     */
    function concat_tag_string($form_data, $tag_meta_keys){
        $tags = array();

        foreach ($tag_meta_keys as $meta_key){
            if (is_array($form_data[GOGETFORUMS_FORM_PREFIX . $meta_key])) { // 處理欄位多值或單值
                //去除 array 中的空白值, 以防產生逗號結尾文字 ex. array 有三個值 ['1', '2', ''] ---> print 出 ' 1,2, '
                $arr = array_filter($form_data[GOGETFORUMS_FORM_PREFIX . $meta_key], function ($value) {
                    return !is_null($value) && $value !== '';
                });

                foreach ($arr as $item) {
                    array_push($tags, $item);
                }
            } else {
                array_push($tags, $form_data[GOGETFORUMS_FORM_PREFIX . $meta_key]);
            }
        }

        return implode(',', $tags);
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
            case "28":
                $forum = new interview_experience($forumId);
                return $forum->get_content($post_meta);
            case "30":
                $forum = new work_experience($forumId);
                return $forum->get_content($post_meta);
            default:
                return null;
        }
    }
endif;

// TODO: Ask Andy whether it's necessary to keep this func or not
// fix prior bug
add_action('bbp_theme_after_topic_form_submit_button', __NAMESPACE__ . '\\detect_submit_button');
if (!function_exists('detect_submit_button')) :
    function detect_submit_button()
    {
        // for issue 49, start
        $forumId = bbp_get_forum_id();
        if ($forumId == 0) { // Interview experience form
            $forumId = bbp_get_topic_forum_id();
        }
        if ($forumId == 70) {
            return;
        }
        // for issue 49, end
        // $data = file_get_contents(ABSPATH . 'wp-content/plugins/andy-bbp-custom-form/js/detect_submit.js');
        // echo ("<script type='text/javascript'>$data</script>");
    }
endif;