<?php
/*
Plugin Name: andy custom new topic form
Plugin URI: 
Description:
Author: Andy Chen
Author URI:
Version: 1.0.0
*/

add_action ( 'bbp_theme_before_topic_form_content', 'bbp_extra_fields');
function bbp_extra_fields() {
   $value = get_post_meta( bbp_get_topic_id(), 'bbp_extra_field1', true);
   echo '<label for="bbp_extra_field1">Extra Field 1</label><br>';
   echo "<input type='text' name='bbp_extra_field1' value='".$value."'>";

   $value = get_post_meta( bbp_get_topic_id(), 'bbp_extra_field2', true);
   echo '<label for="bbp_extra_field1">Extra Field 2</label><br>';
   echo "<input type='text' name='bbp_extra_field2' value='".$value."'>";
}

add_action ( 'bbp_new_topic', 'bbp_save_extra_fields', 10, 1 );
add_action ( 'bbp_edit_topic', 'bbp_save_extra_fields', 10, 1 );

function bbp_save_extra_fields($topic_id=0) {
  if (isset($_POST) && $_POST['bbp_extra_field1']!='')
    update_post_meta( $topic_id, 'bbp_extra_field1', $_POST['bbp_extra_field1'] );
  if (isset($_POST) && $_POST['bbp_extra_field2']!='')
    update_post_meta( $topic_id, 'bbp_extra_field2', $_POST['bbp_extra_field2'] );
}

add_action('bbp_template_after_replies_loop', 'bbp_show_extra_fields');
function bbp_show_extra_fields() {
  $topic_id = bbp_get_topic_id();
  $value1 = get_post_meta( $topic_id, 'bbp_extra_field1', true);
  $value2 = get_post_meta( $topic_id, 'bbp_extra_field2', true);
  echo "Field 1: ".$value1."<br>";
  echo "Field 2: ".$value2."<br>";
}