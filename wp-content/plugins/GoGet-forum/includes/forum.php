<?php

class forum{
    public function __construct()
    {
        // include common assets
    }
}

class testForum extends forum{
    public function __construct()
    {
        parent::__construct();

        // Using Quill
        GoGetForumsAssets::load_quill_assets();

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