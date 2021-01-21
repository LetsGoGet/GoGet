<?php
/*
Plugin Name: GoGet - show mycred history
Plugin URI:
Description:
Author: Andy Chen
Author URI:
Version: 1.0.0
*/

add_shortcode( 'GoGet_show_green_bean_history', 'GoGet_show_green_bean_history' );
function GoGet_show_green_bean_history() {
    if(is_user_logged_in()){
        echo(do_shortcode('[mycred_history user_id="current" number=100000]'));
    }
    else{
        echo('<center>請先 ' . '<a href="https://www.letsgoget.info/wp-login.php">登入</a>' . ' 以查看我的綠豆</center>');
    }
}
