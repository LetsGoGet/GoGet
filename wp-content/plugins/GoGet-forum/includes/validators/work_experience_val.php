<?php

namespace GoGetForums\includes;

class work_experience_val extends validator
{
    public function __construct($meta_keys)
    {
        parent::__construct($meta_keys);
    }

    public function get(): array
    {
        $result = array();
        foreach ($this->meta_keys as $key => $value) {
            $result[GOGETFORUMS_FORM_PREFIX . $key] = FILTER_SANITIZE_STRING;
        }

        return $result;
    }
}
