<?php
/*
Plugin Name: Andy mycred auto set topic for sale
Plugin URI: 
Description:
Author: Andy Chen
Author URI:
Version: 1.0.0
*/

# set content for sale upon post creation
add_action ( 'bbp_new_topic', 'set_topic_for_mycred_sale', 10, 1 );

if ( ! function_exists( 'set_topic_for_mycred_sale' ) ) :
	function set_topic_for_mycred_sale($topic_id=0) {
	    $forumId = bbp_get_topic_forum_id($topic_id);
	    if ($forumId==70){ // for issue 49 start
	        return;
	    } // for issue 49 end
        $sale_setup = array(
            'status' => 'enabled',
            'price' => 5,
            'expire' => 0
            );
        mycred_update_post_meta($topic_id, 'myCRED_sell_content', $sale_setup);
	}
endif;


# Increase price upon the 3rd purchase
add_action ( 'GoGet_new_purchase', 'increase_content_price_if_needed', 10, 1 );

if ( ! function_exists( 'increase_content_price_if_needed' ) ) :
	function increase_content_price_if_needed($topic_id=0) {
		$sell_count = $sell_count = mycred_get_content_sales_count($topic_id);
		if ($sell_count == 3) {  # update price at the third purchase
	        $sale_setup = array(
	            'status' => 'enabled',
	            'price' => 10,
	            'expire' => 0
	            );
	        mycred_update_post_meta($topic_id, 'myCRED_sell_content', $sale_setup);
        }
	}
endif;