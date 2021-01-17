<?php
/*
Plugin Name: GoGet display sell count
Plugin URI: 
Description:
Author: Andy Chen
Author URI:
Version: 1.0.0
*/

add_shortcode('GoGet_display_sell_count', 'goget_display_sell_count', 10);
function goget_display_sell_count(){
    
    $topic_post_time_days_ago = (current_time('timestamp') - get_the_time("U")) / (86400);
    $ture_sell_count = do_shortcode("[mycred_content_sale_count]");
    if($topic_post_time_days_ago >= 10){
        $display_sell_count = $ture_sell_count + 3;
    }elseif($topic_post_time_days_ago >= 5){
        $display_sell_count = $ture_sell_count + 2;
    }elseif($topic_post_time_days_ago >= 1){
        $display_sell_count = $ture_sell_count + 1;
    }else{
        $display_sell_count = $ture_sell_count;
    }
    return $display_sell_count == 0 ? "尚無人解鎖此文章
    " : "" . $display_sell_count . "人已經解鎖此文章
    ";
}