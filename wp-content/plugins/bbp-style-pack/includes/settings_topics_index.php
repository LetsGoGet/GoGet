<?php

//topics index settings page

function bsp_style_settings_ti () {
	global $bsp_style_settings_ti ;
	global $bsp_bbpress_version ;
	?>
	<Form method="post" action="options.php">
		<?php wp_nonce_field( 'style-settings-ti', 'style-settings-nonce' ) ?>
		<?php settings_fields( 'bsp_style_settings_ti' );
	//create a style.css on entry and on saving
	generate_style_css() ;
	?>
	<table class="form-table">
		<tr valign="top">
			<th colspan="2">
				<h3>
					<?php _e ('Topics Index Styling' , 'bbp-style-pack' ) ; ?>
				</h3>
		</tr>
	</table>
	<table>
		<tr>
			<td style="width:500px">
				<p><?php _e('This section allows you to amend styles.', 'bbp-style-pack'); ?>
				</p>
				<p>	<?php _e('The majority of style settings are the same as the Forums Index Styling,', 'bbp-style-pack'); ?>
				</p>
				<p>	<?php _e('and only where different are listed here', 'bbp-style-pack'); ?> 
				</p>
				<p>
				<p>
				<p> <?php _e('You only need to enter those styles and elements within a style that you wish to alter', 'bbp-style-pack'); ?>
				</p>
			</td>
			<td>	
				<?php
				//show style image
				echo '<img src="' . plugins_url( 'images/topics-list.JPG',dirname(__FILE__)  ) . '" > '; ?>
			</td>
		</tr>
	</table>
	<!-- save the options -->
	<p class="submit">
		<input type="submit" class="button-primary" value="<?php _e( 'Save changes', 'bbp-style-pack' ); ?>" />
	</p>
	<table class="form-table">
	
	<!--1. Font - Pagination font  ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Pagination Font' ;
			$name0 = __('Pagination Font', 'bbp-style-pack') ;
			$name1 = __('Size', 'bbp-style-pack') ;
			$name2 = __('Color', 'bbp-style-pack') ;
			$name3 = __('Font', 'bbp-style-pack') ;
			$name4 = __('Style', 'bbp-style-pack') ;
			$area1='Size' ;
			$area2='Color' ;
			$area3='Font' ;
			$area4='Style';
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$item2="bsp_style_settings_ti[".$name.$area2."]" ;
			$item3="bsp_style_settings_ti[".$name.$area3."]" ;
			$item4="bsp_style_settings_ti[".$name.$area4."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			$value2 = (!empty($bsp_style_settings_ti[$name.$area2]) ? $bsp_style_settings_ti[$name.$area2]  : '') ;
			$value3 = (!empty($bsp_style_settings_ti[$name.$area3]) ? $bsp_style_settings_ti[$name.$area3]  : '') ;
			$value4 = (!empty($bsp_style_settings_ti[$name.$area4]) ? $bsp_style_settings_ti[$name.$area4]  : '') ;
			?>
			<th>
				<?php echo '1. '.$name0 ?>
			</th>
			<td style="width:200px">
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
			
			
	<!--2. Font - voice count font  ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Voice/Post Count Font' ;
			$name0 = __('Voice/Post Count Font', 'bbp-style-pack') ;
			$name1 = __('Size', 'bbp-style-pack') ;
			$name2 = __('Color', 'bbp-style-pack') ;
			$name3 = __('Font', 'bbp-style-pack') ;
			$name4 = __('Style', 'bbp-style-pack') ;
			$area1='Size' ;
			$area2='Color' ;
			$area3='Font' ;
			$area4='Style';
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$item2="bsp_style_settings_ti[".$name.$area2."]" ;
			$item3="bsp_style_settings_ti[".$name.$area3."]" ;
			$item4="bsp_style_settings_ti[".$name.$area4."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			$value2 = (!empty($bsp_style_settings_ti[$name.$area2]) ? $bsp_style_settings_ti[$name.$area2]  : '') ;
			$value3 = (!empty($bsp_style_settings_ti[$name.$area3]) ? $bsp_style_settings_ti[$name.$area3]  : '') ;
			$value4 = (!empty($bsp_style_settings_ti[$name.$area4]) ? $bsp_style_settings_ti[$name.$area4]  : '') ;
			?>
			<th>
				<?php echo '2. '.$name0 ?>
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
				
					
	<!--3. Font - links   ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Topic Title Links' ;
			$name0 = __('Topic Title Links', 'bbp-style-pack') ;
			$name1 = __('Link Color', 'bbp-style-pack') ;
			$name2 = __('Visited Color', 'bbp-style-pack') ;
			$name3 = __('Hover Color', 'bbp-style-pack') ;
			$area1='Link Color' ;
			$area2='Visited Color' ;
			$area3='Hover Color' ;
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$item2="bsp_style_settings_ti[".$name.$area2."]" ;
			$item3="bsp_style_settings_ti[".$name.$area3."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			$value2 = (!empty($bsp_style_settings_ti[$name.$area2]) ? $bsp_style_settings_ti[$name.$area2]  : '') ;
			$value3 = (!empty($bsp_style_settings_ti[$name.$area3]) ? $bsp_style_settings_ti[$name.$area3]  : '') ;
			?>
			<th>
				<?php echo '3. '.$name0 ?>
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
		
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name3 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item3.'" class="bsp-color-picker" name="'.$item3.'" type="text" value="'.esc_html( $value3 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
			
			
	<!--4. Font - Topic Title  ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Topic Title Font' ;
			$name0 = __('Topic Title Font', 'bbp-style-pack') ;
			$name1 = __('Size', 'bbp-style-pack') ;
			$name3 = __('Font', 'bbp-style-pack') ;
			$name4 = __('Style', 'bbp-style-pack') ;
			$area1='Size' ;
			$area3='Font' ;
			$area4='Style';
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$item3="bsp_style_settings_ti[".$name.$area3."]" ;
			$item4="bsp_style_settings_ti[".$name.$area4."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			$value3 = (!empty($bsp_style_settings_ti[$name.$area3]) ? $bsp_style_settings_ti[$name.$area3]  : '') ;
			$value4 = (!empty($bsp_style_settings_ti[$name.$area4]) ? $bsp_style_settings_ti[$name.$area4]  : '') ;
			?>
			<th>
				<?php echo '4. '.$name0 ?>
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
				<?php echo $name3 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item3.'" class="medium-text" name="'.$item3.'" type="text" value="'.esc_html( $value3).'"<br>' ; ?> 
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
			
			
	<!--5. Font - template notice font  ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Template Notice Font' ;
			$name0 = __('Template Notice Font', 'bbp-style-pack') ;
			$name1 = __('Size', 'bbp-style-pack') ;
			$name2 = __('Color', 'bbp-style-pack') ;
			$name3 = __('Font', 'bbp-style-pack') ;
			$name4 = __('Style', 'bbp-style-pack') ;
			$area1='Size' ;
			$area2='Color' ;
			$area3='Font' ;
			$area4='Style';
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$item2="bsp_style_settings_ti[".$name.$area2."]" ;
			$item3="bsp_style_settings_ti[".$name.$area3."]" ;
			$item4="bsp_style_settings_ti[".$name.$area4."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			$value2 = (!empty($bsp_style_settings_ti[$name.$area2]) ? $bsp_style_settings_ti[$name.$area2]  : '') ;
			$value3 = (!empty($bsp_style_settings_ti[$name.$area3]) ? $bsp_style_settings_ti[$name.$area3]  : '') ;
			$value4 = (!empty($bsp_style_settings_ti[$name.$area4]) ? $bsp_style_settings_ti[$name.$area4]  : '') ;
			?>
			<th>
				<?php echo '5. '.$name0 ?>
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
			
	<!--6. template notice Background color  ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Template Notice' ;
			$name0 = __('Template Notice', 'bbp-style-pack') ;
			$name1 = __('Background color', 'bbp-style-pack') ;
			$area1='Background color' ;
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			?>
			<th>
				<?php echo '6. '.$name0 ?>
			</th>
			<td>
				<?php echo $name1 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item1.'" class="bsp-color-picker" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
			
	<!--7. template notice Border  ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Template Notice Border' ;
			$name0 = __('Template Notice Border', 'bbp-style-pack') ;
			$name1 = __('Line width', 'bbp-style-pack') ;
			$name3 = __('Line style', 'bbp-style-pack') ;
			$name4 = __('Line color', 'bbp-style-pack') ;
			$area1='Line width' ;
			$area3='Line style' ;
			$area4='Line color';
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$item3="bsp_style_settings_ti[".$name.$area3."]" ;
			$item4="bsp_style_settings_ti[".$name.$area4."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			$value3 = (!empty($bsp_style_settings_ti[$name.$area3]) ? $bsp_style_settings_ti[$name.$area3]  : '') ;
			$value4 = (!empty($bsp_style_settings_ti[$name.$area4]) ? $bsp_style_settings_ti[$name.$area4]  : '') ;
			?>
			<th>
				<?php echo '7. '.$name0 ?>
			</th>
			<td> 
				<?php echo $name1 ; ?> 
			</td>
			<td>
				<?php echo '<input id="'.$item1.'" class="small-text" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Default 1px - Set to 0px to hide border', 'bbp-style-pack' ); ?></label><br/>
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
				<label class="description"><?php _e( 'Default solid - solid, dashed, dotted are common values - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		
		<tr>
			<td>
			</td>
			<td> 
				<?php echo $name4 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item4.'" class="bsp-color-picker" name="'.$item4.'" type="text" value="'.esc_html( $value4 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>

	<!--8. Font - topic started by  ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Topic Started by' ;
			$name0 = __('Topic Started by', 'bbp-style-pack') ;
			$name1 = __('Size', 'bbp-style-pack') ;
			$name2 = __('Color', 'bbp-style-pack') ;
			$name3 = __('Font', 'bbp-style-pack') ;
			$name4 = __('Style', 'bbp-style-pack') ;
			$area1='Size' ;
			$area2='Color' ;
			$area3='Font' ;
			$area4='Style';
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$item2="bsp_style_settings_ti[".$name.$area2."]" ;
			$item3="bsp_style_settings_ti[".$name.$area3."]" ;
			$item4="bsp_style_settings_ti[".$name.$area4."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			$value2 = (!empty($bsp_style_settings_ti[$name.$area2]) ? $bsp_style_settings_ti[$name.$area2]  : '') ;
			$value3 = (!empty($bsp_style_settings_ti[$name.$area3]) ? $bsp_style_settings_ti[$name.$area3]  : '') ;
			$value4 = (!empty($bsp_style_settings_ti[$name.$area4]) ? $bsp_style_settings_ti[$name.$area4]  : '') ;
			?>
			<th>
				<?php echo '8. '.$name0 ?>
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
			
	<!--9. Sticky Topic background ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Sticky Topic/Reply' ;
			$name0 = __('Sticky Topic/Reply', 'bbp-style-pack') ;
			$name1 = __('Background color - sticky topic', 'bbp-style-pack') ;
			$name2 = __('Background color - super sticky topic', 'bbp-style-pack') ;
			$area1='Background color - sticky topic' ;
			$area2='Background color - super sticky topic' ;
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$item2="bsp_style_settings_ti[".$name.$area2."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			$value2 = (!empty($bsp_style_settings_ti[$name.$area2]) ? $bsp_style_settings_ti[$name.$area2]  : '') ;
			?>
			<th>
				<?php echo '9. '.$name0 ?>
			</th>
			<td>
				<?php echo $name1 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item1.'" class="bsp-color-picker" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack') ; ?>
				<?php _e (' ')._e ('bbPress Default', 'bbp-style-pack' )._e(' #ffffe0') ; ?>
				</label><br/>
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
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack') ; ?>
				</label><br/>
				<?php _e (' ')._e ('bbPress Default', 'bbp-style-pack' )._e(' #fbfbfb') ; ?>
			</td>
		</tr>
			
	<!--10. Font - forum info  ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Forum Information Font' ;
			$name0 = __('Forum Information Font', 'bbp-style-pack') ;
			$name1 = __('Size', 'bbp-style-pack') ;
			$name2 = __('Color', 'bbp-style-pack') ;
			$name3 = __('Font', 'bbp-style-pack') ;
			$name4 = __('Style', 'bbp-style-pack') ;
			$area1='Size' ;
			$area2='Color' ;
			$area3='Font' ;
			$area4='Style';
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$item2="bsp_style_settings_ti[".$name.$area2."]" ;
			$item3="bsp_style_settings_ti[".$name.$area3."]" ;
			$item4="bsp_style_settings_ti[".$name.$area4."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			$value2 = (!empty($bsp_style_settings_ti[$name.$area2]) ? $bsp_style_settings_ti[$name.$area2]  : '') ;
			$value3 = (!empty($bsp_style_settings_ti[$name.$area3]) ? $bsp_style_settings_ti[$name.$area3]  : '') ;
			$value4 = (!empty($bsp_style_settings_ti[$name.$area4]) ? $bsp_style_settings_ti[$name.$area4]  : '') ;
			?>
			<th>
				<?php echo '10. '.$name0 ?>
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
			
	<!--11. forum info notice Background color  ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Forum Information' ;
			$name0 = __('Forum Information', 'bbp-style-pack') ;
			$name1 = __('Background color', 'bbp-style-pack') ;
			$area1='Background color' ;
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			?>
			<th>
				<?php echo '11. '.$name0 ?>
			</th>
			<td>
				<?php echo $name1 ; ?> 
			</td>
			<td>
				<?php echo '<input id="'.$item1.'" class="bsp-color-picker" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
			
			
			
	<!--12. forum information Border  ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Forum Information Border' ;
			$name0 = __('Forum Information Border', 'bbp-style-pack') ;
			$name1 = __('Line width', 'bbp-style-pack') ;
			$name3 = __('Line style', 'bbp-style-pack') ;
			$name4 = __('Line color', 'bbp-style-pack') ;
			$area1='Line width' ;
			$area3='Line style' ;
			$area4='Line color';
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$item3="bsp_style_settings_ti[".$name.$area3."]" ;
			$item4="bsp_style_settings_ti[".$name.$area4."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			$value3 = (!empty($bsp_style_settings_ti[$name.$area3]) ? $bsp_style_settings_ti[$name.$area3]  : '') ;
			$value4 = (!empty($bsp_style_settings_ti[$name.$area4]) ? $bsp_style_settings_ti[$name.$area4]  : '') ;
			?>
			<th>
				<?php echo '12. '.$name0 ?>
			</th>
			<td>
				<?php echo $name1 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item1.'" class="small-text" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Default 1px - Set to 0px to hide border', 'bbp-style-pack' ); ?></label><br/>
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
				<label class="description"><?php _e( 'Default solid - solid, dashed, dotted are common values - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name4 ; ?> 
			</td>
			<td>
				<?php echo '<input id="'.$item4.'" class="bsp-color-picker" name="'.$item4.'" type="text" value="'.esc_html( $value4 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
			
	<!--13. Topics Index headings font ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Topic Index Headings Font' ;
			$name0 = __('Topic Index Headings Font', 'bbp-style-pack') ;
			$name1 = __('Size', 'bbp-style-pack') ;
			$name2 = __('Color', 'bbp-style-pack') ;
			$name3 = __('Font', 'bbp-style-pack') ;
			$name4 = __('Style', 'bbp-style-pack') ;
			$area1='Size' ;
			$area2='Color' ;
			$area3='Font' ;
			$area4='Style';
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$item2="bsp_style_settings_ti[".$name.$area2."]" ;
			$item3="bsp_style_settings_ti[".$name.$area3."]" ;
			$item4="bsp_style_settings_ti[".$name.$area4."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			$value2 = (!empty($bsp_style_settings_ti[$name.$area2]) ? $bsp_style_settings_ti[$name.$area2]  : '') ;
			$value3 = (!empty($bsp_style_settings_ti[$name.$area3]) ? $bsp_style_settings_ti[$name.$area3]  : '') ;
			$value4 = (!empty($bsp_style_settings_ti[$name.$area4]) ? $bsp_style_settings_ti[$name.$area4]  : '') ;
			?>
			<th>
				<?php echo '13. '.$name0 ?>
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
			
			
	<!--14. Lock Icon ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Lock Icon' ;
			$name0 = __('Lock Icon', 'bbp-style-pack') ;
			$name2 = __('Size', 'bbp-style-pack') ;
			$name3 = __('Color', 'bbp-style-pack') ;
			$area1 = 'Activate' ;
			$area2='Size' ;
			$area3='Color' ;
			$item1 =  "bsp_style_settings_ti[".$name.$area1."]" ;
			$item2= "bsp_style_settings_ti[".$name.$area2."]" ;
			$item3= "bsp_style_settings_ti[".$name.$area3."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1] : '');
			$value2 = (!empty($bsp_style_settings_ti[$name.$area2]) ? $bsp_style_settings_ti[$name.$area2]  : '') ;
			$value3 = (!empty($bsp_style_settings_ti[$name.$area3]) ? $bsp_style_settings_ti[$name.$area3]  : '') ;
			?>
			<th>
			<?php echo '14. '.$name0 ?>
			</th>	
			<td>
			</td>
			<td>
				<?php echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />' ;
				_e('Show a lock icon for closed topics','bbp-style-pack');
				?>
			</td>
		</tr>
			
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name2 ; ?> 
			</td>
			<td>
				<?php echo '<input id="'.$item2.'" class="small-text" name="'.$item2.'" type="text" value="'.esc_html( $value2 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Default 12px', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
			
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name3 ; ?> 
			</td>
			<td>
				<?php echo '<input id="'.$item3.'" class="bsp-color-picker" name="'.$item3.'" type="text" value="'.esc_html( $value3 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
			
			
	<!--15. Sticky Pin ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'Sticky Pin' ;
			$name0 = __('Sticky Pin', 'bbp-style-pack') ;
			$name2 = __('Font Size', 'bbp-style-pack') ;
			$area1 = 'Activate' ;
			$area2='FontSize' ;
			$area3='Color' ;
			$item1 =  "bsp_style_settings_ti[".$name.$area1."]" ;
			$item2= "bsp_style_settings_ti[".$name.$area2."]" ;
			$item3= "bsp_style_settings_ti[".$name.$area3."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1] : '');
			$value2 = (!empty($bsp_style_settings_ti[$name.$area2]) ? $bsp_style_settings_ti[$name.$area2]  : '') ;
			$value3 = (!empty($bsp_style_settings_ti[$name.$area3]) ? $bsp_style_settings_ti[$name.$area3]  : '') ;
			?>
			<th>
			<?php echo '15. '.$name0 ?>
			</th>	
			<td>
			</td>
			<td>
				<?php echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />' ;
				_e('Show a pin for sticky topics','bbp-style-pack');
				?>
			</td>
		</tr>
		
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name2 ; ?>
			</td>
			<td>
				<?php echo '<input id="'.$item2.'" class="small-text" name="'.$item2.'" type="text" value="'.esc_html( $value2 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Default 12px', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		
		<tr>
			<td>
			</td>
			<td>
				<?php echo $name3 ; ?> 
			</td>
			<td>
				<?php echo '<input id="'.$item3.'" class="bsp-color-picker" name="'.$item3.'" type="text" value="'.esc_html( $value3 ).'"<br>' ; ?> 
				<label class="description"><?php _e( 'Click to set color - You can select from palette or enter hex value - see help for further info', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		
		<!-------------------------------oh bother message---------------------------------------->
		<tr valign="top">
			<th>
				16. <?php _e('Change empty forum message', 'bbp-style-pack'); ?>
			</th>
			<td colspan="2">
				<?php 
				$item1 = (!empty ($bsp_style_settings_ti['empty_forum'] ) ? $bsp_style_settings_ti['empty_forum']  : '' ) ?>
				<input id="bsp_style_settings_ti[empty_forum]" class="large-text" name="bsp_style_settings_ti[empty_forum]" type="text" value="<?php echo esc_html( $item1 ) ;?>" /><br/>
				<label class="description" for="bsp_settings[empty_forum]"><?php _e( 'Default : Oh bother! No topics were found here!', 'bbp-style-pack' ); ?></label><br/>
			</td>
		</tr>
		<!-- oh bother message ------------------------------------------------------------------->
		<tr>
			<?php 
			$name = 'empty_forum' ;
			$name0 = __('Don\'t show empty forum message', 'bbp-style-pack') ;
			$area1 = 'Activate' ;
			$item1 =  "bsp_style_settings_ti[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1]) ? $bsp_style_settings_ti[$name.$area1] : '');
			?>
			<td>
			</td>
			<td>
				<?php echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />' ;
				_e('Don\'t show this message','bbp-style-pack');
				?>
			</td>
		</tr>
		
			
		<!--Change 'you must be logged in ' message---------------------------------------------------------------------->
		<tr>
			<th>17. 
				<?php _e ('Change "you must be logged in..." message' , 'bbp-style-pack' ) ; ?>
			</th>
		<?php 
		$name = 'must_be_logged_in' ;
		$item1="bsp_style_settings_ti[".$name."]" ;
		$value1 = (!empty($bsp_style_settings_ti[$name] ) ? $bsp_style_settings_ti[$name]  : '') ;
		?>
		<td colspan=2>
			<?php echo '<input id="'.$item1.'" class="large-text" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
			<label class="description"><?php _e( 'Default "You must be logged in to create new topics." Enter the words you want', 'bbp-style-pack' ); ?></label><br/>
			</td>
			</tr>
			
		
		<!--Click to add login---------------------------------------------------------------------->
		
		
		<tr>
			<th>18. 
				<?php _e ('Add login link' , 'bbp-style-pack' ) ; ?>
			</th>
			<?php
			$name = 'add_login' ;
			$name1 = __('Login link description', 'bbp-style-pack') ;
			$area1='_login' ;
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1] ) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			
			
		//put in option if version 2.5
			if ($bsp_bbpress_version == '2.5') {
			?>
			<td>
			<?php
			echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />';
			_e ('Click to activate' , 'bbp-style-pack' ) ;
  			?>
		</td>
		<?php
		}
		elseif ($bsp_bbpress_version == '2.6') {
		?>
		<td>
		<?php
			_e ('In bbpress 2.6 users are shown a login form if not logged in, so this option is not available' , 'bbp-style-pack' ) ;
		?>
		</td>
		<?php
		}
		
		?>
		</tr>
		<?php 
		//put in option if version 2.5
			if ($bsp_bbpress_version == '2.5') {
		?>
		<tr>
		<?php 
		$name = 'login_page' ;
		$name1 = __('Login Description', 'bbp-style-pack') ;
		$area1='_page' ;
		$item1="bsp_style_settings_ti[".$name.$area1."]" ;
		$value1 = (!empty($bsp_style_settings_ti[$name.$area1] ) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
		$name2 = __('Login page', 'bbp-style-pack') ;
		$area2='_url' ;
		$item2="bsp_style_settings_ti[".$name.$area2."]" ;
		$value2 = (!empty($bsp_style_settings_ti[$name.$area2] ) ? $bsp_style_settings_ti[$name.$area2]  : '') ;
		?>
		
		
		<td>
			<?php echo $name1 ; ?>
		</td>
		
		<td colspan=2>
			<?php echo '<input id="'.$item1.'" class="large-text" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
			<label class="description"><?php _e( 'Default "Login" Enter the words you want eg "log in", "sign in" etc.', 'bbp-style-pack' ); ?></label><br/>
			</td>
			</tr>
			<tr>
			<td>
			<?php echo $name2 ; ?>
		</td>
			
			<td colspan=2>
			<?php echo '<input id="'.$item2.'" class="large-text" name="'.$item2.'" type="text" value="'.esc_html( $value2 ).'"<br>' ; ?> 
			<label class="description"><?php _e( 'You should create a wordpress page with a login shortcode such as [bbp-login] and put the full url in here e.g. http://www.mysite.com/loginpage. If left blank the default wordpress login page will be used.', 'bbp-style-pack' ); ?></label><br/>
		</td>
	</tr>
	<?php
			} //end of if 2.5
		
	?>
	
	<!--Click to add register---------------------------------------------------------------------->
		<tr>
			<th>19. 
				<?php _e ('Add register link' , 'bbp-style-pack' ) ; ?>
			</th>
			<?php
			$name = 'add_register' ;
			$name1 = __('register link description', 'bbp-style-pack') ;
			$area1='_register' ;
			$item1="bsp_style_settings_ti[".$name.$area1."]" ;
			$value1 = (!empty($bsp_style_settings_ti[$name.$area1] ) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
			
			?>
		
			<td>
			<?php
			echo '<input name="'.$item1.'" id="'.$item1.'" type="checkbox" value="1" class="code" ' . checked( 1,$value1, false ) . ' />';
			_e ('Click to activate' , 'bbp-style-pack' ) ;
  			?>
		</td>
		</tr>
		
		<tr>
		<?php 
		$name = 'register_page' ;
		$name1 = __('Register Description', 'bbp-style-pack') ;
		$area1='_page' ;
		$item1="bsp_style_settings_ti[".$name.$area1."]" ;
		$value1 = (!empty($bsp_style_settings_ti[$name.$area1] ) ? $bsp_style_settings_ti[$name.$area1]  : '') ;
		$name2 = __('Register page', 'bbp-style-pack') ;
		$area2='_url' ;
		$item2="bsp_style_settings_ti[".$name.$area2."]" ;
		$value2 = (!empty($bsp_style_settings_ti[$name.$area2] ) ? $bsp_style_settings_ti[$name.$area2]  : '') ;
		?>
		
		
		<td>
			<?php echo $name1 ; ?>
		</td>
		
		<td colspan=2>
			<?php echo '<input id="'.$item1.'" class="large-text" name="'.$item1.'" type="text" value="'.esc_html( $value1 ).'"<br>' ; ?> 
			<label class="description"><?php _e( 'Default "register" Enter the words you want eg "log in", "sign in" etc.', 'bbp-style-pack' ); ?></label><br/>
			</td>
			</tr>
			<tr>
			<td>
			<?php echo $name2 ; ?>
		</td>
			
			<td colspan=2>
			<?php echo '<input id="'.$item2.'" class="large-text" name="'.$item2.'" type="text" value="'.esc_html( $value2 ).'"<br>' ; ?> 
			<label class="description"><?php _e( 'You should create a wordpress page with a register shortcode such as [bbp-register] and put the full url in here e.g. http://www.mysite.com/registerpage. If left blank the default wordpress login page will be used.', 'bbp-style-pack' ); ?></label><br/>
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
		

	
