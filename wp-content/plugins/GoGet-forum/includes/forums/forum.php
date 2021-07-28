<?php

namespace GoGetForums\includes\forums;

use GoGetForums\includes\GoGetForumsAssets;

/**
 * Class forum
 * Specify each forum's components
 */
class forum
{
    public $id;
    public $validator;
    public $meta_keys;
    public $tag_meta_keys; // 要加入 tag 的 meta keys
    public $mycred_pos;

    public function __construct($id)
    {
    }

    public function init_frontend_validator()
    {
        GoGetForumsAssets::load_jquery_validator_assets();
    }

    public function init_components()
    {
    }

    public function get_content($post_meta)
    {
    }
}
