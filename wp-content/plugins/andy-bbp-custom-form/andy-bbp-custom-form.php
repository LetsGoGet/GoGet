<?php
/*
Plugin Name: Andy bbp custom form
Plugin URI:
Description:
Author: Andy Chen
Author URI:
Version: 1.0.0
*/

function generateRandomString($length = 6) {
    static $unqid = 0;
    return "__" . strval($unqid++);
}

function live_search_handler($request) {
    global $wpdb;

    $queryType = htmlentities($request['type']);
    $queryText = htmlentities($request['text']); // $request->get_params(); // JSON: {text "ds"}

    if($queryText == '') {
        return array();
    }

    if ( ! empty( $wpdb->charset ) ){
        $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
    }
    if ( ! empty( $wpdb->collate ) ){
        $charset_collate .= " COLLATE $wpdb->collate";
    }
    if( ! function_exists('maybe_create_table') ){
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' ); // Add one library admin function
    }

    switch ($queryType){
        case 'company':
            $posts_table = $wpdb->prefix . "company";
            maybe_create_table( $posts_table,
                "CREATE TABLE `{$posts_table}` (
                `id` bigint(20) NOT NULL AUTO_INCREMENT,
                `name` varchar(256) NOT NULL UNIQUE,
                PRIMARY KEY (`id`)
                ) $charset_collate AUTO_INCREMENT=1;"
            );
            // select * from users where users.email like '%abc%';
            $rows = $wpdb->get_results( "SELECT name FROM " . $posts_table . " WHERE name like '%" . $queryText . "%'");
            break;
        case 'job_title':
            $posts_table = $wpdb->prefix . "job_title";
            maybe_create_table( $posts_table,
                "CREATE TABLE `{$posts_table}` (
                `id` bigint(20) NOT NULL AUTO_INCREMENT,
                `name` varchar(256) NOT NULL UNIQUE,
                PRIMARY KEY (`id`)
                ) $charset_collate AUTO_INCREMENT=1;"
            );
            $rows = $wpdb->get_results( "SELECT name FROM " . $posts_table . " WHERE name like '%" . $queryText . "%'");
            break;
        case 'dropdown_countries_and_cities':
            $cc_path = ABSPATH . 'wp-content/plugins/andy-bbp-custom-form/countries_and_cities.json';
            $data = file_get_contents($cc_path);
            $cc = json_decode($data, true);
            $html = "";
            foreach($cc as $country => $city) {
                if($country == $queryText) {
                    foreach($city as $c) {
                        $html .= "<option value='" . $c. "'>" . $c. "</option>";
                    }
                }
            }
            return $html;
    }

    $query = array();
    if(!empty($rows)){
        foreach($rows as $key=>$r) {
            array_push($query, (object) ['id' => $key, 'text' => $r->name]);
        }
    }
    return $query;
}

add_action('rest_api_init', 'fetch_live_search_data');
function fetch_live_search_data($data) { // http://localhost/wordpress/wp-json/test/v1/data?industry=資訊
    register_rest_route( 'fetch/v1', '/data/', array(
            'methods'  => 'GET',
            'callback' => 'live_search_handler',
    ));
}

class formElements{
    public function __construct()
    {
        $this->ID = "";
    }

    function generateUI($fieldName){
        return $fieldName;
    }

    function getComponentID() 
    {
        return $this->ID;
    }
}

class comboBox extends formElements{
    private $type;
    private $subtitle;
    function __construct($type, $subtitle)
    {
        parent::__construct();
        $this->type = $type;
        $this->subtitle = $subtitle;
        $this->ID = "";
    }

    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content';
        $fieldID = $hashed_fieldName.'_input';
        $listID = $hashed_fieldName.'_list';
        $fetchFunction = $hashed_fieldName.'_fetchData';
        $this->ID = $fieldID;
        $label_id = $hashed_fieldName.'_label';
        error_log($label_id);

        //ajax select2
        echo("
            <script>
                jQuery(document).ready(function($) {
                    var url_fetch = window.location.href.split('interview')[0] + 'wp-json/fetch/v1/data';
                    
                    $('#$label_id').select2({
                        language: 'zh-tw',
                        tags: true,
                        dropdownAutoWidth: true,
                        ajax: {
                            url: url_fetch,
                            method: 'GET',
                            dataType: 'json',
                            data: function (params) {
                              return {
                                text: params.term, // search term
                                page: params.page,
                                type: '$this->type',
                              };
                            },
                            contentType: 'application/json',
                            delay: 50,
                            processResults: function (data, params) {
                              // parse the results into the format expected by Select2
                              // since we are using custom formatting functions we do not need to
                              // alter the remote JSON data, except to indicate that infinite
                              // scrolling can be used
                              params.page = params.page || 1;
                              console.log(data);

                              return {
                                results: data,
                                pagination: {
                                  more: (params.page * 30) < data.total_count
                                }
                              };
                            },
                            cache: true
                        }
                    });
                });
            </script>
        ");

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <label id='$this->ID' for='$label_id'>
                    <select name='$hashed_fieldName' id='$label_id' >
                    <option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                    </select>
                </label>
            </div>
        ");
    }
}

class radio extends formElements{
    private $subtitle;
    function __construct($subtitle)
    {
        parent::__construct();
        $this->subtitle = $subtitle;
        $this->ID = get_class($this) . generateRandomString();
    }

    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content';
        $label_id = $hashed_fieldName.'_label';

        echo("
            <div id='search_bar' style='margin-bottom: 3px; margin-top: 10px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <label id='$this->ID' for='$label_id'>
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='否' checked/>
                    否
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='是' />
                    是
                </label>
            </div>
        ");
    }
}

