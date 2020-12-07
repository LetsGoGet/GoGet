<?php
/*
Plugin Name: Andy bbp custom form
Plugin URI:
Description:
Author: Andy Chen
Author URI:
Version: 1.0.0
*/

function live_search_handler($request) {
    global $wpdb;

    // return array('bb', 'bsfbbbewqe', 'zbbvbb', 'bwwwb'); // testing
    $queryType = $request['type'];
    $queryText = $request['text']; // $request->get_params(); // JSON: {industry: "ds"}

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
            $rows = $wpdb->get_results( "SELECT name FROM " . $posts_table . " WHERE name like '%" . $queryText . "%'");
            // select * from users where users.email like '%abc%';
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
            // select * from users where users.email like '%abc%';
            break;
    }

    $query = array();
    if(!empty($rows)){
        foreach($rows as $r) {
            array_push($query, $r->name);
        }
    }
    return $query;
}

function write_interview_data_handler($request) {
    global $wpdb;

    $d = $request->get_params();
    if($d['industry'] == '' || $d['country'] == '' || $d['city'] == '') {
        return '';
    }

    $posts_table = $wpdb->prefix . "interview_form";
    $query = " (company) value ('" . strval($d['name']) . "')";
    $wpdb->get_results( "INSERT " . $posts_table . $query);
    // insert wp_interview_form (industry, country, city) value ('zzz', 'xx', 'yy');

    return 'Data written !!';
}

add_action('rest_api_init', 'write_interview_data');
function write_interview_data($data) {
    register_rest_route( 'write_interview_data/v1', '/data/', array(
            'methods'  => 'GET',
            'callback' => 'write_interview_data_handler',
    ));
}

add_action('rest_api_init', 'fetch_live_search_data');
function fetch_live_search_data($data) { // http://localhost/wordpress/wp-json/test/v1/data?industry=資訊
    register_rest_route( 'fetch_industry/v1', '/data/', array(
            'methods'  => 'GET',
            'callback' => 'live_search_handler',
    ));
}

class formElements{
    public function __construct()
    {
    }

    function generateUI($fieldName){
        return $fieldName;
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
    }

    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content';
        $fieldID = $hashed_fieldName.'_input';
        $listID = $hashed_fieldName.'_list';
        $fetchFunction = $hashed_fieldName.'_fetchData';

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <input id='$fieldID' name='$hashed_fieldName' list='$listID' type='text' size=40 maxlength=40 style='padding-left: 3px;'>
                <datalist id='$listID'></datalist>
            </div>
        ");

        //javascript
        echo("<script type='text/javascript'>
                    // http://localhost/wordpress/wp-json/fetch_industry/v1/data?industry=marketing.
                    // Start from '?' is added by ajax. You can write down all of params in `url` and omit `data`, e.g. url: url + query.toString()
                    var url_fetch = window.location.href.split('interview')[0] + 'wp-json/fetch_industry/v1/data';
                    const $fetchFunction = (queryText) => jQuery.ajax({
                        url: url_fetch,
                        method: 'GET',
                        dataType: 'json',
                        data: {type: '$this->type', text: queryText},
                        contentType: 'application/json',
                        success: function (data) {
                            console.log('(Fetch data)', data);
                            document.getElementById('$listID').innerHTML = '';
                            var input_box = document.getElementById('$listID');
                            [...data].forEach((item, idx) => {
                                var ele = document.createElement('option');
                                ele.value=item;
                                input_box.appendChild(ele);
                            });
                        },
                        error: function(e){
                            console.log(e);
                        }
                    });

                    //event listener
                    var prev = '';
                    document.getElementById('$fieldID').addEventListener('input', function(e){
                    var curr = e.target.value;
                    if( prev || curr ) {
                        prev = curr;
                        $fetchFunction(curr);
                        console.log(curr);
                    }
                });</script>");
    }
}

class radio extends formElements{
    private $subtitle;
    function __construct($subtitle)
    {
        parent::__construct();
        $this->subtitle = $subtitle;

    }

    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content';
        $label_id = $hashed_fieldName.'_label';


        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <label for='$label_id'>
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='是' />
                    是
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='否' />
                    否
                </label>
            </div>
        ");
    }
}

