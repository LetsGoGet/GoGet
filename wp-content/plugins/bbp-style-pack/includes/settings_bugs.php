<?php

//login settings page

function bsp_settings_bugs() {
 ?>
			
	<h3>
		<?php _e ('bbPress Bug Fixes' , 'bbp-style-pack' ) ; ?>
	</h3>
	<p>
		<?php _e ('This section lets you get over some bbpress bugs - enable as desired' , 'bbp-style-pack' ) ; ?>
	</p>
	<p>
		<?php _e ('They should work for you, but I cannot guarantee' , 'bbp-style-pack' ) ; ?>
	</p>
	<p>
		<?php _e ('When I am aware that they have been fixed in bbpress, I will remove them from here' , 'bbp-style-pack' ) ; ?>
	</p>
	
	<?php global $bsp_style_settings_bugs ;
	?>
	<form method="post" action="options.php">
	<?php wp_nonce_field( 'style-settings-bugs', 'style-settings-nonce' ) ?>
	<?php settings_fields( 'bsp_style_settings_bugs' );
	?>
					
			<table class="form-table">
			
			<!-- ACTIVATE  -->	
	<!-- checkbox to activate  -->
		<tr valign="top">  
			<th >
				<?php _e('Fix Threaded Replies Jump', 'bbp-style-pack'); ?>
			</th>
			<td>
				<?php _e( 'In bbpress 2.6.x threaded replies only work if the WordPress adminbar is enabled. If it is disabled and you click a reply link of a lower level reply the page is reloaded which is not supposed happen. If you then post the reply, it is added at the end of the forum post and not after the corresponding reply - this fix corrects that. ', 'bbp-style-pack' ); ?>
			</td>
			
		</tr>
		<tr>
			<td>
			</td>
					
			<td>
				<?php 
				$item = (!empty( $bsp_style_settings_bugs['activate_threaded_replies'] ) ?  $bsp_style_settings_bugs['activate_threaded_replies'] : '');
				echo '<input name="bsp_style_settings_bugs[activate_threaded_replies]" id="bsp_style_settings_bugs[activate_threaded_replies]" type="checkbox" value="1" class="code" ' . checked( 1,$item, false ) . ' />' ;
				?>
				<label class="description" for="bsp_settings[new_topic_description]">
					<?php _e( 'Apply Fix', 'bbp-style-pack' ); ?>
				</label>
			</td>
		
		</tr>
		
		
		
			<!-- ACTIVATE  -->	
	<!-- checkbox to activate  -->
		<tr valign="top">  
			<th >
				<?php _e('Fix Last Active Time', 'bbp-style-pack'); ?>
			</th>
			<td>
				<?php _e( 'In 2.6.x calcuating the last active time does not always work. Try these fixes, if you select both, only the first will apply', 'bbp-style-pack' ); ?>
			</td>
			
		</tr>
		
		<tr>
			<td>
			</td>
			
			<td>
				<?php 
				$item = (!empty( $bsp_style_settings_bugs['activate_last_active_time'] ) ?  $bsp_style_settings_bugs['activate_last_active_time'] : 0);
				echo '<input name="bsp_style_settings_bugs[activate_last_active_time]" id="bsp_style_settings_bugs[activate_last_active_time]" type="radio" value="1" class="code" ' . checked( 0,$item, false ) . ' />' ;
				?>
				<label class="description" for="bsp_settings[new_topic_description]">
					<?php _e( 'No fix', 'bbp-style-pack' ); ?>
				</label>
			</td>
		
		</tr>
		<tr>
			<td>
			</td>
			
			<td>
				<?php 
				echo '<input name="bsp_style_settings_bugs[activate_last_active_time]" id="bsp_style_settings_bugs[activate_last_active_time]" type="radio" value="2" class="code" ' . checked( 2,$item, false ) . ' />' ;
				?>
				<label class="description" for="bsp_settings[new_topic_description]">
					<?php _e( 'Try this option first - if it doesn\'t work, try the next ', 'bbp-style-pack' ); ?>
				</label>
			</td>
		
		</tr>
		
				<!-- ACTIVATE  -->	
	<!-- checkbox to activate  -->
		<tr valign="top">  
			<td >
			</td>
			
					
			<td>
				<?php 
				echo '<input name="bsp_style_settings_bugs[activate_last_active_time]" id="bsp_style_settings_bugs[activate_last_active_time]" type="radio" value="1" class="code" ' . checked( 1,$item, false ) . ' />' ;
				?>
				<label class="description" for="bsp_settings[new_topic_description]">
					<?php _e( 'Try this option if the above does not work', 'bbp-style-pack' ); ?>
				</label>
			</td>
		
		</tr>
		
		
		<!-- ACTIVATE  -->	
	<!-- checkbox to activate  -->
		<tr valign="top">  
			<th >
				<?php _e('Fix \'A variable Mismatch has been detected\'', 'bbp-style-pack'); ?>
			</th>
			<td>
					<?php _e( 'If other plugins (for instance \'Theme my login\')  register ‘action’ as a public query variable with WP, then on splitting or merging a topic, bbpress gives this error - this fix corrects that.', 'bbp-style-pack' ); ?>
				</td>
			
		</tr>
		<tr>
			<td>
			</td>
			
					
			<td>
				<?php 
				$item = (!empty( $bsp_style_settings_bugs['variable_mismatch'] ) ?  $bsp_style_settings_bugs['variable_mismatch'] : '');
				echo '<input name="bsp_style_settings_bugs[variable_mismatch]" id="bsp_style_settings_bugs[variable_mismatch]" type="checkbox" value="1" class="code" ' . checked( 1,$item, false ) . ' />' ;
				?>
				<label class="description" for="bsp_settings[new_topic_description]">
					<?php _e( 'Apply Fix', 'bbp-style-pack' ); ?>
				</label>
			</td>
		
		</tr>
				
<?php
$keymasters = get_users( [ 'role__in' => [ 'bbp_keymaster'] ] );
if (empty ($keymasters)) {
	?>
	<tr>
	<th>
	<?php esc_html_e( 'No Keymasters exist', 'bbp-style-pack'  ); ?>
	</th>
	<td>
					
					<?php	echo '<input name="bsp_style_settings_bugs[bsp_keymaster]" id="bsp_style_settings_bugs[bsp_keymaster]" type="checkbox" value="1" class="code" />' ; ?>
					<label for="bbp-forums-role"><?php esc_html_e( 'Set yourself as Keymaster ?', 'bbp-style-pack'  ); ?></label><br>
					<label for="bbp-forums-role"><?php esc_html_e( 'bbPress required at least one Keymaster, and only keymasters can set other keymasters. ', 'bbp-style-pack'  ); ?></label><br>
					<label for="bbp-forums-role"><?php esc_html_e( 'However bbPress does allow you to change the last keymaster to another role without warning - leaving no keymasters, and no ability to set a keymaster.', 'bbp-style-pack'  ); ?></label><br>
					<label for="bbp-forums-role"><?php esc_html_e( 'This is the case on this site, and you, or someone who has access to this area, needs to set themself as Keymaster.', 'bbp-style-pack'  ); ?></label><br>
					
					
					</td>
				</tr>
				<?php
		}

				
?>				
					
		</table>
	<!-- save the options -->
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e( 'Save', 'bbp-style-pack' ); ?>" />
		</p>
	</form>
	</div><!--end sf-wrap-->
	</div><!--end wrap-->
	
<?php
}