class singleSelection1 extends formElements{
    function __construct()
    {
        parent::__construct();
        $this->ID = get_class($this) . generateRandomString();
    }

    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content';
        $label_id = $hashed_fieldName.'_label';
        $attached_btn_id = $this->ID . '_buttons';

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <label id='$this->ID' style='display: none;' for='$label_id'>
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='很簡單' />
                    很簡單
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='簡單' />
                    簡單
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='普通' />
                    普通
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='困難' />
                    困難
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='很困難' />
                    很困難
                </label>
            </div>
        ");
        echo("
            <div id='$attached_btn_id' style='margin-bottom: 15px'>
                <button data-item='0' style='margin-right: 8px; border-radius: 17px; background-color: white; color: blue'>很簡單</button>
                <button data-item='1' style='margin-right: 8px; border-radius: 17px; background-color: white; color: blue'>簡單</button>
                <button data-item='2' style='margin-right: 8px; border-radius: 17px; background-color: white; color: orange'>普通</button>
                <button data-item='3' style='margin-right: 8px; border-radius: 17px; background-color: white; color: red'>困難</button>
                <button data-item='4' style='margin-right: 8px; border-radius: 17px; background-color: white; color: red'>很困難</button>
            </div>
            <script>
                document.getElementById('$attached_btn_id').addEventListener('click', function(e) {
                    var idx = e.target.dataset.item;

                    for(i = 0; i < 5; i++) {
                        if(i == idx) {
                            document.getElementById('$this->ID').children[i].checked = true;
                            document.getElementById('$attached_btn_id').children[i].style.color = 'white';
                            if (i < 2)       document.getElementById('$attached_btn_id').children[i].style.backgroundColor = 'blue';
                            else if (i == 2) document.getElementById('$attached_btn_id').children[i].style.backgroundColor = 'orange';
                            else             document.getElementById('$attached_btn_id').children[i].style.backgroundColor = 'red';
                        } else {
                            document.getElementById('$this->ID').children[i].checked = false;
                            if (i < 2)       document.getElementById('$attached_btn_id').children[i].style.color = 'blue';
                            else if (i == 2) document.getElementById('$attached_btn_id').children[i].style.color = 'orange';
                            else             document.getElementById('$attached_btn_id').children[i].style.color = 'red';
                            document.getElementById('$attached_btn_id').children[i].style.backgroundColor = 'white';
                        }
                    }
                    e.stopPropagation();
                    e.preventDefault();
                    e.stopImmediatePropagation();
                });
            </script>
        ");
    }
}

class singleSelection2 extends formElements{
    function __construct()
    {
        parent::__construct();
        $this->ID = get_class($this) . generateRandomString();
    }

    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content';
        $label_id = $hashed_fieldName.'_label';
        $attached_btn_id = $this->ID . '_buttons';

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <label id='$this->ID' style='display: none;' for='$label_id'>
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='錄取' />
                    錄取
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='未錄取' />
                    未錄取
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='等待中' />
                    等待中
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='無聲卡' />
                    無聲卡
                </label>
            </div>
        ");
        echo("
            <div id='$attached_btn_id' style='margin-bottom: 15px'>
                <button data-item='0' style='margin-right: 8px; border-radius: 17px; background-color: white; color: blue'>錄取</button>
                <button data-item='1' style='margin-right: 8px; border-radius: 17px; background-color: white; color: red'>未錄取</button>
                <button data-item='2' style='margin-right: 8px; border-radius: 17px; background-color: white; color: orange'>等待中</button>
                <button data-item='3' style='margin-right: 8px; border-radius: 17px; background-color: white; color: black'>無聲卡</button>
            </div>
            <script>
                document.getElementById('$attached_btn_id').addEventListener('click', function(e) {
                    var idx = e.target.dataset.item;

                    for(i = 0; i < 4; i++) {
                        if(i == idx) {
                            document.getElementById('$this->ID').children[i].checked = true;
                            document.getElementById('$attached_btn_id').children[i].style.color = 'white';
                            if (i == 0)      document.getElementById('$attached_btn_id').children[i].style.backgroundColor = 'blue';
                            else if (i == 1) document.getElementById('$attached_btn_id').children[i].style.backgroundColor = 'red';
                            else if (i == 2) document.getElementById('$attached_btn_id').children[i].style.backgroundColor = 'orange';
                            else             document.getElementById('$attached_btn_id').children[i].style.backgroundColor = 'black';
                        } else {
                            document.getElementById('$this->ID').children[i].checked = false;
                            if (i == 0)      document.getElementById('$attached_btn_id').children[i].style.color = 'blue';
                            else if (i == 1) document.getElementById('$attached_btn_id').children[i].style.color = 'red';
                            else if (i == 2) document.getElementById('$attached_btn_id').children[i].style.color = 'orange';
                            else             document.getElementById('$attached_btn_id').children[i].style.color = 'black';
                            document.getElementById('$attached_btn_id').children[i].style.backgroundColor = 'white';
                        }
                    }
                    e.stopPropagation();
                    e.preventDefault();
                    e.stopImmediatePropagation();
                });
            </script>
        ");
    }
}

class multiSelection extends formElements{
    private $subtitle;
    function __construct($subtitle)
    {
        parent::__construct();
        $this->ID = get_class($this) . generateRandomString();
        $this->subtitle = $subtitle;
    }

    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content' . '[]';
        $label_id = $hashed_fieldName.'_label';
        $ids = array($label_id . '0', $label_id . '1', $label_id . '2', $label_id . '3', $label_id . '4', $label_id . '5', $label_id . '6', );

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <div id='$this->ID'>
                    <input type='checkbox' id='$ids[0]' name='$hashed_fieldName' value='個人面試' />
                    <label for='$ids[0]'> 個人面試 </label>
                    <input type='checkbox' id='$ids[1]' name='$hashed_fieldName' value='團體面試' />
                    <label for='$ids[1]'> 團體面試 </label>
                    <input type='checkbox' id='$ids[2]' name='$hashed_fieldName' value='筆試' />
                    <label for='$ids[2]'> 筆試 </label>
                    <input type='checkbox' id='$ids[3]' name='$hashed_fieldName' value='線上測驗' />
                    <label for='$ids[3]'> 線上測驗 </label>
                    <input type='checkbox' id='$ids[4]' name='$hashed_fieldName' value='電話面試' />
                    <label for='$ids[4]'> 電話面試 </label>
                    <input type='checkbox' id='$ids[5]' name='$hashed_fieldName' value='複試' />
                    <label for='$ids[5]'> 複試 </label>
                    <input type='checkbox' id='$ids[6]' name='$hashed_fieldName' value='其它' />
                    <label for='$ids[6]'> 其它 </label>
                </div>
            </div>
        ");
    }
}

