<?php
/*
Plugin Name: GoGet topic filter
Plugin URI: 
Description: To enable topic filtering
Author: Henry Chou
Author URI:
Version: 1.0.2
*/

//  modifying code online

function bbpress_filter($args=''){

    if($_GET['k']){
        $args= array(
            
            'meta_key' => $_GET['k'],
            'orderby' => 'meta_value_num', 
            'order' => 'DESC'
        );


    }else{
        
        $args['orderby']='date';
        $args['order']='DESC';  //change to ASC to put oldest at top

    }

    return $args;

}




add_filter('bbp_before_has_topics_parse_args', 'bbpress_filter');


// 留言數 meta_key= _bbp_reply_count , 點閱數 post_count_views , 評分：rateStarReview_rating




// 更改紀錄
// 1. Forum topic -- > 找 loop-forums.php , loop-topics.php
// 2. forum data  --> 找loop-single-topic.php
// 




