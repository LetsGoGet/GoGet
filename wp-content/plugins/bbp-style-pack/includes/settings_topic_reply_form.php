<?php

//forum style settings page

function bsp_style_settings_form () {
	global $bsp_style_settings_form ;
	?>
	<Form method="post" action="options.php">
	<?php wp_nonce_field( 'style-settings-form', 'style-settings-nonce' ) ?>
	<?php settings_fields( 'bsp_style_settings_form' );
	//create a style.css on entry and on saving
	generate_style_css() ;
	
	if (!empty($bsp_style_settings_form['update418'])) echo '<input type="hidden" id="bsp_style_settings_form[update418]" name="bsp_style_settings_form[update418]" value="1">' ; 
	?>
	<table class="form-table">
		<tr valign="top">
			<th colspan="2">
				<h3>
					<?php _e ('Topic/Reply Form' , 'bbp-style-pack' ) ; ?>
				</h3>
		</tr>
	</table>
	<table>
		<tr>
			<td>
				<p> <?php _e('This section allows you to amend styles.', 'bbp-style-pack'); ?> </p>
				<p> <?php _e('You only need to enter those styles and elements within a style that you wish to alter', 'bbp-style-pack'); ?>  </p></td>
			<td>	
			<?php echo '<img src="' . plugins_url( 'images/topic-form.JPG',dirname(__FILE__)  ) . '" > '; ?>
			</td>
		</tr>
	</table>
	<!-- save the options -->
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e( 'Save changes', 'bbp-style-pack' ); ?>" />
		</p>
	<table class="form-table">
			
<!--Topic Title ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Labels' ;
			$name0 = __('Labels', 'bbp-style-pack') ;
			$name1 = __('Size', 'bbp-style-pack') ;
			$name2 = __('Color', 'bbp-style-pack') ;
			$name3 = __('Font', 'bbp-style-pack') ;
			$name4 = __('Style', 'bbp-style-pack') ;
			$area1='Size' ;
			$area2='Color' ;
			$area3='Font' ;
			$area4='Style';
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$item2="bsp_style_settings_form[".$name.$area2."]" ;
			$item3="bsp_style_settings_form[".$name.$area3."]" ;
			$item4="bsp_style_settings_form[".$name.$area4."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			$value2 = (!empty($bsp_style_settings_form[$name.$area2]) ? $bsp_style_settings_form[$name.$area2]  : '') ;
			$value3 = (!empty($bsp_style_settings_form[$name.$area3]) ? $bsp_style_settings_form[$name.$area3]  : '') ;
			$value4 = (!empty($bsp_style_settings_form[$name.$area4]) ? $bsp_style_settings_form[$name.$area4]  : '') ;
			?>
			
			<th>
				<?php echo '1. '.$name0?>
			</th>
			<td>
				<?php echo $name1 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item1.'" class="small-text" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Default 12px - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
			
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name2 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item2.'" class="bsp-color-picker" name="'.$item2.'" type="text" value="'.esc_html( $value2 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name3 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item3.'" class="medium-text" name="'.$item3.'" type="text" value="'.esc_html( $value3 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Enter Font eg Arial - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name4 ; ?>
			</td>
			<td>
				<select name="<?php echo $item4 ; ?>">
					<?php echo '<option value="'.esc_html( $value4).'">'.esc_html( $value4 ) ; ?> 
					<option value="Normal">Normal</option>
					<option value="Italic">Italic</option>
					<option value="Bold">Bold</option>
					<option value="Bold and Italic">Bold and Italic</option>
				</select>
			</td>
		</tr>
			
			
<!--Text Area background ------------------------------------------------------------------->
		<tr valign='top'>
			<?php 
			$name = 'Text area' ;
			$name0 = __('Text area', 'bbp-style-pack') ;
			$name1 = __('Background Color', 'bbp-style-pack') ;
			$area1='Background Color' ;
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			?>
			<th>
				<?php echo '2. '.$name0 ?>
			</th>
			<td>
				<?php echo $name1 ; ?> 
			</td>
			<td>
				<?php echo '<input id="'.$item1.'" class="bsp-color-picker" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
			
<!--Text Area ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Text area' ;
			$name0 = __('Text area', 'bbp-style-pack') ;
			$name1 = __('Size', 'bbp-style-pack') ;
			$name2 = __('Color', 'bbp-style-pack') ;
			$name3 = __('Font', 'bbp-style-pack') ;
			$name4 = __('Style', 'bbp-style-pack') ;
			$area1='Size' ;
			$area2='Color' ;
			$area3='Font' ;
			$area4='Style';
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$item2="bsp_style_settings_form[".$name.$area2."]" ;
			$item3="bsp_style_settings_form[".$name.$area3."]" ;
			$item4="bsp_style_settings_form[".$name.$area4."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			$value2 = (!empty($bsp_style_settings_form[$name.$area2]) ? $bsp_style_settings_form[$name.$area2]  : '') ;
			$value3 = (!empty($bsp_style_settings_form[$name.$area3]) ? $bsp_style_settings_form[$name.$area3]  : '') ;
			$value4 = (!empty($bsp_style_settings_form[$name.$area4]) ? $bsp_style_settings_form[$name.$area4]  : '') ;
			?>
			<th>
				<?php echo '3. '.$name0 ?>
			</th>
			<td>
				<?php echo $name1 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item1.'" class="small-text" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Default 12px - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name2 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item2.'" class="bsp-color-picker" name="'.$item2.'" type="text" value="'.esc_html( $value2 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name3 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item3.'" class="medium-text" name="'.$item3.'" type="text" value="'.esc_html( $value3 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Enter Font eg Arial - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name4 ; ?>
			</td>
			<td>
				<select name="<?php echo $item4 ; ?>">
					<?php echo '<option value="'.esc_html( $value4).'">'.esc_html( $value4 ) ; ?> 
					<option value="Normal">Normal</option>
					<option value="Italic">Italic</option>
					<option value="Bold">Bold</option>
					<option value="Bold and Italic">Bold and Italic</option>
				</select>
			</td>
		</tr>
		
<!--Button background ------------------------------------------------------------------->
		<tr valign='top'>
			<?php 
			$name = 'Button' ;
			$name0 = __('Button', 'bbp-style-pack') ;
			$name1 = __('Background Color', 'bbp-style-pack') ;
			$name2 = __('Text Color', 'bbp-style-pack') ;
			$area1='Background Color' ;
			$area2='Text Color' ;
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$item2="bsp_style_settings_form[".$name.$area2."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			$value2 = (!empty($bsp_style_settings_form[$name.$area2]) ? $bsp_style_settings_form[$name.$area2]  : '') ;
			?>
			<th>
				<?php echo '4. '.$name0 ?>
			</th>
			<td>
			<?php echo $name1 ; ?> 
			</td>
			<td>
				<?php echo '<input id="'.$item1.'" class="bsp-color-picker" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
			
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name2 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item2.'" class="bsp-color-picker" name="'.$item2.'" type="text" value="'.esc_html( $value2 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
<!-- 5. -->			
		<tr valign="top">
			<?php
			$name='Submitting' ;
			$name0 = __('Submit', 'bbp-style-pack') ;
			$name1 = __('Activate', 'bbp-style-pack') ;
			$area1='Activate';
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			$name2 = __('Submitting Message', 'bbp-style-pack') ;
			$area2='Submitting';
			$item2="bsp_style_settings_form[".$name.$area2."]" ;
			$value2 = (!empty($bsp_style_settings_form[$name.$area2]) ? $bsp_style_settings_form[$name.$area2]  : 'Submitting') ;
			$name3 = __('Spinner', 'bbp-style-pack') ;
			$area3='Spinner';
			$item3="bsp_style_settings_form[".$name.$area3."]" ;
			$value3 = (!empty($bsp_style_settings_form[$name.$area3]) ? $bsp_style_settings_form[$name.$area3]  : '') ;
			?>
			<th>
				<?php echo '5. '.$name0 ?>
			</th>
			<td colspan = '2'>
				<label class="description"><?php _e( 'You can set the submit to display a different message once it is pressed eg "Submitting".This will let the user know that they have sucessfully clicked the submit.', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		
		<tr>
			<td>
			</td>
			<td>
				<?php echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />' ;
				_e ('Click to activate', 'bbp-style-pack') ; ?>
			</td>
		</tr>
		
		<tr>
			<td>
				<?php echo $name2 ?>
			</td>
			<td>
				<?php echo '<input id="'.$item2.'" class="medium-text" name="'.$item2.'" type="text" value="'.esc_html( $value2 ).'"' ; ?> 
			</td>
			<td>
				<label class="description"><?php _e( 'eg Submitting, Processing, Submit in progress etc', 'bbp-style-pack' ); ?></label><br/>
				<label class="description"><?php _e( 'If you just want the spinner below (ie no text), then put a space character in this section and activate the spinner below', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td colspan='2'>
				<label class="description"><?php _e( 'You can also select to display a spinner in addition to the above. This may rotate dependant on both client PC and server performance', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		
		<tr>
			<td>
			</td>
			<td>
				<?php echo '<img src="' . plugins_url( 'images/submit.JPG',dirname(__FILE__)  ) . '" > '; ?>
			</td>
			<td>
				<?php echo '<input name="'.$item3.'" id="'.$item3.'" type="checkbox" value="1" class="code" ' . checked( 1,$value3, false ) . ' />' ;
				_e ('Click to activate spinner', 'bbp-style-pack') ; ?>
			</td>
		</tr>
<!-- 6. -->			
		<tr valign="top">
			<?php
			$name='Notify' ;
			$name0 = __('Notify Default', 'bbp-style-pack') ;
			$name1 = __('Activate', 'bbp-style-pack') ;
			$area1='Activate';
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			?>
			<th>
				<?php echo '6. '.$name0 ?>
			</th>
			<td colspan='2'>
				<label class="description"><?php _e( 'By default this box is not ticked, so users forgetting to tick it are not notified of new replies.  Activating this ticks it by default - users can then unselect if they wish', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
			<td>
			</td>
			<td>
				<?php echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />' ;
				_e ('Click to activate', 'bbp-style-pack') ; ?>
			</td>
		</tr>
		
<!-- 7. -->			
		<tr valign="top">
			<?php
			$name='Remove_Edit_Logs' ;
			$name0 = __('Remove Edit Logs', 'bbp-style-pack') ;
			$name1 = __('Activate', 'bbp-style-pack') ;
			$area1='Activate';
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			?>
			<th>
				<?php echo '7. '.$name0 ?>
			</th>
			<td colspan='2'>
				<label class="description"><?php _e( 'Remove \'Keep a log of this edit\' box', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<?php echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />' ;
				_e ('Click to activate', 'bbp-style-pack') ; ?>
				
			</td>
		</tr>

		
<!-- 8. -->		
		<tr valign="top">
			<?php
			$name='Remove_Edit_Reason' ;
			$name0 = __('Remove Edit Reason', 'bbp-style-pack') ;
			$name1 = __('Activate', 'bbp-style-pack') ;
			$area1='Activate';
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			?>
			<th>
				<?php echo '8. '.$name0 ?>
			</th>
			<td colspan='2'>
				<label class="description"><?php _e( 'Remove \'Optional reason for editing\' box', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
<!-- 9. -->		
		<tr>
			<td>
			</td>
			<td>
				<?php echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />' ;
				_e ('Click to activate', 'bbp-style-pack') ; ?>
			</td>
		</tr>
		<?php
		
			$name = ('Show_editors') ;
			$name1 = __('9. Show editors', 'bbp-style-pack') ;
			$area1='activate' ;
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : 0) ;
		?>
			
		
		<tr>	
			<th>
				<?php echo $name1 ; ?> 
			</th>
			<td colspan = 2>	
						<?php echo '<img src="' . plugins_url( 'images/editors.JPG',dirname(__FILE__)  ) . '" > '; ?>
			</td>
		</tr>
			<td>
			</td>
			<td colspan = '2'>
				<?php
				echo '<input name="'.$item1.'" id="'.$item1.'" type="radio" value="0" class="code"  ' . checked( 0,$value1, false ) . ' />' ;
				_e ('Text Editor Only' , 'bbp-style-pack' ) ;?>
				<p/>
				<?php
				echo '<input name="'.$item1.'" id="'.$item1.'" type="radio" value="1" class="code"  ' . checked( 1,$value1, false ) . ' />' ;
				_e ('Visual Editor Only' , 'bbp-style-pack' ) ;?>
				<p/>
				<?php
				echo '<input name="'.$item1.'" id="'.$item1.'" type="radio" value="2" class="code"  ' . checked( 2,$value1, false ) . ' />' ;
				_e ('Show Both Visual and Text Editors' , 'bbp-style-pack' ) ;?>
																	
			</td>		
		</tr>
		
<!--- 10. -->	
		
			
		<tr valign="top">
			<?php
			$name='topic_posting_rules' ;
			$name0 = __('Topic Posting Rules', 'bbp-style-pack') ;
			$name1 = __('Activate For Topics', 'bbp-style-pack') ;
			$name2 = __('Activate For Replies', 'bbp-style-pack') ;
			$area1='activate_for_topics';
			$area2='activate_for_replies';
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$item2="bsp_style_settings_form[".$name.$area2."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			$value2 = (!empty($bsp_style_settings_form[$name.$area2]) ? $bsp_style_settings_form[$name.$area2]  : '') ;
			?>
			<th>
				<?php echo '10. '.$name0 ?>
			</th>
			<td colspan='2'>
				<label class="description"><?php _e( 'You can add some \'posting rules\' before the title on topics and/or replies ', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		
		<tr>
			<td>
			</td>
			<td>
				<?php echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />' ;
				_e ('Click to activate for Topics', 'bbp-style-pack') ; ?>
			</td>
		</tr>
		
		<tr>
			<td>
				<?php
				$name1 = __('Topic Rules text', 'bbp-style-pack') ;
				$area1 = 'topic_rules_text' ;
				$item1="bsp_style_settings_form[".$area1."]" ;
				$value1 = (!empty($bsp_style_settings_form[$area1]) ? $bsp_style_settings_form[$area1]  : '') ;
				$value1 = trim ($value1) ;
				echo '<b>'.$name1.'</b><br>' ;
				_e( 'Use &lt;p&gt; to create paragraphs', 'bbp-style-pack' ) ; ?>
			</td>
			<td colspan=2>			
				<?php 
				echo '<textarea id="'.$item1.'" class="large-text" name="'.$item1.'" rows="10">'.esc_html( $value1 ).'</textarea>'; ?>
			</td>
		</tr>
		
		<tr>
			<td>
			</td>
			<td>
				<?php echo '<input name="'.$item2.'" id="'.$item2.'" type="checkbox" value="1" class="code" ' . checked( 1,$value2, false ) . ' />' ;
				_e ('Click to activate for Replies', 'bbp-style-pack') ; ?>
			</td>
		</tr>
		
		<tr>
			<td>
			<?php 
				$name1 = __('Reply Rules text', 'bbp-style-pack') ;
				$area1 = 'reply_rules_text' ;
				$item1="bsp_style_settings_form[".$area1."]" ;
				$value1 = (!empty($bsp_style_settings_form[$area1]) ? $bsp_style_settings_form[$area1]  : '') ;
				$value1 = trim ($value1) ;
				echo '<b>'.$name1.'</b><br>' ;
				_e('Use &lt;p&gt; to create paragraphs', 'bbp-style-pack' ) ; ?>
			</td>
			<td colspan=2>			
				<?php
				echo '<textarea id="'.$item1.'" class="large-text" name="'.$item1.'" rows="10">'.esc_html( $value1 ).'</textarea>'; ?>
			</td>
		</tr>
		
		<tr>
			<?php 
			$name = 'topic_posting_rules' ;
			$name1 = __('Size', 'bbp-style-pack') ;
			$name2 = __('Color', 'bbp-style-pack') ;
			$name3 = __('Font', 'bbp-style-pack') ;
			$name4 = __('Style', 'bbp-style-pack') ;
			$area1='Size' ;
			$area2='Color' ;
			$area3='Font' ;
			$area4='Style';
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$item2="bsp_style_settings_form[".$name.$area2."]" ;
			$item3="bsp_style_settings_form[".$name.$area3."]" ;
			$item4="bsp_style_settings_form[".$name.$area4."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			$value2 = (!empty($bsp_style_settings_form[$name.$area2]) ? $bsp_style_settings_form[$name.$area2]  : '') ;
			$value3 = (!empty($bsp_style_settings_form[$name.$area3]) ? $bsp_style_settings_form[$name.$area3]  : '') ;
			$value4 = (!empty($bsp_style_settings_form[$name.$area4]) ? $bsp_style_settings_form[$name.$area4]  : '') ;
			?>
			
			<td>
			</td>
			<td>
				<?php echo $name1 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item1.'" class="large-text" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Default 12px - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
			
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name2 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item2.'" class="bsp-color-picker" name="'.$item2.'" type="text" value="'.esc_html( $value2 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name3 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item3.'" class="large-text" name="'.$item3.'" type="text" value="'.esc_html( $value3 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Enter Font eg Arial - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name4 ; ?>
			</td>
			<td>
				<select name="<?php echo $item4 ; ?>">
					<?php echo '<option value="'.esc_html( $value4).'">'.esc_html( $value4 ) ; ?> 
					<option value="Normal">Normal</option>
					<option value="Italic">Italic</option>
					<option value="Bold">Bold</option>
					<option value="Bold and Italic">Bold and Italic</option>
				</select>
			</td>
		</tr>
			
		<tr valign='top'>
			<?php 
			$name1 = __('Background Color', 'bbp-style-pack') ;
			$area1='Background Color' ;
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			?>
			<td>
			</td>
			<td>
				<?php echo $name1 ; ?> 
			</td>
			<td>
				<?php echo '<input id="'.$item1.'" class="bsp-color-picker" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		
		<tr valign='top'>
			<?php 
			$name1 = __('Border Color', 'bbp-style-pack') ;
			$area1='border_color' ;
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			?>
			<td>
			</td>
			<td>
				<?php echo $name1 ; ?> 
			</td>
			<td>
				<?php echo '<input id="'.$item1.'" class="bsp-color-picker" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
<!--- 11. -->			
			
			<?php 
			$name = __('placeholder_', 'bbp-style-pack') ;
			$name1 = __('Topic Placeholder Text', 'bbp-style-pack') ;
			$name2 = __('Reply Placeholder Text', 'bbp-style-pack') ;
			$area1='topic' ;
			$area2='reply' ;
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$item2="bsp_style_settings_form[".$name.$area2."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1] : '');
			$value2 = (!empty($bsp_style_settings_form[$name.$area2]) ? $bsp_style_settings_form[$name.$area2] : '');
			?>
		<tr>
			<th>
				<?php echo '11. ' ;
					_e ('Placeholder<br>NOTE: Placeholder will only work for text editor - the visual editor does not have that functionality', 'bbp-style-pack' ); ?>
				
			</th>
				
			<td>
				<?php echo $name1 ; ?> 
			</td>
			
			<td>
				<?php echo '<input id="'.$item1.'" class="large-text" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
				<label class="description">
					<?php _e( 'Placeholder text is text that suggests what the content should be e.g. \'make sure to include your name\'', 'bbp-style-pack' ); ?>
				</label>
				<br/>
			</td>
		</tr>
		<tr>
			<td>
			
			</td>
			
			<td>
				<?php echo $name2 ; ?> 
			</td>
			
			<td>
				<?php echo '<input id="'.$item2.'" class="large-text" name="'.$item2.'" type="text" value="'.esc_html( $value2 ).'"<br>' ; ?> 
				<label class="description">
					<?php _e( 'Placeholder text is text that suggests what the content should be e.g. \'make sure to include your name\'', 'bbp-style-pack' ); ?>
				</label>
				<br/>
			</td>
		</tr>
		
		
		
<!-- 12. -->		
		<tr valign="top">
			<?php
			$name='html' ;
			$name0 = __('Remove HTML text', 'bbp-style-pack') ;
			$name1 = __('Activate', 'bbp-style-pack') ;
			$area1='Activate';
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			?>
			<th>
				<?php echo '12. '.$name0 ?>
			</th>
			
			
			<td colspan=2>
				<?php echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />' ;
				_e( ' Remove \'Your account has the ability to post unrestricted HTML content\'', 'bbp-style-pack' ); ?>
			</td>
		</tr>
<!-- 13. -->		
		<tr valign="top">
			<?php
			$name='redirect_topic' ;
			$name0 = __('Redirect topic to forum list', 'bbp-style-pack') ;
			$name1 = __('Activate', 'bbp-style-pack') ;
			$area1='Activate';
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			?>
			<th>
				<?php echo '13. '.$name0 ?>
			</th>
			
			
			<td colspan=2>
				<?php echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />' ;
				_e( ' After submission redirect user to the forum list instead of the topic ', 'bbp-style-pack' ); ?>
			</td>
		</tr>
<!-- 14. -->	
		<tr valign="top">
			<?php
			$name='redirect_reply' ;
			$name0 = __('Redirect reply to forum list', 'bbp-style-pack') ;
			$name1 = __('Activate', 'bbp-style-pack') ;
			$area1='Activate';
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			?>
			<th>
				<?php echo '14. '.$name0 ?>
			</th>
			
			
			<td colspan=2>
				<?php echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />' ;
				_e( ' After submission redirect user to the forum list instead of the topic ', 'bbp-style-pack' ); ?>
			</td>
		</tr>
		
<!-- 15. -->	
		<tr valign="top">
			<?php
			$name='nologin' ;
			$name0 = __('Do not show login if user not logged in', 'bbp-style-pack') ;
			$name1 = __('Activate', 'bbp-style-pack') ;
			$area1='Activate';
			$item1="bsp_style_settings_form[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_form[$name.$area1]) ? $bsp_style_settings_form[$name.$area1]  : '') ;
			?>
			<th>
				<?php echo '15. '.$name0 ?>
			</th>
			
			
			<td colspan=2>
				<?php echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />' ;
				_e( 'If the user is not logged in, version 2.6.x shows a bbpress login. Activate if you do not want this to show', 'bbp-style-pack' ); ?>
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
		

	