class dropdown_02 extends formelements{
    private $subtitle;

    function __construct($subtitle)
    {
        parent::__construct();
        $this->subtitle = $subtitle;
        $this->ID = get_class($this) . generateRandomString();
    }

    function generateui($fieldname)
    {
        $hashed_fieldname = 'bbp_'.hashhelper($fieldname).'_content'.'[]';
        $label_id = $hashed_fieldname.'_label';

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldname</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <label id='$this->ID' for='$label_id'>
                    <select class='select2' data-minimum-results-for-search='Infinity' name='$hashed_fieldname' id='$label_id'>
                        <option value='正職'>正職</option>
                        <option value='兼職'>兼職</option>
                        <option value='實習'>實習</option>
                    </select>
                </label>
            </div>
        ");
    }
}

class dropdown_03 extends formelements{
    private $subtitle;

    function __construct($subtitle, $countries_and_cities)
    {
        parent::__construct();
        $this->subtitle = $subtitle;
        $this->file = $countries_and_cities;
        $this->type = 'dropdown_countries_and_cities';
        $this->ID = get_class($this) . generateRandomString();
    }

    function generateui($fieldname)
    {
        $hashed_fieldname = 'bbp_'.hashhelper($fieldname).'_content'.'[]';
        $label_id = $hashed_fieldname.'_label';
        $label_country = $label_id . "_country";
        $label_city = $label_id . "_city";

        $data = file_get_contents($this->file);
        $cc = json_decode($data, true);
        // echo '<pre>' . print_r($cc["日本"], true) . '</pre>';

        $html = "";
        foreach($cc as $country => $city) {
            $html .= "<option value='" . $country . "'>" . $country . "</option>";
        }
        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldname</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <div id='$this->ID'>
                    <label for='$label_country'>
                        <select id='dropdown_country' name='$hashed_fieldname' id='$label_country'> $html </select>
                    </label>
                    <label for='$label_city' style='margin-left: 10px'>
                        <select id='dropdown_city' name='$hashed_fieldname' id='$label_city'> </select>
                    </label>
                </div>
            </div>
        ");
        echo("
            <script type='text/javascript'>
                var url_fetch = window.location.href.split('interview')[0] + 'wp-json/fetch/v1/data';
                const fetchFunctionCountriesAndCities = (queryText) => jQuery.ajax({
                    url: url_fetch,
                    method: 'GET',
                    data: {type: '$this->type', text: queryText},
                    success: function (data) {
                        document.getElementById('dropdown_city').innerHTML = data;
                    },
                    error: function(e){
                        console.log(e);
                    }
                });

                document.getElementById('dropdown_country').addEventListener('change', (e) => {
                    if (e.target.value != '') {
                        if(e.target.value != '台灣'){
                            document.getElementById('dropdown_city').innerHTML = '';
                            return;
                        }
                        var cities = fetchFunctionCountriesAndCities(e.target.value);
                    }
                });
            </script>"
        );
    }
}

class dropdown_job_category extends formelements{
    private $subtitle;

    function __construct($subtitle)
    {
        parent::__construct();
        $this->subtitle = $subtitle;
        $this->ID = get_class($this) . generateRandomString();
    }

    function generateui($fieldname)
    {
        $hashed_fieldname = 'bbp_'.hashhelper($fieldname).'_content';
        $label_id = $hashed_fieldname.'_label';

        //Fetch DB data
        $htmlOfOptions = "";

        try {
            $data = $this->fetchData();

            foreach($data as $row) {
                $htmlOfOptions .= "<option value='$row->name'>$row->name</option>";
            }
        } catch (Exception $e){
            error_log($e);
        }

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldname</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <label id='$this->ID' for='$label_id'>
                    <select class='select2' name='$hashed_fieldname' id='$label_id'>
                        <option></option>
                        $htmlOfOptions
                    </select>
                </label>
            </div>
        ");
    }

    function fetchData(){
        global $wpdb;
        return $wpdb->get_results("SELECT * FROM {$wpdb->prefix}job_category");
    }
}

class dropdown_industry extends formElements{
    private $subtitle;

    function __construct($subtitle)
    {
        parent::__construct();
        $this->subtitle = $subtitle;
        $this->ID = get_class($this) . generateRandomString();
    }

    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content'.'[]';
        $label_id_1 = $hashed_fieldName.'_label_1';
        $label_id_2 = $hashed_fieldName.'_label_2';

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <div id='$this->ID'>
                    <label for='$label_id_1'>
                        <select class='select2' data-minimum-results-for-search='Infinity' name='$hashed_fieldName' id='$label_id_1'>
                            <option value='金融'>金融</option>
                            <option value='顧問'>顧問</option>
                            <option value='零售'>零售</option>
                            <option value='科技'>科技</option>
                            <option value='新創'>新創</option>
                            <option value='其它'>其它</option>
                        </select>
                    </label>
                    <label for='$label_id_2'>
                        <select class='select2' data-minimum-results-for-search='Infinity' name='$hashed_fieldName' id='$label_id_2'>
                            <option disabled selected>(無)</option>
                            <option value='金融'>金融</option>
                            <option value='顧問'>顧問</option>
                            <option value='零售'>零售</option>
                            <option value='科技'>科技</option>
                            <option value='新創'>新創</option>
                            <option value='其它'>其它</option>
                        </select>
                    </label>
                </div>
            </div>
        ");
    }
}

class dropdown_sub_industry extends formelements{
    private $subtitle;

    function __construct($subtitle)
    {
        parent::__construct();
        $this->subtitle = $subtitle;
        $this->ID = get_class($this) . generateRandomString();
    }

