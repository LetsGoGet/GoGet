<?php
namespace GoGetForums\includes;

class Component{
    public $data;
    public function __construct($data){
        $this->data = $data;
    }
}

class Dropdown extends Component {
    // Dropdown
    public function __construct($data) // in the future, we could extend extra parameters.
    {
        parent::__construct($data);

        include(GOGETFORUMS_TEMPLATE_PATH . "component/Dropdown.php");
    }
}

class Textarea extends Component{
    // Textarea
    public  function __construct($data)
    {
        parent::__construct($data);

        // include quill.js
        GoGetForumsAssets::load_quill_assets();

        include(GOGETFORUMS_TEMPLATE_PATH . "component/Textarea.php");
    }
}

class SingleSelection extends Component{
    // SingleSelection
    public function __construct($data)
    {
        parent::__construct($data);

        include(GOGETFORUMS_TEMPLATE_PATH . "component/SingleSelection.php");
    }
}

