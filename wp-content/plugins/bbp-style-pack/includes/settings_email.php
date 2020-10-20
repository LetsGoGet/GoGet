<?php

//forum style settings page

function bsp_style_settings_email () {
	global $bsp_style_settings_email ;
	?>
	<form method="post" action="options.php">
	<?php wp_nonce_field( 'style-settings-email', 'style-settings-nonce' ) ?>
	<?php settings_fields( 'bsp_style_settings_email' );
	//create a style.css on entry and on saving
	generate_style_css() ;
	?>
	<table class="form-table">
		<tr valign="top">
			<th colspan="2">
				<h3>
					<?php _e ('Subscription emails' , 'bbp-style-pack' ) ; ?>
				</h3>
		</tr>
	</table>
	<p> <?php _e('This section allows you to amend the subscription emails sent on topic and reply creation.', 'bbp-style-pack'); ?> </p>
	
	
	
	<!-- save the options -->
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e( 'Save changes', 'bbp-style-pack' ); ?>" />
		</p>
	<hr>
	<table class="form-table">
	<?php
	$sitename = strtolower( $_SERVER['SERVER_NAME'] );
	if ( substr( $sitename, 0, 4 ) === 'www.' ) {
		$sitename = substr( $sitename, 4 );
	}
	$default_email = 'noreply@' . $sitename ;
	$name = 'email' ;
	$name1 = __('Email account', 'bbp-style-pack') ;
	$area1='_email_account' ;
	$item1="bsp_style_settings_email[".$name.$area1."]" ;
	$value1 = (!empty($bsp_style_settings_email[$name.$area1]) ? $bsp_style_settings_email[$name.$area1]  : $default_email) ;
	?>
	<tr>
	
		<th>
			1. <?php echo $name1 ; ?>
		</th>
		<td>
				<?php echo '<input id="'.$item1.'" class="large-text" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"> <br>' ; ?> 
				<label class="description"><?php _e( 'By default bbpress sends an email using noreply@yoursite as both the sending and receiving email address.  Each subscriber is then blind copied in (bcc\'d ).				', 'bbp-style-pack' ); ?></label><br/>
				<label class="description"><?php _e( 'This means on topic or reply creation a single email is sent, which makes for fast processing', 'bbp-style-pack' ); ?></label><br/>
				<label class="description"><?php _e( 'You may wish to change this address in some cases, for instance if you are on a sub domain ' , 'bbp-style-pack' ); ?></label><br/>
			<label class="description"><?php _e( 'Many email sytems will reject emails which don\'t come from the site\'s domain so amend with care !' , 'bbp-style-pack' ); ?></label><br/>
		
		</td>
	</tr>


	<tr>
		<?php $name1 = __('Auto Login', 'bbp-style-pack') ; ?>	
			<th>
				2. <?php echo $name1 ; ?> 
			</th>
		
			<td>
				<?php
				$area1 =  '_activate_auto_login' ;
				$item1="bsp_style_settings_email[".$name.$area1."]" ;
				$value1 = (!empty($bsp_style_settings_email[$name.$area1]) ? $bsp_style_settings_email[$name.$area1]  : '') ;
				echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />' ; ?>
				<label class="description"><?php _e( 'Activate Auto Login', 'bbp-style-pack' ); ?></label><br/>
				<label class="description"><?php _e( 'When users receive an email, it contains a link to the topic/reply.', 'bbp-style-pack' ); ?></label><br/>
				<label class="description"><?php _e( 'If the forum is private and they are not logged in, they will get the site 404 not found error.', 'bbp-style-pack' ); ?></label><br/>
				<label class="description"><?php _e( 'This item instead lets you select a wordpress login or bbress login, which once completed continues to the topic/reply.', 'bbp-style-pack' ); ?></label><br/>
				<label class="description"><?php _e( 'If you select bbPress Login, you must have the [bbp_login] shortcode in a page, and put the full url in below.', 'bbp-style-pack' ); ?></label><br/>
					
			</td>
		</tr>
		<tr>
				<td>
				</td>
				<td colspan = '2'>
				
				<?php
		
			$name1 = __('Login users to private forum links', 'bbp-style-pack') ;
			$area1='_private_login_type' ;
			$item1="bsp_style_settings_email[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_email[$name.$area1]) ? $bsp_style_settings_email[$name.$area1]  : 0) ;
				echo '<input name="'.$item1.'" id="'.$item1.'" type="radio" value="0" class="code"  ' . checked( 0,$value1, false ) . ' />' ;
				_e ('Wordpress Login' , 'bbp-style-pack' ) ;?>
				<p/>
				<?php
				echo '<input name="'.$item1.'" id="'.$item1.'" type="radio" value="1" class="code"  ' . checked( 1,$value1, false ) . ' />' ;
				_e ('bbPress Login' , 'bbp-style-pack' ) ;?>
				<p/>
															
			</td>		
		</tr>
		
		<tr>
		<td></td>
	
	<tr>
		<td></td>
		<td>
		<?php
		$item =  'email_bbpress_login_url' ;
		$item1="bsp_style_settings_email[".$item."]" ;
		$value1 = (!empty($bsp_style_settings_email[$item]) ? $bsp_style_settings_email[$item]  : '') ;
		echo '<input id="'.$item1.'" class="large-text" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"> <br>' ; ?> 
				<label class="description"><?php _e( '<b>Only if you are using bbPress login</b> you will need a wordpress page with the [bbp-login] shortcode in it.', 'bbp-style-pack' ); ?></label><br/>
				<label class="description"><?php _e( 'Enter the full URL of this page here.', 'bbp-style-pack' ); ?></label><br/>
		</td>
		</tr>
		
	<tr>
		<?php $name1 = __('Change Email Content', 'bbp-style-pack') ; ?>	
			<th>
				3. <?php echo $name1 ; ?> 
			</th>
		
			<td>
				<?php
				$area1 =  '_activate_email_content' ;
				$item1="bsp_style_settings_email[".$name.$area1."]" ;
				$value1 = (!empty($bsp_style_settings_email[$name.$area1]) ? $bsp_style_settings_email[$name.$area1]  : '') ;
				echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />' ; ?>
				<label class="description"><?php _e( 'If you want to alter the topic and/or reply emails then click here and items 4 to 9 will take effect', 'bbp-style-pack' ); ?></label><br/>
				</td>
		</tr>
		
	<?php
		
			$name1 = __('Email Type', 'bbp-style-pack') ;
			$area1='_email_type' ;
			$item1="bsp_style_settings_email[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_email[$name.$area1]) ? $bsp_style_settings_email[$name.$area1]  : 0) ;
		?>
		<tr>	
			<th>
				4. <?php echo $name1 ; ?> 
			</th>
				<td colspan = '2'>
				<?php
				echo '<input name="'.$item1.'" id="'.$item1.'" type="radio" value="0" class="code"  ' . checked( 0,$value1, false ) . ' />' ;
				_e ('Plain Text' , 'bbp-style-pack' ) ;?>
				<p/>
				<?php
				echo '<input name="'.$item1.'" id="'.$item1.'" type="radio" value="1" class="code"  ' . checked( 1,$value1, false ) . ' />' ;
				_e ('HTML Text' , 'bbp-style-pack' ) ;?>
				<p/>
				<label class="description"><?php _e( 'By default bbpress uses plain text to send emails.', 'bbp-style-pack' ); ?></label><br/>
				<label class="description"><?php _e( '<b>If you want HTML text, then click HTML text, and press the \'save\' button, and the wordpress text editor will appear on the refreshed screen</b>', 'bbp-style-pack' ); ?></label><br/>
				<label class="description"><?php _e( 'Almost all email services can process HTML text, and you may want to make your subscription emails look better by using this feature.', 'bbp-style-pack' ); ?></label><br/>
				<label class="description"><?php _e( 'However if you do, then any email system that is only capable of using plain text may look strange as the HTML text code may also show.', 'bbp-style-pack' ); ?></label><br/>
																
			</td>		
		</tr>
	
	</table>
	
	<table class="form-table">
	<?php
	
	$default_topic_title = '[' . get_option( 'blogname' ) . '] {title}';
	$default_reply_title = '[' . get_option( 'blogname' ) . '] {title}';
	
	$default_topic_body_p = '{author} wrote:

{content}

Post Link: {url}

-----------

You are receiving this email because you subscribed to the {forum_name} forum.

Login and visit the forum to unsubscribe from these emails.';
$default_topic_body_h = '{author} wrote:<p>{content}</p><p>Post Link: {url}</p><hr><p>You are receiving this email because you subscribed to the {forum_name} forum.</p>
<p>Login and visit the forum to unsubscribe from these emails.</p>';

$default_reply_body_p = '{author} wrote:

{content}

Post Link: {url}

-----------

You are receiving this email because you subscribed to a forum topic.

Login and visit the topic to unsubscribe from these emails.'; 

$default_reply_body_h = '{author} wrote:<p>{content}</p><p>Post Link: {url}</p><p><hr><p>You are receiving this email because you subscribed to a forum topic.</p>
<p>Login and visit the topic to unsubscribe from these emails.</p>';


			$name = 'email' ;
			$name1 = __('New Topic Email Title', 'bbp-style-pack') ;
			$name2= __('New Topic Email Body', 'bbp-style-pack') ;
			$name3 = __('New Reply Email Title', 'bbp-style-pack') ;
			$name4 = __('New Reply Email Body', 'bbp-style-pack') ;
			$area1='_topic_title' ;
			$area2p='_topic_body_p' ;
			$area2h='_topic_body_h' ;
			$area3='_reply_title' ;
			$area4p='_reply_body_p' ;
			$area4h='_reply_body_h' ;
			$item1="bsp_style_settings_email[".$name.$area1."]" ;
			$item2p="bsp_style_settings_email[".$name.$area2p."]" ;
			$item2h="bsp_style_settings_email[".$name.$area2h."]" ;
			$item3="bsp_style_settings_email[".$name.$area3."]" ;
			$item4p="bsp_style_settings_email[".$name.$area4p."]" ;
			$item4h="bsp_style_settings_email[".$name.$area4h."]" ;
			$value1 = (!empty($bsp_style_settings_email[$name.$area1]) ? $bsp_style_settings_email[$name.$area1]  : $default_topic_title) ;
			$value2p = (!empty($bsp_style_settings_email[$name.$area2p]) ? $bsp_style_settings_email[$name.$area2p]  : $default_topic_body_p) ;
			$value2h = (!empty($bsp_style_settings_email[$name.$area2h]) ? $bsp_style_settings_email[$name.$area2h]  : $default_topic_body_h) ;
			$value3 = (!empty($bsp_style_settings_email[$name.$area3]) ? $bsp_style_settings_email[$name.$area3]  : $default_reply_title) ;
			$value4p = (!empty($bsp_style_settings_email[$name.$area4p]) ? $bsp_style_settings_email[$name.$area4p]  : $default_reply_body_p) ;
			$value4h = (!empty($bsp_style_settings_email[$name.$area4h]) ? $bsp_style_settings_email[$name.$area4h]  : $default_reply_body_h) ;
	
	

		?>
		
		<tr>
			<th>
				5. <?php echo $name1 ;?>
			</th>
			<td>
				<?php echo '<input id="'.$item1.'" class="large-text" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"> <br>' ; ?> 
				<label class="description"><?php _e( 'The subject of the notification email', 'bbp-style-pack' ); ?></label><br/>
				<label class="description"><?php _e( 'Allowable codes - {title}', 'bbp-style-pack' ); ?></label><br/>
			</td>

		<tr>
			<th>
				6. <?php echo $name2 ;?>
			</th>
			<td colspan=2>
			<?php if (empty ($bsp_style_settings_email['email_email_type'])) {
				echo '<textarea id="'.$item2p.'" class="large-text" name="'.$item2p.'" type="text" rows="15">'.$value2p.'</textarea>' ; 
				echo '<input type="hidden" id="'.$item2h.'" name="'.$item2h.'" value="'.$value2h.'">' ; 
			} 
			else {
			wp_editor( $value2h, 'bsp_style_topic', array(
				'textarea_name' => $item2h,
				'textarea_rows' => '15',
				// TRUE to output the minimal editor config, such as the Comment editor.
				'teeny'         => false,
			) );
			echo '<input type="hidden" id="'.$item2p.'" name="'.$item2p.'" value="'.$value2p.'">' ;
			} ?>

					
					<label class="description"><?php _e( 'Email message sent to forum subscribers when a new topic is posted', 'bbp-style-pack' ); ?></label><br/>
					<label class="description"><?php _e( 'Allowable codes - {author} {content} {url} {forum_name}', 'bbp-style-pack' ); ?></label><br/>
					
			</td>
		</tr>
		
		<tr>
			<th>
				7. <?php echo $name3 ;?>
			</th>
			<td>
				<?php echo '<input id="'.$item3.'" class="large-text" name="'.$item3.'" type="text" value="'.esc_html( $value3 ).'"> <br>' ; ?> 
				<label class="description"><?php _e( 'The subject of the notification email', 'bbp-style-pack' ); ?></label><br/>
				<label class="description"><?php _e( 'Allowable codes - {title}', 'bbp-style-pack' ); ?></label><br/>
			</td>

		<tr>
			<th>
				8. <?php echo $name4 ;?>
			</th>
			<td colspan=2>
			<?php if (empty ($bsp_style_settings_email['email_email_type'])) {
				echo '<textarea id="'.$item4p.'" class="large-text" name="'.$item4p.'" type="text" rows="15">'.$value4p.'</textarea>' ; 
				echo '<input type="hidden" id="'.$item4h.'" name="'.$item4h.'" value="'.$value4h.'">' ; 
			} 
			else {
			wp_editor( $value4h, 'bsp_style_reply', array(
				'textarea_name' => $item4h,
				'textarea_rows' => '15',
				// TRUE to output the minimal editor config, such as the Comment editor.
				'teeny'         => false,
			) );
			echo '<input type="hidden" id="'.$item4p.'" name="'.$item4p.'" value="'.$value4p.'">' ;
			} ?>

					
					<label class="description"><?php _e( 'Email message sent to forum subscribers when a new topic is posted', 'bbp-style-pack' ); ?></label><br/>
					<label class="description"><?php _e( 'Allowable codes - {author} {content} {url} {forum_name}', 'bbp-style-pack' ); ?></label><br/>
					
			</td>
		</tr>
		
		<!-- checkbox to activate  -->
	<tr>
		<th>
					9. <?php _e('Send test email', 'bbp-style-pack'); ?>
		</th>
		<td>
		<?php _e('<b> Save changes before sending test emails</b>', 'bbp-style-pack'); ?>
		</td>
	</tr>
	
	<tr>
	<td>
	</td>
		<td>
			<?php
			$item =  'test_topic_email' ;
			$item="bsp_style_settings_email[".$item."]" ;
			$item1 = '' ;
				echo '<input name="'.$item.'" id="'.$item.'" type="checkbox" value="1" class="code" ' . checked( 1,$item1, false ) . ' />' ;
				_e('Send a test topic email', 'bbp-style-pack');
			?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<?php
			$item =  'test_reply_email' ;
			$item="bsp_style_settings_email[".$item."]" ;
			$item1 = '' ;
				echo '<input name="'.$item.'" id="'.$item.'" type="checkbox" value="1" class="code" ' . checked( 1,$item1, false ) . ' />' ;
				_e('Send a test reply email', 'bbp-style-pack');
			?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<?php
			$item =  'test_email_address' ;
			$item="bsp_style_settings_email[".$item."]" ;
			$value1 = (!empty($bsp_style_settings_email[$item]) ? $bsp_style_settings_email[$item]  : get_bloginfo('admin_email') ) ;
			echo '<input id="'.$item.'" class="large-text" name="'.$item.'" type="text" value="'.esc_html( $value1 ).'"> <br>' ; ?> 
					<label class="description"><?php _e( 'The email recipient address of the test email - Default - your site admin email address', 'bbp-style-pack' ); ?></label><br/>
		</td>
	</tr>
		
	<tr>
		<td>
		</td>
		<td>
		<input type="submit" class="button-primary" value="<?php _e( 'Send test email(s)', 'bbp-style-pack' ); ?>" />
		</td>
	</tr>
		
		
	
		
	
	
		
		</table>
	<!-- save the options -->
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e( 'Save changes', 'bbp-style-pack' ); ?>" />
		</p>
</form>

		
	

	
		
</div><!--end sf-wrap-->

</div><!--end wrap-->
	
	 
<?php
}




	