class singleSelection1 extends formElements{
    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content';
        $label_id = $hashed_fieldName.'_label';

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <label for='$label_id'>
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
    }
}

class singleSelection2 extends formElements{
    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content';
        $label_id = $hashed_fieldName.'_label';

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <label for='$label_id'>
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
    }
}

class multiSelection extends formElements{
    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content';
        $label_id = $hashed_fieldName.'_label';

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <label for='$label_id'>
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='個人面試' />
                    個人面試
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='團體面試' />
                    團體面試
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='筆試' />
                    筆試
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='線上測驗' />
                    線上測驗
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='電話面試' />
                    電話面試
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='複試' />
                    複試
                    <input type='radio' id='$label_id' name='$hashed_fieldName' value='其它' />
                    其它
                </label>
            </div>
        ");
    }
}

class dropDown extends formElements{
    private $subtitle;

    function __construct($subtitle)
    {
        parent::__construct();
        $this->subtitle = $subtitle;

    }

    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content'.'[]';
        $label_id = $hashed_fieldName.'_label';

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <label for='$label_id'>
                    <select name='$hashed_fieldName' id='$label_id'>
                        <option value='金融'>金融</option>
                        <option value='顧問'>顧問</option>
                        <option value='快消'>快消</option>
                        <option value='零售'>零售</option>
                        <option value='科技'>科技</option>
                        <option value='新創'>新創</option>
                        <option value='其它'>其它</option>
                    </select>
                </label>
                
                <label for='$label_id'>
                    <select name='$hashed_fieldName' id='$label_id'>
                        <option value='金融'>金融</option>
                        <option value='顧問'>顧問</option>
                        <option value='快消'>快消</option>
                        <option value='零售'>零售</option>
                        <option value='科技'>科技</option>
                        <option value='新創'>新創</option>
                        <option value='其它'>其它</option>
                    </select>
                </label>
            </div>
        ");
    }
}

class multiTextArea extends formElements{
    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content'.'[]';
        $fieldID = $hashed_fieldName.'_id';
        $label_id = $hashed_fieldName.'_label';

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
                <input id='$fieldID' name='$hashed_fieldName' type='text' size=15 maxlength=40 placeholder='#' style='padding-left: 3px;'>
                <input id='$fieldID' name='$hashed_fieldName' type='text' size=15 maxlength=40 placeholder='#' style='padding-left: 3px; margin-left: 10px'>
                <input id='$fieldID' name='$hashed_fieldName' type='text' size=15 maxlength=40 placeholder='#' style='padding-left: 3px; margin-left: 10px'>
            </div>
        ");
    }
}

class date extends formElements{

