<?php

//functions for the email tab
global $bsp_style_settings_email ;

add_filter ('bbp_get_do_not_reply_address', 'bsp_no_reply') ;


if (!empty($bsp_style_settings_email['email_activate_email_content'])) {
	add_filter( 'bbp_forum_subscription_mail_title',   'bsp_topic_title'  , 10, 3 );
	add_filter( 'bbp_forum_subscription_mail_message', 'bsp_topic_message' , 10, 3 );
	add_filter( 'bbp_subscription_mail_title',   'bsp_reply_title'  , 10, 3 );
	add_filter( 'bbp_subscription_mail_message', 'bsp_reply_message' , 10, 3 );
	

	if (!empty ($bsp_style_settings_email['email_email_type'])) {
		add_action ('bbp_pre_notify_forum_subscribers', 'bsp_html_email') ;
		add_action ('bbp_post_notify_forum_subscribers', 'bsp_remove_html_email') ;
		add_action ('bbp_pre_notify_subscribers', 'bsp_html_email') ;
		add_action ('bbp_post_notify_subscribers', 'bsp_remove_html_email') ;
	}
}

function bsp_no_reply ($no_reply) {
	global $bsp_style_settings_email ;
	$no_reply = (!empty ($bsp_style_settings_email['email_email_account']) ?  $bsp_style_settings_email['email_email_account'] : $no_reply) ;
return $no_reply ;
}

function bsp_html_email () {
add_filter( 'wp_mail_content_type', 'bsp_set_html_content_type' );
}

function bsp_remove_html_email () {
remove_filter( 'wp_mail_content_type', 'bsp_set_html_content_type' );
}

function bsp_set_html_content_type() {
return 'text/html';
}



function bsp_topic_title( $title, $topic_id, $forum_id ) {
		global $bsp_style_settings_email ;
		
		$subject = (!empty($bsp_style_settings_email['email_topic_title']) ? $bsp_style_settings_email['email_topic_title']  : $title) ;
				
		// Because we're expecting a string from get_option(), let's use is_string()
		// to check for a string and then ensure the string is longer than `0`. If it isn't
		// a string, bail returning the original $title.
		if ( ! is_string( $subject ) && strlen( $subject ) == 0 ) {

			return $title;
		}

		// The topic title token to replace.
		$search = '{title}';

		// The topic title that will replace the title token.
		$replace = strip_tags( bbp_get_topic_title( $topic_id ) );

		// Replace the title token if it exists in the custom title.
		$title = str_replace( $search, $replace, $subject );

		return $title;
	}
	
function bsp_topic_message( $message, $topic_id, $forum_id ) {
		global $bsp_style_settings_email ;
		//strip tags if content is plain text
		if (empty ($bsp_style_settings_email['email_email_type'])) $topic_content = strip_tags( bbp_get_topic_content( $topic_id ) );
		else $topic_content 	= bbp_get_topic_content( $topic_id ) ;
		
		$topic_url     	= bbp_get_topic_permalink( $topic_id );
		$topic_author	= bbp_get_topic_author_display_name( $topic_id );
		$forum_name     = bbp_get_forum_title( $forum_id );
		
		//check which email message to load - if !empty = HTML
		if (!empty ($bsp_style_settings_email['email_email_type'])) $type='email_topic_body_h' ;
		else $type='email_topic_body_p' ;
		
		$message = (!empty($bsp_style_settings_email[$type]) ? $bsp_style_settings_email[$type]  : $message) ;
		
		$message = str_replace( '{author}',  $topic_author,  $message );
		$message = str_replace( '{content}', $topic_content, $message );
		$message = str_replace( '{url}',     $topic_url,     $message );
		$message = str_replace( '{forum_name}', $forum_name, $message );
		//add html text if HTML
		if (!empty ($bsp_style_settings_email['email_email_type'])) {
			//replace cr with <br> as html doesnlt seem to recognise cr
			$message = str_replace( "\r",  '<br>', $message );
			$message = '<html><head></head><body>'.$message.'</body></html>' ;
		}
		return $message;
	}
	