    function generateui($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashhelper($fieldName).'_content';
        $label_id_1 = $hashed_fieldName.'_label_1';
        $label_id_2 = $hashed_fieldName.'_label_2';

        //use for multi-dropdown column
        $hashed_fieldName .= '[]';

        echo("
            <script>
                jQuery(document).ready(function($) {
                    var data1 = [{
                        id: 0,
                        text: '金融',
                        children: [{
                            id: '金融機構',
                            text: '金融機構',
                        },
                        {
                            id: '金融機構',
                            text: '投資理財',
                        },
                        {
                            id: '保險業',
                            text: '保險業',
                        }
                        ]
                    },{
                        id: 4,
                        text: '商業',
                        children: [{
                            id: '法律服務',
                            text: '法律服務',
                        },
                        {
                            id: '會計服務',
                            text: '會計服務',
                        },
                        {
                            id: '顧問服務',
                            text: '顧問服務',
                        },
                        {
                            id: '人力仲介',
                            text: '人力仲介',
                        }
                        ]
                    }
                    ]
                    
                    var data2 = [{
                        id: '',
                        text: '(無)',
                    },{
                        id: 0,
                        text: '金融',
                        children: [{
                            id: '金融機構',
                            text: '金融機構',
                        },
                        {
                            id: '金融機構',
                            text: '投資理財',
                        },
                        {
                            id: '保險業',
                            text: '保險業',
                        }
                        ]
                    },{
                        id: 4,
                        text: '商業',
                        children: [{
                            id: '法律服務',
                            text: '法律服務',
                        },
                        {
                            id: '會計服務',
                            text: '會計服務',
                        },
                        {
                            id: '顧問服務',
                            text: '顧問服務',
                        },
                        {
                            id: '人力仲介',
                            text: '人力仲介',
                        }
                        ]
                    }
                    ]
                    
                    
                    $('#$label_id_1').select2({
                        language: 'zh-tw',
                        data: data1
                    });
                    
                    $('#$label_id_2').select2({
                        language: 'zh-tw',
                        data: data2,                        
                    });
                });
            </script>
        ");

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                
                <div id='$this->ID'>
                    <label id='$this->ID' for='$label_id_1'>
                        <select id='$label_id_1' name='$hashed_fieldName'></select>
                    </label>
                    <label id='$this->ID' for='$label_id_2'>
                        <select id='$label_id_2' name='$hashed_fieldName'></select>
                    </label>
                </div>
            </div>
        ");
    }
}

class multiTextArea extends formElements{
    private $subtitle;

    function __construct($subtitle)
    {
        parent::__construct();
        $this->subtitle = $subtitle;
        $this->ID = get_class($this) . generateRandomString();
    }

    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content'.'[]';
        $fieldID = $hashed_fieldName.'_id';
        $label_id = $hashed_fieldName.'_label';

        echo("
            <div style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <div id='$this->ID'>
                    <input id='$fieldID' name='$hashed_fieldName' type='text' size=15 maxlength=40 placeholder='#' style='padding-left: 3px;'>
                    <input id='$fieldID' name='$hashed_fieldName' type='text' size=15 maxlength=40 placeholder='#' style='padding-left: 3px; margin-left: 10px'>
                    <input id='$fieldID' name='$hashed_fieldName' type='text' size=15 maxlength=40 placeholder='#' style='padding-left: 3px; margin-left: 10px'>
                </div>
            </div>
        ");
    }
}

class date extends formElements{
    function __construct()
    {
        parent::__construct();
        $this->ID = get_class($this) . generateRandomString();
    }

    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content';

        echo("
            <div id='$this->ID' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <input type='text' id='datepicker' name='$hashed_fieldName'>
            </div>
        ");

        wp_enqueue_style( 'style', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css' );
        echo('<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>');

        //jquery
        echo("<script type='text/javascript'>
                jQuery(document).ready(function($) {
                  $( '#datepicker' ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'yy.mm',
                    onClose: function(dateText, inst) { 
                        $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                    }
                  });
                });
            </script>");
    }
}

class inputBox extends formElements{
    function __construct()
    {
        parent::__construct();
        $this->ID = get_class($this) . generateRandomString();
    }

    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content';

        echo("
            <div id='$this->ID' style='margin-bottom: 3px'>
                <p> <label>$fieldName</label> </p>
                <input type='text' name='$hashed_fieldName'>
            </div>
        ");
    }
}

class textArea extends formElements{
    private $defaultContent;
    private $subtitle;
    function __construct($defaultContent, $subtitle)
    {
        parent::__construct();
        $this->defaultContent = $defaultContent;
        $this->subtitle = $subtitle;
        $this->ID = get_class($this) . generateRandomString();
    }

    function generateUI($fieldName)
    {
        $hashed_fieldName = hashHelper($fieldName);
        error_log($fieldName.':'.$hashed_fieldName);
        echo("<b><font size='3pt'>" . $fieldName . "<b></font>");
        echo("<p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>");
        echo("<div id='$this->ID'></div>"); // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!?????????????????????????????????
        bbp_the_content( array( 'context' => $hashed_fieldName, 'textarea_rows' => 8, 'default_content' => $this->defaultContent) );
    }
}

class text extends formElements{
    private $subtitle;
    function __construct($subtitle)
    {
        parent::__construct();
        $this->subtitle = $subtitle;
        $this->ID = get_class($this) . generateRandomString();
    }

