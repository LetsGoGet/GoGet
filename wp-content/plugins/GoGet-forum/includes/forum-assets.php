<?php

namespace GoGetForums\includes;

/**
 * Class GoGetForumsAssets
 */
class GoGetForumsAssets
{
    public function __construct()
    {
        self::load_common_assets();
    }

    /**
     * @since 0.1.0-dev Load frontend common assets
     */
    public static function load_common_assets()
    {
    }

    public static function load_quill_assets()
    {
        // quill.js // https://quilljs.com/
        wp_enqueue_script('GoGetForums-quill-js', GOGETFORUMS_ASSETS . 'vendors/quill/js/quill.js');
        wp_enqueue_style('GoGetForums-quill-css', GOGETFORUMS_ASSETS . 'vendors/quill/css/quill.snow.css');
    }

    public static function load_rich_editor_assets($meta_key){
        // register JS file
        wp_register_script('GoGetForums-rich_editor_' . $meta_key, GOGETFORUMS_ASSETS . 'js/rich_editor.js');

        // pass parameter into JS file
        wp_localize_script( 'GoGetForums-rich_editor_' . $meta_key, 'component',
            array(
                'meta_key' => $meta_key
            )
        );

        // enqueue JS file
        wp_enqueue_script('GoGetForums-rich_editor_' . $meta_key);
    }

    /**
     * @since 0.1.0-dev Load select2 assets
     */
    public static function load_select2_assets()
    {
        // jQuery Select2 // https://select2.github.io/
        wp_enqueue_script('GoGetForums-select2-js', GOGETFORUMS_ASSETS . 'vendors/select2/select2.min.js', array('jquery'));
        wp_enqueue_script('GoGetForums-select2-zh-TW-js', GOGETFORUMS_ASSETS . 'vendors/select2/zh-TW.min.js');
        wp_enqueue_style('GoGetForums-select2-css', GOGETFORUMS_ASSETS . 'vendors/select2/select2.min.css');
    }

    /**
     * @since 0.1.0-dev Load jquery validator assets
     */
    public static function load_jquery_validator_assets()
    {
        wp_enqueue_script('GoGetForums-frontend-validator-js', GOGETFORUMS_ASSETS . 'vendors/jquery-validator/jquery.validate.min.js', array('jquery'));
        wp_enqueue_script('GoGetForums-frontend-validator-custom-js', GOGETFORUMS_ASSETS . 'js/frontend_validator.js');
        wp_enqueue_style('GoGetForums-frontend-validator-css', GOGETFORUMS_ASSETS . 'css/frontend_validator_message.css');
    }
}
