<?php

namespace GoGetForums\includes\forums;

/**
 * Class forum
 * Specify each forum's components
 */
class forum
{
    public $id;
    public $validator;
    public $components = array();

    public function __construct($id)
    {
    }

    public function init_components(){}

    public function get_content($post_meta){}
}
