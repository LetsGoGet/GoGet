<?php

namespace GoGetForums\includes;

/**
 * Class forum
 * Specify each forum's validating rule
 */
class validator
{
    public $meta_keys;
    public function __construct($meta_keys)
    {
        $this->meta_keys = $meta_keys;
    }
}