function bsp_reply_title( $title, $reply_id, $topic_id) {
		global $bsp_style_settings_email ;
		
		$subject = (!empty($bsp_style_settings_email['email_reply_title']) ? $bsp_style_settings_email['email_reply_title']  : $title) ;
				
		// Because we're expecting a string from get_option(), let's use is_string()
		// to check for a string and then ensure the string is longer than `0`. If it isn't
		// a string, bail returning the original $title.
		if ( ! is_string( $subject ) && strlen( $subject ) == 0 ) {

			return $title;
		}

		// The topic title token to replace.
		$search = '{title}';

		// The topic title that will replace the title token.
		$replace = strip_tags( bbp_get_topic_title( $topic_id ) );

		// Replace the title token if it exists in the custom title.
		$title = str_replace( $search, $replace, $subject );

		return $title;
	}

function bsp_reply_message($message, $reply_id, $topic_id ) {
		global $bsp_style_settings_email ;
		//strip tags if content is plain text
		if (empty ($bsp_style_settings_email['email_email_type'])) $reply_content = strip_tags( bbp_get_reply_content( $reply_id ) );
		else $reply_content 	= bbp_get_reply_content( $reply_id ) ;
		
		$reply_url     = bbp_get_reply_url( $reply_id );
		// Poster name
		$reply_author_name = bbp_get_reply_author_display_name( $reply_id );
		$forum_id 		= bbp_get_topic_forum_id ($topic_id) ;
		$forum_name     = bbp_get_forum_title( $forum_id );

		//check which email message to load - if !empty = HTML
		if (!empty ($bsp_style_settings_email['email_email_type'])) $type='email_reply_body_h' ;
		else $type='email_reply_body_p' ;
		
		$message = (!empty($bsp_style_settings_email[$type]) ? $bsp_style_settings_email[$type]  : $message) ;
		
		$message = str_replace( '{author}',  $reply_author_name,  $message );
		$message = str_replace( '{content}', $reply_content, $message );
		$message = str_replace( '{url}',     $reply_url,     $message );
		$message = str_replace( '{forum_name}', $forum_name, $message );
		//add html text if HTML
		if (!empty ($bsp_style_settings_email['email_email_type'])) {
			//replace cr with <br> as html doesnlt seem to recognise cr
			$message = str_replace( "\r",  '<br>', $message );
			$message = '<html><head></head><body>'.$message.'</body></html>' ;
		}
		return $message;
	}


