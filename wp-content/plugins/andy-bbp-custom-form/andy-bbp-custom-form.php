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
    $param = $request['industry']; // $request->get_params(); // JSON: {industry: "ds"}
    if($param == '') {
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
    $posts_table = $wpdb->prefix . "interview_form";
    maybe_create_table( $posts_table,
        "CREATE TABLE `{$posts_table}` (
        `id` bigint(20) NOT NULL AUTO_INCREMENT,
        `industry` varchar(40) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
        ) $charset_collate AUTO_INCREMENT=1;"
    );
    $rows = $wpdb->get_results( "SELECT industry FROM " . $posts_table . " WHERE industry like '%" . $param . "%'");
    // select * from users where users.email like '%abc%';

    $query = array();
    if(!empty($rows)){
        foreach($rows as $r) {
            array_push($query, $r->industry);
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
    $query = " (industry) value ('" . strval($d['industry']) . "')";
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

add_action('bbp_theme_after_topic_form_title', 'live_search');
if ( !function_exists('live_search') ) :
    function live_search() {
//        echo("
//            <div id='search_bar' style='margin-bottom: 3px'>
//                <p style='margin-bottom: -2px'> <label>公司產業類別：</label> </p>
//                <input id='search_input' list='suggestions_industry' type='text' size=40 maxlength=40 placeholder='Fill in your industry' style='padding-left: 3px;'>
//                <datalist id='suggestions_industry'></datalist>
//            </div>
//        ");
//        echo("
//            <script type='text/javascript' >
//                // http://localhost/wordpress/wp-json/fetch_industry/v1/data?industry=marketing.
//                // Start from '?' is added by ajax. You can write down all of params in `url` and omit `data`, e.g. url: url + query.toString()
//                var url_fetch = window.location.href.split('interview')[0] + 'wp-json/fetch_industry/v1/data';
//                const fetch_industry = (query) => jQuery.ajax({
//                    url: url_fetch,
//                    method: 'GET',
//                    dataType: 'json',
//                    data: {industry: query},
//                    contentType: 'application/json',
//                    success: function (data) {
//                        console.log('(Fetch data)', data);
//                        document.getElementById('suggestions_industry').innerHTML = '';
//                        var input_box = document.getElementById('suggestions_industry');
//                        [...data].forEach((item, idx) => {
//                            var ele = document.createElement('option');
//                            ele.value=item;
//                            input_box.appendChild(ele);
//                        });
//                    },
//                    error: function(e){
//                        console.log(e);
//                    }
//                });
//                var prev = '';
//                document.getElementById('search_input').addEventListener('input', function(e){
//                    var curr = e.target.value;
//                    if( prev || curr ) {
//                        prev = curr;
//                        fetch_industry(curr);
//                        console.log(curr);
//                    }
//                });
//            </script>
//        ");
//         Tinymce lisener is not working !!!
//        echo("<script src='http://localhost/wordpress/wp-includes/js/tinymce/tinymce.min.js'>
//                 console.log(12345);
//                 setTimeout(function(){
//                 tinymce.activeEditor.on('keypress', function(e) {
//                     console.log('!!!!!!!@@@@@@@######');
//                 })}, 1000);
//             </script>
//        ");
    }
endif;

add_action('bbp_theme_after_topic_form_submit_button', 'detect_submit_button');
if( !function_exists('detect_submit_button') ):
    function detect_submit_button() {
        echo("
            <script type='text/javascript'>
                var url_write = window.location.href.split('interview')[0] + 'wp-json/write_interview_data/v1/data';
                const write_interview_data_request = (query) => jQuery.ajax({
                    url: url_write,
                    method: 'GET',
                    dataType: 'json',
                    data: {industry: query, country: 'Taiwan', city: 'Taipei'},
                    contentType: 'application/json',
                    success: function (data) {
                        console.log('(Data written)', data);
                        document.getElementById('new-post').submit();
                    },
                    error: function(e){
                        console.log(e);
                    }
                });

                const formElement = document.getElementById('bbp_topic_submit');
                formElement.addEventListener('click', (e) => {
                    e.target.disabled = true;
                    var query = document.getElementById('search_input').value;
                    write_interview_data_request(query);
                });

            </script>
        ");
    }
endif;

// to display fields in bbp new topic form
add_action( 'bbp_theme_before_topic_form_content', 'bbp_display_wp_editor_array' );
if ( ! function_exists( 'bbp_display_wp_editor_array' ) ) :
	function bbp_display_wp_editor_array() {
	    $forumId = bbp_get_forum_id();
	    if ($forumId == 0){
	        $forumId = bbp_get_topic_forum_id();
	    }
        $path = ABSPATH.'wp-content/plugins/andy-bbp-custom-form/article_templates/' . strval($forumId) . '.txt';
        if(file_exists($path)) {
            $lines = file($path, FILE_IGNORE_NEW_LINES);

            //Insert Input Fields
            ShowInput_Company();
            foreach ($lines as $field_name) {
               if (($field_name == '[mycred_sell_this]') || ($field_name == '[/mycred_sell_this]') ){
                   continue;
               }

               echo("<b><font size='3pt'>" . $field_name . "<b></font>");
               $field_key = hash('ripemd160',$field_name);
               bbp_the_content( array( 'context' => $field_key ) );
            }
        }
        else {
            bbp_the_content( array( 'context' => 'topic' ) ); //bbpress default
        }
	}

    function ShowInput_Company(){
        echo("
            <div id='search_bar' style='margin-bottom: 3px'>
                <p style='margin-bottom: -2px'> <label>公司產業類別：</label> </p>
                <input id='search_input' name='company_name' list='suggestions_industry' type='text' size=40 maxlength=40 placeholder='Fill in your industry' style='padding-left: 3px;'>
                <datalist id='suggestions_industry'></datalist>
            </div>
        ");
        echo("
            <script type='text/javascript' >
                // http://localhost/wordpress/wp-json/fetch_industry/v1/data?industry=marketing.
                // Start from '?' is added by ajax. You can write down all of params in `url` and omit `data`, e.g. url: url + query.toString()
                var url_fetch = window.location.href.split('interview')[0] + 'wp-json/fetch_industry/v1/data';
                const fetch_industry = (query) => jQuery.ajax({
                    url: url_fetch,
                    method: 'GET',
                    dataType: 'json',
                    data: {industry: query},
                    contentType: 'application/json',
                    success: function (data) {
                        console.log('(Fetch data)', data);
                        document.getElementById('suggestions_industry').innerHTML = '';
                        var input_box = document.getElementById('suggestions_industry');
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
                var prev = '';
                document.getElementById('search_input').addEventListener('input', function(e){
                    var curr = e.target.value;
                    if( prev || curr ) {
                        prev = curr;
                        fetch_industry(curr);
                        console.log(curr);
                    }
                });
            </script>
        ");
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

        if(file_exists($path)){
            $lines = file($path, FILE_IGNORE_NEW_LINES);
            foreach ($lines as $field_name) {
                if (($field_name == '[mycred_sell_this]') || ($field_name == '[/mycred_sell_this]') ){
                    $content .= $field_name;
                    continue;
                }
                $field_title = "<strong><u><font size='3pt'>" . str_replace($must_fill_tag,"",$field_name) . "</strong></u></font>
                ";
                $content .= $field_title;
                $field_key = hash('ripemd160',$field_name);
                if ( ! empty( $_POST['bbp_' . $field_key . '_content'] ) ) {
                    $token = '<noscript>' . $field_key . '</noscript>';
                    $content .= $token . $_POST['bbp_' . $field_key . '_content'] . $token;
                }else{
                    if (strpos($field_name, $must_fill_tag) != false){
                        bbp_add_error( 'bbp_edit_topic_content', __( '<strong>錯誤</strong>： 你有必填項目「' . str_replace($must_fill_tag,"",$field_name) . '」未填', 'bbpress' ) );
                    }
                }
                $content .= '


                ';
            }
        }else{
            $content = $_POST['bbp_topic_content'];
        }
        error_log($content);

        return $content;
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