    function generateUI($fieldName)
    {
        echo("<b><font size='3pt'>" . $fieldName . "<b></font>");
        echo("<p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>");
        echo("<div id='$this->ID'></div>"); // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!?????????????????????????????????
    }
}

// to display fields in bbp new topic form
add_action( 'bbp_theme_before_topic_form_content', 'bbp_display_wp_editor_array' );
if ( ! function_exists( 'bbp_display_wp_editor_array' ) ) :
    function bbp_display_wp_editor_array() {

        //get forum id
        $forumId = bbp_get_forum_id();
        if ($forumId == 0){
            $forumId = bbp_get_topic_forum_id();
        }

        // Using material UI
        echo('<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">');
        // Using jquery velidate
        echo('<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>');

        // Using select2
        echo('<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/zh-TW.min.js"></script>');

        echo("
            <script>
                jQuery(document).ready(function($) {
                    $('.select2').select2({
                        language: 'zh-tw'
                    });
                });
            </script>
        ");


        // Read form schema
        $path = ABSPATH . 'wp-content/plugins/andy-bbp-custom-form/article_templates/' . strval($forumId) . '.txt';
        // Create an array with all hashed field name
        $field_name_array = array();
        if(file_exists($path)) {
            $lines = file($path, FILE_IGNORE_NEW_LINES);

            foreach ($lines as $line) {
                // Skip mycred row
                if (($line != '[mycred_sell_this]') && ($line != '[/mycred_sell_this]')) {
                    $row = explode(",", $line);
                    $field_name = $row[0];
                    $field_name_array[] = 'bbp_'.hashHelper($field_name).'_content';
                }
            }
        }

        //multi selection columns
        $field_name_array_4= $field_name_array[4].'[]'; //產業類別
        $field_name_array_5= $field_name_array[5].'[]'; //細分產業類別
        $field_name_array_10= $field_name_array[10].'[]'; //面試難度
        $field_name_array_11= $field_name_array[11].'[]'; //面試結果
        $field_name_array_12= $field_name_array[12].'[]'; //面試項目

        // Set the validation rules and msg for each field
        echo('
            <style>
                .errTxt{
                    color: red;
                }
            </style>
            <script>
                jQuery(document).ready(function($) {
                    //check prepare, interview, and suggest are not the same(not ok version)
                    // $.validator.methods.contentEqual = function(value, element, param){
                    //     if(value !== $("#"+param[0]).value && value !== $("#"+param[1]).value)
                    //         return true;
                    // };
                    console.log("'.$field_name_array_10.'");
                    
                    $("#new-post").validate({
                        rules:{
                            '.$field_name_array[0].': "required",
                            '.$field_name_array[1].': "required",
                            '.$field_name_array[2].': "required",
                            '.$field_name_array[3].': "required",
                            "'.$field_name_array_4.'": "required",
                            "'.$field_name_array_5.'": "required",
                            '.$field_name_array[6].': "required",
                            '.$field_name_array[7].': "required",
                            '.$field_name_array[8].': "required",
                            '.$field_name_array[9].': "required",
                            "'.$field_name_array_10.'": "required",
                            "'.$field_name_array_11.'": "required",
                            "'.$field_name_array_12.'": "required",
                            '.$field_name_array[13].': {
                                required: true,
                                rangelength: [100, 10000]
                            },
                            '.$field_name_array[14].': {
                                required: true,
                                rangelength: [100, 10000]
                            },
                            '.$field_name_array[15].': {
                                rangelength: [100, 10000]                 
                            }
                        },
                        messages:{
                            '.$field_name_array[0].': "必填",
                            '.$field_name_array[1].': "必填",
                            '.$field_name_array[2].': "必填",
                            '.$field_name_array[3].': "必填",
                            "'.$field_name_array_4.'": "必填",
                            "'.$field_name_array_5.'": "必填",
                            '.$field_name_array[6].': "必填",
                            '.$field_name_array[7].': "必填",
                            '.$field_name_array[8].': "必填",
                            '.$field_name_array[9].': "必填",
                            "'.$field_name_array_10.'": "必填",
                            "'.$field_name_array_11.'": "必填",
                            "'.$field_name_array_12.'": "必填",
                            '.$field_name_array[13].': {
//                                minlength: "再回想看看，還有什麼小細節想跟大家分享嗎？（字數下限：100）",
//                                maxlength: "非常感謝您的用心分享！（已達字數上限：100000）",
                                required: "必填",
                                rangelength: function(range, input){
                                    var length = $(input).val().length;
                                    if (length < 100){
                                        return "再回想看看，還有什麼準備的小細節想跟大家分享嗎？（字數下限：" + length + "/100）";
                                    } else if (length > 10000) {
                                        return "超過字數限制。（字數上限：" + length + "/10000）";
                                    }
                                },
                            },
                            '.$field_name_array[14].': {
                                required: "必填",
                                rangelength: function(range, input){
                                    var length = $(input).val().length;
                                    if (length < 100){
                                        return "再回想看看，還有什麼準備的小細節想跟大家分享嗎？（字數下限：" + length + "/100）";
                                    } else if (length > 10000) {
                                        return "超過字數限制。（字數上限：" + length + "/10000）";
                                    }
                                },
                            },
                            '.$field_name_array[15].': {
                                rangelength: function(range, input){
                                    var length = $(input).val().length;
                                    if (length < 100){
                                        return "再回想看看，還有什麼準備的小細節想跟大家分享嗎？（字數下限：" + length + "/100）";
                                    } else if (length > 10000) {
                                        return "超過字數限制。（字數上限：" + length + "/10000）";
                                    }
                                },                            
                            }
                        },
                        errorElement : "div",
                        errorPlacement: function (error, element) {
                            if (element.is(":radio")) {
                                error.insertAfter(element.parent("label"));
                            }
                            else if(element.is(":checkbox")) {
                                error.insertAfter(element.parent("div"));
                            }
                            else{
                                error.insertAfter(element);
                            }
                            error.addClass("errTxt");
                        }
                    });
                });
            </script>
        ');

        //Start generating form
        //read form schema
        if(file_exists($path)) {
            $lines = file($path, FILE_IGNORE_NEW_LINES);

            $componentIDs = array();
            foreach ($lines as $line) {
                //skip mycred row
                if (($line != '[mycred_sell_this]') && ($line != '[/mycred_sell_this]')) {
                    $row = explode(",", $line);
                    $field_name = $row[0];
                    $field_type = $row[1];
                    $field_default_content = $row[2];
                    $field_subtitle = $row[3];

                    if (substr($field_type, 0, 5) == "combo"){
                        $query_type=explode(":", $field_type)[1];
                        $comboBox = new comboBox($query_type, $field_subtitle);
                        $comboBox->generateUI($field_name);
                        array_push($componentIDs, $comboBox->getComponentID());
                    } else if ($field_type == 'radio') {
                        $radio = new radio($field_subtitle);
                        $radio->generateUI($field_name);
                        array_push($componentIDs, $radio->getComponentID());
                    } else if ($field_type == 'singleSelection1') {
                        $sl1 = new singleSelection1();
                        $sl1->generateUI($field_name);
                        array_push($componentIDs, $sl1->getComponentID());
                    } else if ($field_type == 'singleSelection2') {
                        $sl2 = new singleSelection2();
                        $sl2->generateUI($field_name);
                        array_push($componentIDs, $sl2->getComponentID());
                    } else if ($field_type == 'multiSelection') {
                        $ml = new multiSelection($field_subtitle);
                        $ml->generateUI($field_name);
                        array_push($componentIDs, $ml->getComponentID());
                    } else if ($field_type == 'dropdown_job_category') {
                        $dn = new dropdown_job_category($field_subtitle);
                        $dn->generateUI($field_name);
                        array_push($componentIDs, $dn->getComponentID());
                    } else if ($field_type == 'dropdown_industry') {
                        $dn1 = new dropdown_industry($field_subtitle);
                        $dn1->generateUI($field_name);
                        array_push($componentIDs, $dn1->getComponentID());
                    } else if ($field_type == 'dropdown_sub_industry') {
                        $dn2 = new dropdown_sub_industry($field_subtitle);
                        $dn2->generateUI($field_name);
                        array_push($componentIDs, $dn2->getComponentID());
                    } else if ($field_type == 'dropdown_02') {
                        $dn3 = new dropDown_02($field_subtitle);
                        $dn3->generateUI($field_name);
                        array_push($componentIDs, $dn3->getComponentID());
                    } else if ($field_type == 'dropdown_03') {
                        $cc_path = ABSPATH . 'wp-content/plugins/andy-bbp-custom-form/countries_and_cities.json';
                        $dn4 = new dropDown_03($field_subtitle, $cc_path);
                        $dn4->generateUI($field_name);
                        array_push($componentIDs, $dn4->getComponentID());
                    } else if ($field_type == 'date') {
                        $date = new date();
                        $date->generateUI($field_name);
                        array_push($componentIDs, $date->getComponentID());
                    } else if ($field_type == 'textarea') {
                        $textarea = new textArea($field_default_content, $field_subtitle);
                        $textarea->generateUI($field_name);
                        array_push($componentIDs, $textarea->getComponentID());
                    } else if ($field_type == 'multiTextArea') {
                        $multiTextArea = new multiTextArea($field_subtitle);
                        $multiTextArea->generateUI($field_name);
                        array_push($componentIDs, $multiTextArea->getComponentID());
                    } else if ($field_type == 'inputBox') {
                        $inputBox = new inputBox();
                        $inputBox->generateUI($field_name);
                        array_push($componentIDs, $inputBox->getComponentID());
                    } else if ($field_type == 'text') {
                        $text = new text($field_subtitle);
                        $text->generateUI($field_name);
                        array_push($componentIDs, $text->getComponentID());
                    }
                }
            }

            echo("
                <style>
                    .check_result {
                        margin-bottom: 5px;
                    }
                    #modal{
                        display: none;
                        position: fixed;
                        left: 50%;
                        top: 55%;
                        width: 920px;
                        height: 500px;
                        margin-left: -460px;
                        margin-top: -280px;
                        z-index: 999;
                        border: 2px solid #444;
                        box-shadow: 1px 5px 5px #666;
                        background: white;
                        overflow-x: auto;
                        overflow-y: auto;
                    }
                </style>
                <script>
                    const modal = document.createElement('div'); 
                    modal.id = 'modal';
                    var beforeThis = document.getElementById('page');
                    document.body.insertBefore(modal, beforeThis);
                </script>
            ");

            echo("
                <script type='text/javascript'>
                    fetchFunctionCountriesAndCities($componentIDs[9].children[0].children[0].value);
                    function cancelClicked() {
                        document.getElementById('page').setAttribute('transition', '');
                        document.getElementById('page').style.pointerEvents = '';
                        document.getElementById('page').style.filter = '';
                        document.getElementById('modal').style.display = 'none';
                        document.getElementById('bbp_topic_submit').disabled = false;
                    };
                    function submitClicked() {
                        jQuery('#new-post').submit(); // Submit event should be fired by jQuery, otherwise the jQuery validator will not be triggered.
                    };
                </script>
                <script type='text/javascript'>
                    // In this time, the submit button (which id is bbp_topic_submit is not yet created)
                    function showInterviewExperienceInput() {
                        var result = '<div style=\"margin-top: -12px; padding-top: 20px; padding-left: 40px; padding-right: 40px; padding-bottom: 18px; background: linear-gradient(#0A2D87 11.9%, white 0%);\">';
                        result += '<div style=\"color: white;\"><h3 style=\"color: white\">預覽畫面</h3>';
                        result += '<h5 class=\"check_result\" style=\"color: white\">' + document.getElementById('$componentIDs[0]').value + '&nbsp' + document.getElementById('$componentIDs[2]').value + '&nbsp' + '面試心得' + '</h5>';
                        result += '</div>';
                        result += '<br>';
                        result += '<h6 class=\"check_result\">公司名稱</h6><text>' + document.getElementById('$componentIDs[0]').value + '</text>';
                        result += '<h6 class=\"check_result\">職務性質</h6><text>' + document.getElementById('$componentIDs[1]').children[0].value + '</text>';
                        result += '<h6 class=\"check_result\">職務名稱</h6><text>' + document.getElementById('$componentIDs[2]').value + '</text>';
                        result += '<h6 class=\"check_result\">是否匿名</h6><text>';
                        for(var i = 0; i < 2; i++) {
                            if (document.getElementById('$componentIDs[3]').children[i].checked)
                                result += document.getElementById('$componentIDs[3]').children[i].value;
                        }
                        result += '</text>';
                        result += '<h6 class=\"check_result\">作者背景</h6><text>' + document.getElementById('$componentIDs[4]').nextElementSibling.children[0].children[0].value + '</text>';
                        result += '<h6 class=\"check_result\">面試時間</h6><text>' + document.getElementById('datepicker').value + '</text>';
                        result += '<h6 class=\"check_result\">職缺地點</h6><text>' + document.getElementById('$componentIDs[6]').children[0].children[0].value, document.getElementById('$componentIDs[6]').children[1].children[0].value + '</text>';
                        result += '<h6 class=\"check_result\">面試難度</h6>';
                        for(var i = 0; i < 4; i++) {
                            if (document.getElementById('$componentIDs[7]').children[i].checked) {
                                var val = document.getElementById('$componentIDs[7]').children[i].value;
                                var bc = 'orange';
                                if (i == 0 || i == 1) bc = 'blue';
                                else if (i == 3 || i == 4) bc = 'red';
                                result += '<button style=\"margin-top: 5px; margin-bottom: 8px; border-radius: 17px; border-color: ' + bc + '; background-color: ' + bc + '; color: white\">' + val + '</button>';
                            }
                        }
                        result += '</text>';
                        result += '<h6 class=\"check_result\">面試結果</h6><text>';
                        for(var i = 0; i < 3; i++) {
                            if (document.getElementById('$componentIDs[8]').children[i].checked) {
                                var val = document.getElementById('$componentIDs[8]').children[i].value;
                                var bc = 'black';
                                if (i == 0) bc = 'blue';
                                else if (i == 1) bc = 'red';
                                else if (i == 2) bc = 'orange';
                                result += '<button style=\"margin-top: 5px; margin-bottom: 8px; border-radius: 17px; border-color: ' + bc + '; background-color: ' + bc + '; color: white\">' + val + '</button>';
                            }
                        }
                        result += '<h6 class=\"check_result\">面試項目</h6><text>';
                        [...document.getElementById('$componentIDs[9]').children].forEach((ele, idx) => {
                            if (idx % 2 == 0 && ele.checked == true){
                                result += document.getElementById('$componentIDs[9]').children[idx].value + ', ';
                            }
                        });
                        result += '</text>';
                        result += '<hr style=\"height:0.8px;background-color:gray;\">';
                        result += '<h6 class=\"check_result\">準備過程</h6><text>' + document.getElementById('$componentIDs[10]').nextElementSibling.children[0].children[0].value + '</text>';
                        result += '<h6 class=\"check_result\">面試過程</h6><text>' + document.getElementById('$componentIDs[11]').nextElementSibling.children[0].children[0].value + '</text>';
                        result += '<h6 class=\"check_result\">心得建議</h6><text>' + document.getElementById('$componentIDs[12]').nextElementSibling.children[0].children[0].value + '</text>';
                        result += '<br>';
                        if (document.getElementById('$componentIDs[14]').children[1].children[0].value != '') {
                            var val = document.getElementById('$componentIDs[14]').children[1].children[0].value;
                            result += '<button style=\"margin-right: 22px; margin-top: 5px; margin-bottom: 8px; border-radius: 17px; border-color: #F7F8FC; background-color: #F7F8FC; color: #1B3B90\">' + val + '</button>';
                        }
                        if (document.getElementById('$componentIDs[14]').children[0].children[0].value != '') {
                            var val = document.getElementById('$componentIDs[14]').children[0].children[0].value;
                            result += '<button style=\"margin-right: 22px; margin-top: 5px; margin-bottom: 8px; border-radius: 17px; border-color: #F7F8FC; background-color: #F7F8FC; color: #1B3B90\">' + val + '</button>';
                        }
                        if (document.getElementById('$componentIDs[15]').children[0].value != '') {
                            var val = document.getElementById('$componentIDs[15]').children[0].value;
                            result += '<button style=\"margin-right: 22px; margin-top: 5px; margin-bottom: 8px; border-radius: 17px; border-color: #F7F8FC; background-color: #F7F8FC; color: #1B3B90\">' + val + '</button>';
                        }
                        if (document.getElementById('$componentIDs[15]').children[1].value != '') {
                            var val = document.getElementById('$componentIDs[15]').children[1].value;
                            result += '<button style=\"margin-right: 22px; margin-top: 5px; margin-bottom: 8px; border-radius: 17px; border-color: #F7F8FC; background-color: #F7F8FC; color: #1B3B90\">' + val + '</button>';
                        }
                        if (document.getElementById('$componentIDs[15]').children[2].value != '') {
                            var val = document.getElementById('$componentIDs[15]').children[2].value;
                            result += '<button style=\"margin-right: 22px; margin-top: 5px; margin-bottom: 8px; border-radius: 17px; border-color: #F7F8FC; background-color: #F7F8FC; color: #1B3B90\">' + val + '</button>';
                        }
                        var btns = ' <div style=\"text-align: right;\"> <button id=\"modal_cancel\" type=\"button\" onclick=\"cancelClicked()\" style=\"color: white; background-color: red; border-color: red; margin-top: 28px; bottom: 10px; margin-right: 25px;\">上一步</button> <button id=\"modal_submit\" type=\"button\" onclick=\"submitClicked()\" style=\"color: white; background-color: #1F3372; margin-top: 28px; bottom: 10px;\">確認發佈</button> </div>';
                        result += btns;
                        result += '</div>';
                        result = result.trim();

                        var mdl = document.getElementById('modal');
                        mdl.innerHTML = '';
                        mdl.innerHTML += result;
                        mdl.style.display = 'block';
                        document.getElementById('page').setAttribute('transition', '.8s filter');
                        document.getElementById('page').style.pointerEvents = 'none';
                        document.getElementById('page').style.filter = 'blur(1.5px)';
                    }
                </script>
            ");
        }
        else {
            bbp_the_content( array( 'context' => 'topic' ) ); //bbpress default
        }
    }

    function hashHelper($name)
    {
        return hash('ripemd160', $name);
    }
endif;

add_action('bbp_theme_after_topic_form_submit_button', 'detect_submit_button');
if( !function_exists('detect_submit_button') ):
    function detect_submit_button() {
        // for issue 49, start
        $forumId = bbp_get_forum_id();
        if ($forumId == 0){
            $forumId = bbp_get_topic_forum_id();
        }
        if ($forumId==70){
            return;
        }
        // for issue 49, end
//        echo("
//            <script type='text/javascript'>
//                const formElement = document.getElementById('bbp_topic_submit');
//                formElement.addEventListener('click', function originalSubmitButtonClick(e) {
//                    if(jQuery('#new-post').valid()) {
//                        e.target.disabled = true;
//                        showInterviewExperienceInput();
//                    }
//                });
//            </script>
//        ");
    }
endif;

// to parse post data into post content
add_filter( 'bbp_get_my_custom_post_fields', 'bbp_get_custom_post_data');
if ( ! function_exists( 'bbp_get_custom_post_data' ) ) :
    function bbp_get_custom_post_data() {
        $forumId = $_POST['bbp_forum_id'];
        $path = ABSPATH.'wp-content/plugins/andy-bbp-custom-form/article_templates/' . strval($forumId) . '.txt';
        $content = '';
        $must_fill_tag = '*';

        //add to post metadata
        // update_post_meta( $_POST['bbp_topic_id'], 'company_name', $_POST['company_name'] );

        if(file_exists($path)){
            $customizedTopic = "";
            $isAnonymous = false;
            $customizedTags = "";
            $lines = file($path, FILE_IGNORE_NEW_LINES);
            foreach ($lines as $key => $line) {
                if (($line != '[mycred_sell_this]') && ($line != '[/mycred_sell_this]')) {
                    error_log('line:'.$line);
                    $row = explode(",", $line);
                    $field_name = $row[0];
                    $field_type = $row[1];
                    $field_key = hash('ripemd160',$field_name);

                    //是否將此欄位存到文章內容中
                    $saveToPost = true;

                    if ($key == 0){ // 公司名稱
                        insertDataToDB($_POST['bbp_' . $field_key . '_content']);
                        $customizedTopic .= $_POST['bbp_' . $field_key . '_content'] . " ";
                    } else if ($key == 3) { // 職務名稱
                        $customizedTopic .= $_POST['bbp_' . $field_key . '_content'] . "面試經驗";
                    } else if ($key == 6) { // 匿名
                        $isAnonymous = $_POST['bbp_' . $field_key . '_content'] == '是' ? 1:0;
                        $saveToPost = false; //不存入 anonymous 欄位
                    }

                    //加入欄位內容
                    if ( ! empty( $_POST['bbp_' . $field_key . '_content'] ) && $field_type != 'text' && $saveToPost) {
                        //加入欄位標題
                        $field_title = "<strong><u><font size='3pt'>" . str_replace($must_fill_tag,"",$field_name) . "</strong></u></font>
                ";
                        $content .= $field_title;

                        $token = '<noscript>' . $field_key . '</noscript>';

                        if (is_array($_POST['bbp_' . $field_key . '_content'])){ //處理欄位多值
                            $content .= $token;

                            //去除 array 中的空白值, 以防產生逗號結尾文字 ex. array 有三個值 ['1', '2', ''] ---> print 出 ' 1,2, '
                            $arr = $_POST['bbp_' . $field_key . '_content'];
                            $arr = array_filter($arr, function($value) { return !is_null($value) && $value !== ''; });

                            foreach($arr as $key1=>$item){
                                error_log($field_name.":".$item);
                                if ($key1 != count($arr) -1){
                                    $content .= $item . ', ';
                                } else {
                                    $content .= $item;
                                }

                                //customized tags
                                if ($field_name == '產業類別<a style="color:#FF0000;font-size:20px;">*</a>' || $field_name == '細分產業類別<a style="color:#FF0000;font-size:20px;">*</a>' || $field_name == '標籤') {
                                    $customizedTags .= $item . ', ';
                                }
                            }
                            $content .= $token;
                        } else {
                            $content .= $token . $_POST['bbp_' . $field_key . '_content'] . $token;
                        }
                    }

                    $content .= '

                ';
                } else {
                    $content .= $line;
                    continue;
                }
            }
            error_log($customizedTags);
            return array($customizedTopic, $isAnonymous, $customizedTags, $content);
        } else {
            $content = $_POST['bbp_topic_content'];
            return array($content);
        }
    }

    function insertDataToDB($company_name)
    {
        global $wpdb;

        $posts_table = $wpdb->prefix . "company";
        $query = " (name) value ('" . $company_name . "')";
        $wpdb->get_results( "INSERT " . $posts_table . $query . " ON DUPLICATE KEY UPDATE name = " . "'$company_name'");
        // insert wp_interview_form (industry, country, city) value ('zzz', 'xx', 'yy');

        return 'Data written !!';
    }

endif;

// get content to prepopulate the editor
// called inside bbp bbp_get_the_content() in wp-content/plugins/bbpress/includes/common/template.php
add_filter('bbp_get_topic_field_content', 'get_topic_field_content');
if ( ! function_exists( 'get_topic_field_content' ) ) :
    function get_topic_field_content($field_key) {
        // Get _POST data
        // at this case, $field_key is already the hash key
        if ( bbp_is_topic_form_post_request() && isset( $_POST['bbp_' . $field_key . '_content'] ) ) {
            $topic_content = wp_unslash( $_POST['bbp_' . $field_key . '_content'] );
        // Get edit data
        } elseif ( bbp_is_topic_edit() ) {
            $topic_content = bbp_get_global_post_field( 'post_content', 'raw' );
            $token = '<noscript>' . $field_key . '</noscript>';
            $start = strpos($topic_content, $token);
            if (! $start){
                return '';
            }
            $start += strlen($token);
            $end = $start + strpos(substr($topic_content, $start) , $token);
            $topic_content = substr($topic_content, $start, $end-$start);
        // No data
        } else {
            $topic_content = '';
        }
        return $topic_content;
    }
endif;

// Show message above the new topic form to indicate * as must answer fields
add_action( 'bbp_theme_before_topic_form_notices', 'bbp_display_must_answer_fields_message' );
if ( ! function_exists( 'bbp_display_must_answer_fields_message' ) ) :
    function bbp_display_must_answer_fields_message() {
        // for issue 49 start
        $forumId = bbp_get_forum_id();
        if ($forumId == 0){
            $forumId = bbp_get_topic_forum_id();
        }
        if($forumId!=70){ //for issue 49 end
?>
    
                    <div class="bbp-template-notice">
                        <ul>
                            <li><a style="color:#FF0000;font-size:20px;">*</a>為必填項目</li>
                        </ul>
                    </div>
<?php
        }  //for issue 49
    }
endif;