function bsp_test_email ($input) {
	global $bsp_style_settings_email ;
//TOPIC see if we need to send a test topic email
	if (!empty ($input['test_topic_email'] )) {
	//set up the header
		$no_reply   = bbp_get_do_not_reply_address();

		// Setup "From" email address
		$from_email = apply_filters( 'bbp_subscription_from_email', $no_reply );
		$headers = array( 'From: ' . get_bloginfo( 'name' ) . ' <' . $from_email . '>' );
		// Get email address of test user
		$header_recip = (!empty($bsp_style_settings_email['test_email_address']) ? $bsp_style_settings_email['test_email_address']  : get_bloginfo('admin_email')) ;
		$headers[] = 'Bcc: '.$header_recip ;
		
		//set up the title
			$title = '[' . get_option( 'blogname' ) . '] {title}';
			$subject = (!empty($bsp_style_settings_email['email_topic_title']) ? $bsp_style_settings_email['email_topic_title']  : $title) ;
			// The topic title token to replace.
			$search = '{title}';

			// The topic title that will replace the title token.
			$replace = 'Test Topic Title';

			// Replace the title token if it exists in the custom title.
			$title = str_replace( $search, $replace, $subject );
			

		//set up the body	
			
			$topic_content 	= 'This is a sample of the content' ;
			
			$topic_url     	= get_site_url().'/test_content/' ;
			$topic_author	= 'Fred Jones' ;
			$forum_name     = 'General';
			$message = '' ;
			if (!empty ($bsp_style_settings_email['email_email_type'])) {
			$message = (!empty($bsp_style_settings_email['email_topic_body_h']) ? $bsp_style_settings_email['email_topic_body_h']  : $message) ;
			}
			else {
			$message = (!empty($bsp_style_settings_email['email_topic_body_p']) ? $bsp_style_settings_email['email_topic_body_p']  : $message) ;
			}

			
			$message = str_replace( '{author}',  $topic_author,  $message );
			$message = str_replace( '{content}', $topic_content, $message );
			$message = str_replace( '{url}',     $topic_url,     $message );
			$message = str_replace( '{forum_name}', $forum_name, $message );
			//add html text if HTML
			if (!empty ($bsp_style_settings_email['email_email_type'])) {
				//replace cr with <br> as html doesnlt seem to recognise cr
				$message = str_replace( "\r",  '<br>', $message );
				$message = '<html><head></head><body>'.$message.'</body></html>' ;
			}
			
		// Send notification email
			$to_email = $bsp_style_settings_email['email_email_account'] ;
			if (!empty ($bsp_style_settings_email['email_email_type'])) add_filter( 'wp_mail_content_type', 'bsp_set_html_content_type' );
			wp_mail( $to_email, $title, $message, $headers );
			if (!empty ($bsp_style_settings_email['email_email_type'])) remove_filter( 'wp_mail_content_type', 'bsp_set_html_content_type' );
		

	}
	
//REPLY see if we need to send a test reply email
	if (!empty ($input['test_reply_email'] )) {
		
	
		//set up the header
		$no_reply   = bbp_get_do_not_reply_address();

		// Setup "From" email address
		$from_email = apply_filters( 'bbp_subscription_from_email', $no_reply );
		$headers = array( 'From: ' . get_bloginfo( 'name' ) . ' <' . $from_email . '>' );
		// Get email address of test user
		$header_recip = (!empty($bsp_style_settings_email['test_email_address']) ? $bsp_style_settings_email['test_email_address']  : get_bloginfo('admin_email')) ;
		$headers[] = 'Bcc: '.$header_recip ;
		
		//set up the title
			$title = '[' . get_option( 'blogname' ) . '] {title}';
			$subject = (!empty($bsp_style_settings_email['email_reply_title']) ? $bsp_style_settings_email['email_reply_title']  : $title) ;
			// The topic title token to replace.
			$search = '{title}';

			// The topic title that will replace the title token.
			$replace = 'Test Reply Title';

			// Replace the title token if it exists in the custom title.
			$title = str_replace( $search, $replace, $subject );
			

		//set up the body	
			
			$topic_content 	= 'This is a sample of the content' ;
			
			$topic_url     	= get_site_url().'/test_content/' ;
			$topic_author	= 'Fred Jones' ;
			$forum_name     = 'General';
			$message = '' ;
			if (!empty ($bsp_style_settings_email['email_email_type'])) {
			$message = (!empty($bsp_style_settings_email['email_reply_body_h']) ? $bsp_style_settings_email['email_reply_body_h']  : $message) ;
			}
			else {
			$message = (!empty($bsp_style_settings_email['email_reply_body_p']) ? $bsp_style_settings_email['email_reply_body_p']  : $message) ;
			}

			
			$message = str_replace( '{author}',  $topic_author,  $message );
			$message = str_replace( '{content}', $topic_content, $message );
			$message = str_replace( '{url}',     $topic_url,     $message );
			$message = str_replace( '{forum_name}', $forum_name, $message );
			//add html text if HTML
			if (!empty ($bsp_style_settings_email['email_email_type'])) {
				//replace cr with <br> as html doesnlt seem to recognise cr
				$message = str_replace( "\r",  '<br>', $message );
				$message = '<html><head></head><body>'.$message.'</body></html>' ;
			}
			
			// Send notification email
			$to_email = $bsp_style_settings_email['email_email_account'] ;
			if (!empty ($bsp_style_settings_email['email_email_type'])) add_filter( 'wp_mail_content_type', 'bsp_set_html_content_type' );
			wp_mail( $to_email, $title, $message, $headers );
			if (!empty ($bsp_style_settings_email['email_email_type'])) remove_filter( 'wp_mail_content_type', 'bsp_set_html_content_type' );

	}
	
return $input;
}



