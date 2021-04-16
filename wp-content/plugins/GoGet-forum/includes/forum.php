<?php
namespace GoGetForums\includes;

/**
 * Class forum
 * Specify each forum's components
 */
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

        // Dropdown
        $test_data = [1, 2, 3];
        $dropdown = new Dropdown($test_data);

        // Textarea
        $test_data = "test default content";
        $textarea = new Textarea($test_data);

        // SingleSelection
        $test_data = [
            'content' => ['很簡單', '簡單', '普通', '困難', '很困難'],
            'color' => ['blue', 'blue', 'orange', 'red', 'red'],
        ];
        $singleSelection = new SingleSelection($test_data);
    }
}