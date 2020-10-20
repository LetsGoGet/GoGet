<?php
function bsp_plugin_info() {
	//get the info (thanks Pascal for this code !)
	
	$sysinfo = array();
	
	// wp version
	$newarray = array ( 'WP version' => get_bloginfo('version') );
	$sysinfo = array_merge($sysinfo, $newarray);

	// theme
	$mytheme = wp_get_theme();
	$newarray = array ( 'Theme' => $mytheme["Name"].' '.$mytheme["Version"] );
	$sysinfo = array_merge($sysinfo, $newarray);

	// PHP version
	$newarray = array ( 'PHP version' => phpversion() );
	$sysinfo = array_merge($sysinfo, $newarray);

	// bbpress version
	if (function_exists('bbPress')) {
		$bbp = bbpress();
	} else {
		global $bbp;
	}
	if (isset($bbp->version)) {
		$bbpversion = $bbp->version;
	} else {
		$bbpversion = '???';
	}		
	$newarray = array ( 'bbPress version' => $bbpversion );
	$sysinfo = array_merge($sysinfo, $newarray);

	// site url		
	$newarray = array ( 'site url' => get_bloginfo('url') );
	$sysinfo = array_merge($sysinfo, $newarray);

	// Active plugins
	$newarray = array ( 'Active Plugins' => 'Name and Version' );
	$sysinfo = array_merge($sysinfo, $newarray);
	$plugins=get_plugins();
	$activated_plugins=array();
	$i = 1;
	foreach (get_option('active_plugins') as $p){           
		if(isset($plugins[$p])){
			$linetoadd = $plugins[$p]["Name"] . ' ' . $plugins[$p]["Version"] . '<br>';
			$newarray = array ( '- p'.$i => $linetoadd );
		       	$sysinfo = array_merge($sysinfo, $newarray);
		       	$i = $i + 1;
		}           
	}
	
	//start output
	?>
	<div id="bsp-plugin-info" >
	<?php
	echo '<h3>'; _e('Plugin Information', 'bbp-private-groups'); echo'</h3>';
	echo '<table >';
	array_walk($sysinfo, create_function('$item1, $key', 'echo "<tr><td>$key</td><td>$item1</td></tr>";'));
	?>
	</table>
	<table>
	<tr><th valign='top' style="width:250px">
	Variable </td><th style="width:750px"></td></tr>
	<?php
	//output wp_options
	$value = 'bsp_style_settings_f' ;
	bsp_style_display ($value) ;
	$value = 'bsp_style_settings_ti' ;
	bsp_style_display ($value) ;
	$value = 'bsp_style_settings_t' ;
	bsp_style_display ($value) ;
	$value = 'bsp_style_settings_la' ;
	bsp_style_display ($value) ;
	$value = 'bsp_style_settings_form' ;
	bsp_style_display ($value) ;
	$value = 'bsp_profile' ;
	bsp_style_display ($value) ;
	$value = 'bsp_forum_display' ;
	bsp_style_display ($value) ;
	$value = 'bsp_login' ;
	bsp_style_display ($value) ;
	$value = 'bsp_breadcrumb' ;
	bsp_style_display ($value) ;
	$value = 'bsp_templates' ;
	bsp_style_display ($value) ;
	$value = 'bsp_css' ;
	bsp_style_display ($value) ;
	$value = 'bsp_style_settings_freshness' ;
	bsp_style_display ($value) ;
	$value = 'bsp_style_settings_unread' ;
	bsp_style_display ($value) ;
	?>
	<tr><th>Roles</th></tr>
	<tr><td>
	<?php $value = 'bsp_roles' ; ?>
	</td><td>
	<?php bsp_style_display ($value) ; ?>
	</td></tr>
	<tr><th>css location</th>
	<td>
	<?php 
	global $bsp_css_location ;
	if (!empty ($bsp_css_location ['activate css location']) && !empty($bsp_css_location ['location'])) {
	$url = home_url();
	echo esc_url( $url ).'/'.$bsp_css_location ['location'] ; 
	}
	else echo plugins_url('css/',dirname(__FILE__) ) ; ?>
</td></tr>
	</table>
</div>


<script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>

<script>
 (function(){
    new Clipboard('#copy-button');
})();
</script>

 


<!-- Trigger -->
<button class="button" id="copy-button" data-clipboard-action="copy" data-clipboard-target="#bsp-plugin-info">
    Copy to clipboard
</button>

	
	
	
<?php
	
}

function bsp_style_display ($value) {
	//outputs the style as a string
	global $wpdb;
	$bsp_style_settings=$wpdb->get_col("select option_value from $wpdb->options where option_name = '$value'") ;
	//$bsp_style_settings = '' ;
	//$value3 = (!empty($bsp_style_settings_f[$name.$area3]) ? $bsp_style_settings_f[$name.$area3]  : '') ;
	$bsp_style_settings_display = (!empty($bsp_style_settings) ? implode ( $bsp_style_settings )  : '') ;
	//if (!empty ($bsp_style_settings)) $bsp_style_settings_display = implode ( $bsp_style_settings ) ;
	?>
	<tr><td valign='top'>
	<?php echo $value ; ?>
	</td><td>
	<?php echo ( $bsp_style_settings_display) ; ?>	
	</td></tr>
<?php
}


?>