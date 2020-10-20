<?php
/*
Plugin Name: Andy bbp custom form
Plugin URI: 
Description:
Author: Andy Chen
Author URI:
Version: 1.0.0
*/

// to display fields in bbp new topic form
add_action( 'bbp_theme_before_topic_form_content', 'bbp_display_wp_editor_array' );
if ( ! function_exists( 'bbp_display_wp_editor_array' ) ) :
	function bbp_display_wp_editor_array() {
	    $forumId = bbp_get_forum_id();
	    if ($forumId == 0){
	        $forumId = bbp_get_topic_forum_id();
	    }
        $path = ABSPATH.'wp-content/plugins/andy-bbp-custom-form/article_templates/' . strval($forumId) . '.txt';
        if(file_exists($path)){
            $lines = file($path, FILE_IGNORE_NEW_LINES);
            foreach ($lines as $field_name) {
               if (($field_name == '[mycred_sell_this]') || ($field_name == '[/mycred_sell_this]') ){
                   continue;
               }
               echo("<b><font size='3pt'>" . $field_name . "<b></font>");
               $field_key = hash('ripemd160',$field_name);
               bbp_the_content( array( 'context' => $field_key ) );
            }
        }
        else{
            bbp_the_content( array( 'context' => 'topic' ) ); //bbpress default
        }
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