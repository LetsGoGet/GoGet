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

    /**
     * @since 0.1.0-dev Load select2 assets
     */
    public static function load_select2_assets()
    {
        // jQuery Select2 // https://select2.github.io/
        wp_enqueue_script('buddyforms-select2-js', GOGETFORUMS_ASSETS . 'resources/select2/dist/js/select2.full.min.js', array('jquery'), '4.0.3');
        wp_enqueue_style('buddyforms-select2-css', GOGETFORUMS_ASSETS . 'resources/select2/dist/css/select2.min.css');
    }
}
