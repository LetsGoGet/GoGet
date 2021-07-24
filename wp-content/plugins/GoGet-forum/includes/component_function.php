<?php

namespace GoGetForums\includes;

class Component
{
    public $data;
    public $meta_key;
    public function __construct($data, $meta_key)
    {
        $this->data = $data;
        $this->meta_key = $meta_key;
    }

    // include() 的 scope 僅限於該 function, 需事先定義 variable, include 的 file 才讀得到
    // public function show(){}
}

class Dropdown extends Component
{
    // Dropdown
    public function __construct($data, $meta_key) // in the future, we could extend extra parameters.
    {
        parent::__construct($data, $meta_key);

        // Include select2
        GoGetForumsAssets::load_select2_assets();

        include(GOGETFORUMS_TEMPLATE_PATH . "component/Dropdown.php");
    }

    // public function show(){
    //     $data = $this->data;
    //     $meta_key = $this->meta_key;
    //     include(GOGETFORUMS_TEMPLATE_PATH . "component/Dropdown.php");
    // }
}

class Textarea extends Component
{
    // Textarea
    public  function __construct($data, $meta_key, $word_limit)
    {
        parent::__construct($data, $meta_key);

        // include quill.js
        GoGetForumsAssets::load_quill_assets();

        // include textarea and rich editor
        include(GOGETFORUMS_TEMPLATE_PATH . "component/Textarea.php");
        GoGetForumsAssets::load_rich_editor_assets($meta_key, $word_limit);
    }

    // public function show(){
    //     $data = $this->data;
    //     $meta_key = $this->meta_key;
    //     include(GOGETFORUMS_TEMPLATE_PATH . "component/Textarea.php");
    // }
}

class SingleSelection extends Component
{
    // SingleSelection
    public function __construct($data, $meta_key)
    {
        parent::__construct($data, $meta_key);

        include(GOGETFORUMS_TEMPLATE_PATH . "component/SingleSelection.php");
    }

    // public function show(){
    //     $data = $this->data;
    //     $meta_key = $this->meta_key;
    //     include(GOGETFORUMS_TEMPLATE_PATH . "component/SingleSelection.php");
    // }
}

class InputBox extends Component
{
    // InputBox
    public function __construct($data, $meta_key)
    {
        parent::__construct($data, $meta_key);

        include(GOGETFORUMS_TEMPLATE_PATH . "component/InputBox.php");
    }

    // public function show(){
    //     $data = $this->data;
    //     $meta_key = $this->meta_key;
    //     include(GOGETFORUMS_TEMPLATE_PATH . "component/InputBox.php");
    // }
}

class Radio extends Component
{
    // Radio
    public function __construct($data, $meta_key)
    {
        parent::__construct($data, $meta_key);

        include(GOGETFORUMS_TEMPLATE_PATH . "component/Radio.php");
    }

    // public function show(){
    //     $data = $this->data;
    //     $meta_key = $this->meta_key;
    //     include(GOGETFORUMS_TEMPLATE_PATH . "component/Radio.php");
    // }
}

class MultiCheckBox extends Component
{
    // MultiCheckBox
    public function __construct($data, $meta_key)
    {
        parent::__construct($data, $meta_key);

        include(GOGETFORUMS_TEMPLATE_PATH . "component/MultiCheckBox.php");
    }

    // public function show(){
    //     $data = $this->data;
    //     $meta_key = $this->meta_key;
    //     include(GOGETFORUMS_TEMPLATE_PATH . "component/MultiCheckBox.php");
    // }
}

class ComboBox extends Component
{
    // ComboBox
    public function __construct($data, $meta_key)
    {
        parent::__construct($data, $meta_key);

        // Include select2
        GoGetForumsAssets::load_select2_assets();

        include(GOGETFORUMS_TEMPLATE_PATH . "component/ComboBox.php");
    }

    // public function show(){
    //     $data = $this->data;
    //     $meta_key = $this->meta_key;
    //     include(GOGETFORUMS_TEMPLATE_PATH . "component/ComboBox.php");
    // }
}

class DatePicker extends Component
{
    // DatePicker
    public function __construct($data, $meta_key)
    {
        parent::__construct($data, $meta_key);

        // Use cdn for testing
        wp_enqueue_style('style', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css');
        echo ('<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>');

        include(GOGETFORUMS_TEMPLATE_PATH . "component/DatePicker.php");
    }

    // public function show(){
    //     $data = $this->data;
    //     $meta_key = $this->meta_key;

    //     // Use cdn for testing
    //     wp_enqueue_style('style', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css');
    //     echo ('<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>');

    //     include(GOGETFORUMS_TEMPLATE_PATH . "component/DatePicker.php");
    // }
}

class Select2 extends Component
{
    // Select2
    public function __construct($data, $meta_key)
    {
        parent::__construct($data, $meta_key);

        // Include select2
        GoGetForumsAssets::load_select2_assets();

        include(GOGETFORUMS_TEMPLATE_PATH . "component/Select2.php");
    }

    // public function show(){
    //     $data = $this->data;
    //     $meta_key = $this->meta_key;
    //     include(GOGETFORUMS_TEMPLATE_PATH . "component/Select2.php");
    // }
}

class RequiredStar extends Component
{
    public function __construct($data, $meta_key)
    {
        parent::__construct($data, $meta_key);

        include(GOGETFORUMS_TEMPLATE_PATH . "component/RequiredStar.php");
    }
}