    function generateUI($fieldName)
    {
        $hashed_fieldName = 'bbp_'.hashHelper($fieldName).'_content';

        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>$fieldName</label> </p>
                <p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>
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

class textArea extends formElements{
    private $defaultContent;
    private $subtitle;
    function __construct($defaultContent, $subtitle)
    {
        parent::__construct();
        $this->defaultContent = $defaultContent;
        $this->subtitle = $subtitle;
    }
    function generateUI($fieldName)
    {
        $hashed_fieldName = hashHelper($fieldName);
        error_log($fieldName.':'.$hashed_fieldName);
        echo("<b><font size='3pt'>" . $fieldName . "<b></font>");
        echo("<p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>");
        bbp_the_content( array( 'context' => $hashed_fieldName, 'textarea_rows' => 8, 'default_content' => $this->defaultContent) );
    }
}

class text extends formElements{
    private $subtitle;
    function __construct($subtitle)
    {
        parent::__construct();
        $this->subtitle = $subtitle;
    }

    function generateUI($fieldName)
    {
        echo("<b><font size='3pt'>" . $fieldName . "<b></font>");
        echo("<p style='font-size: 9px; color: #9c9c9c'>$this->subtitle</p>");
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

	    //using material UI
        echo('<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">');


	    //Start generating form

	    //read form schema
        $path = ABSPATH.'wp-content/plugins/andy-bbp-custom-form/article_templates/' . strval($forumId) . '.txt';
        if(file_exists($path)) {
            $lines = file($path, FILE_IGNORE_NEW_LINES);

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
                    } else if ($field_type == 'radio') {
                        $radio = new radio($field_subtitle);
                        $radio->generateUI($field_name);
                    } else if ($field_type == 'singleSelection1') {
                        $sl1 = new singleSelection1();
                        $sl1->generateUI($field_name);
                    } else if ($field_type == 'singleSelection2') {
                        $sl2 = new singleSelection2();
                        $sl2->generateUI($field_name);
                    } else if ($field_type == 'multiSelection') {
                        $ml = new multiSelection();
                        $ml->generateUI($field_name);
                    } else if ($field_type == 'dropdown') {
                        $dn = new dropDown($field_subtitle);
                        $dn->generateUI($field_name);
                    } else if ($field_type == 'date') {
                        $date = new date();
                        $date->generateUI($field_name);
                    } else if ($field_type == 'textarea') {
                        $textarea = new textArea($field_default_content, $field_subtitle);
                        $textarea->generateUI($field_name);
                    } else if ($field_type == 'multiTextArea') {
                        $multiTextArea = new multiTextArea();
                        $multiTextArea->generateUI($field_name);
                    } else if ($field_type == 'text') {
                        $text = new text($field_subtitle);
                        $text->generateUI($field_name);
                    }
                }
            }
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


// to parse post data into post content
add_filter( 'bbp_get_my_custom_post_fields', 'bbp_get_custom_post_data');
if ( ! function_exists( 'bbp_get_custom_post_data' ) ) :
	function bbp_get_custom_post_data() {
	    $forumId = $_POST['bbp_forum_id'];
        $path = ABSPATH.'wp-content/plugins/andy-bbp-custom-form/article_templates/' . strval($forumId) . '.txt';
        $content = '';
        $must_fill_tag = '*';

        //add to post metadata
//        update_post_meta( $_POST['bbp_topic_id'], 'company_name', $_POST['company_name'] );

        //insert company data to db

        if(file_exists($path)){
            $lines = file($path, FILE_IGNORE_NEW_LINES);
            foreach ($lines as $key => $line) {
                if (($line != '[mycred_sell_this]') && ($line != '[/mycred_sell_this]')) {
                    error_log('line:'.$line);
                    $row = explode(",", $line);
                    $field_name = $row[0];
                    $field_type = $row[1];
                    $field_key = hash('ripemd160',$field_name);

                    //加入公司名稱
                    if ($key == 0){ //公司名稱
                        insertDataToDB($_POST['bbp_' . $field_key . '_content']);
                    }

                    //加入欄位內容
                    if ( ! empty( $_POST['bbp_' . $field_key . '_content'] ) && $field_type != 'text') {
                        //加入欄位標題
                        $field_title = "<strong><u><font size='3pt'>" . str_replace($must_fill_tag,"",$field_name) . "</strong></u></font>
                ";
                        $content .= $field_title;

                        $token = '<noscript>' . $field_key . '</noscript>';

                        if (is_array($_POST['bbp_' . $field_key . '_content'])){
                            $content .= $token;
                            foreach($_POST['bbp_' . $field_key . '_content'] as $key1=>$item){
                                error_log($field_name.':'.$item);
                                if ($key1 != count($_POST['bbp_' . $field_key . '_content']) -1 ){
                                    $content .= $item . ', ';
                                } else {
                                    $content .= $item;
                                }
                            }
                            $content .= $token;
                        } else {
                            $content .= $token . $_POST['bbp_' . $field_key . '_content'] . $token;
                        }
//                        error_log("欄位值:".$_POST['bbp_' . $field_key . '_content']);
                    }else{
                        if (strpos($field_name, $must_fill_tag) != false){
                            bbp_add_error( 'bbp_edit_topic_content', __( '<strong>錯誤</strong>： 你有必填項目「' . str_replace($must_fill_tag,"",$field_name) . '」未填', 'bbpress' ) );
                        }
                    }
                    $content .= '


                ';
                } else {
                    $content .= $line;
                    continue;
                }
            }
        }else{
            $content = $_POST['bbp_topic_content'];
        }

        error_log($content);
        return $content;
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
?>
					<div class="bbp-template-notice">
						<ul>
							<li><a style="color:#FF0000;font-size:20px;">*</a>為必填項目</li>
						</ul>
					</div>
<?php
	}
endif;
