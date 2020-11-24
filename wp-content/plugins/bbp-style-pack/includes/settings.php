<?php

function bsp_settings_page() {
	?>
	<div class="wrap">
		<div id="upb-wrap" class="upb-help">
			<h2>
				<?php _e('bbp Style pack', 'bbp-style-pack'); ?>
			</h2>
			<?php
			if ( ! isset( $_REQUEST['updated'] ) )
				$_REQUEST['updated'] = false;
			?>
			
			<?php if ( false !== $_REQUEST['updated'] ) : ?>
			<div class="updated fade">
				<p>
					<strong>
						<?php _e( 'Settings saved', 'bbp-style-pack'); ?>
					</strong>
				</p>
			</div>
			<?php endif; ?>
			
			<?php //tests if we have selected a tab
            if( isset( $_GET[ 'tab' ] ) ) {
				$active_tab = $_GET[ 'tab' ];
			}
			else {
				$active_tab= 'forums_index_styling';
            } 
			?>
		
	<?php // sets up the tabs ?>			
	<h2 class="nav-tab-wrapper">
	<a href="?page=bbp-style-pack&tab=forums_index_styling" class="nav-tab <?php echo $active_tab == 'forums_index_styling' ? 'nav-tab-active' : ''; ?>"><?php _e('Forums Index Styling', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=templates" class="nav-tab <?php echo $active_tab == 'templates' ? 'nav-tab-active' : ''; ?>"><?php _e('Forum Templates', 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=forum_display" class="nav-tab <?php echo $active_tab == 'forum_display' ? 'nav-tab-active' : ''; ?>"><?php _e('Forum Display', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=forum_order" class="nav-tab <?php echo $active_tab == 'forum_order' ? 'nav-tab-active' : ''; ?>"><?php _e('Forum Order', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=freshness" class="nav-tab <?php echo $active_tab == 'freshness' ? 'nav-tab-active' : ''; ?>"><?php _e('Freshness Display', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=breadcrumb" class="nav-tab <?php echo $active_tab == 'breadcrumb' ? 'nav-tab-active' : ''; ?>"><?php _e('Breadcrumbs', 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=buttons" class="nav-tab <?php echo $active_tab == 'buttons' ? 'nav-tab-active' : ''; ?>"><?php _e('Buttons', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=login" class="nav-tab <?php echo $active_tab == 'login' ? 'nav-tab-active' : ''; ?>"><?php _e('Login', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=login_fail" class="nav-tab <?php echo $active_tab == 'login_fail' ? 'nav-tab-active' : ''; ?>"><?php _e('Login Failures', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=roles" class="nav-tab <?php echo $active_tab == 'roles' ? 'nav-tab-active' : ''; ?>"><?php _e('Forum Roles', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=email" class="nav-tab <?php echo $active_tab == 'email' ? 'nav-tab-active' : ''; ?>"><?php _e('Subscription emails', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=topic_order" class="nav-tab <?php echo $active_tab == 'topic_order' ? 'nav-tab-active' : ''; ?>"><?php _e('Topic Order', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=topic_index_styling" class="nav-tab <?php echo $active_tab == 'topic_index_styling' ? 'nav-tab-active' : ''; ?>"><?php _e('Topics Index Styling', 'bbp-style-pack'); ?></a>	
	<a href="?page=bbp-style-pack&tab=topic_display" class="nav-tab <?php echo $active_tab == 'topic_display' ? 'nav-tab-active' : ''; ?>"><?php _e('Topic/Reply Display', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=topic_form" class="nav-tab <?php echo $active_tab == 'topic_form' ? 'nav-tab-active' : ''; ?>"><?php _e('Topic/Reply Form', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=profile" class="nav-tab <?php echo $active_tab == 'profile' ? 'nav-tab-active' : ''; ?>"><?php _e('Profile', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=search" class="nav-tab <?php echo $active_tab == 'search' ? 'nav-tab-active' : ''; ?>"><?php _e('Search Styling', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=shortcodesd" class="nav-tab <?php echo $active_tab == 'shortcodesd' ? 'nav-tab-active' : ''; ?>"><?php _e('Shortcodes', 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=unread" class="nav-tab <?php echo $active_tab == 'unread' ? 'nav-tab-active' : ''; ?>"><?php _e('Unread posts', 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=widgets" class="nav-tab <?php echo $active_tab == 'widgets' ? 'nav-tab-active' : ''; ?>"><?php _e('Widgets', 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=la_widget" class="nav-tab <?php echo $active_tab == 'la_widget' ? 'nav-tab-active' : ''; ?>"><?php _e('Latest Activity Widget styling', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=css" class="nav-tab <?php echo $active_tab == 'css' ? 'nav-tab-active' : ''; ?>"><?php _e('Custom CSS', 'bbp-style-pack'); ?></a>
	<a href="?page=bbp-style-pack&tab=css-location" class="nav-tab <?php echo $active_tab == 'css-location' ? 'nav-tab-active' : ''; ?>"><?php _e('CSS location', 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=translation" class="nav-tab <?php echo $active_tab == 'translation' ? 'nav-tab-active' : ''; ?>"><?php _e('Translations', 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=plugins" class="nav-tab <?php echo $active_tab == 'plugins' ? 'nav-tab-active' : ''; ?>"><?php _e('Other bbpress plugins', 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=reset" class="nav-tab <?php echo $active_tab == 'reset' ? 'nav-tab-active' : ''; ?>"><?php _e('Reset settings', 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=new" class="nav-tab <?php echo $active_tab == 'new' ? 'nav-tab-active' : ''; ?>"><?php _e("What's New?", 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=plugin-info" class="nav-tab <?php echo $active_tab == 'plugin-info' ? 'nav-tab-active' : ''; ?>"><?php _e('Plugin Information', 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=export" class="nav-tab <?php echo $active_tab == 'export' ? 'nav-tab-active' : ''; ?>"><?php _e('Export plugin settings', 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=import" class="nav-tab <?php echo $active_tab == 'import' ? 'nav-tab-active' : ''; ?>"><?php _e('Import plugin settings', 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=help" class="nav-tab <?php echo $active_tab == 'help' ? 'nav-tab-active' : ''; ?>"><?php _e('Help', 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=not_working" class="nav-tab <?php echo $active_tab == 'not_working' ? 'nav-tab-active' : ''; ?>"><?php _e('Not Working?', 'bbp-style-pack'); ?> </a>
	<a href="?page=bbp-style-pack&tab=bug_fixes" class="nav-tab <?php echo $active_tab == 'bug_fixes' ? 'nav-tab-active' : ''; ?>"><?php _e('bbPress Bug Fixes', 'bbp-style-pack'); ?> </a>
	</h2>
	
	
	<table class="form-table">
		<tr>		
			<td>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick" />
					<input type="hidden" name="hosted_button_id" value="GEMT7XS7C8PS4" />
					<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
					<img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1" />
				</form>
			</td>
			<td>
				<?php _e('If you find this plugin useful, please consider donating just a few dollars to help me develop and maintain it. You support will be appreciated', 'bbp-style-pack'); ?>
			</td>
			<td>
			<?php _e('With thanks to Jacobo Feijóo for extensive testing !', 'bbp-style-pack'); ?>
			</td>
		</tr>
	</table>
	
	<?php
	//****  Forum index style settings
	if ($active_tab == 'forums_index_styling' ) {
		bsp_style_settings_f();
	}

	//****  topic index style settings
	if ($active_tab == 'topic_index_styling' ) {
		bsp_style_settings_ti();
	}

	//****  topic style settings
	if ($active_tab == 'topic_display' ) {
		bsp_style_settings_t();
	}

	//****  forum template
	if ($active_tab == 'templates' ) {
		bsp_forum_templates();
	}

	//****  forum settings
	if ($active_tab == 'forum_display' ) {
		bsp_forum_display();
	}
	
	//****  forum settings
	if ($active_tab == 'forum_order' ) {
		bsp_style_settings_forum_order();
	}
	
	//****  topic form settings
	if ($active_tab == 'topic_form' ) {
		bsp_style_settings_form();
	}

	//****  freshness settings
	if ($active_tab == 'freshness' ) {
		bsp_style_settings_freshness();
	}

	//****  login settings
	if ($active_tab == 'login' ) {
		bsp_login_settings();
	}
	
	//****  login settings
	if ($active_tab == 'login_fail' ) {
		bsp_login_fail();
	}
	
	
	//****  profile settings
	if ($active_tab == 'profile' ) {
		bsp_profile_settings();
	}

	//****  Search settings
	if ($active_tab == 'search' ) {
		bsp_style_settings_search();
	}

	//****  breadcrumb settings
	if ($active_tab == 'breadcrumb' ) {
		bsp_breadcrumb_settings();
	}

	//****  roles settings
	if ($active_tab == 'roles' ) {
		bsp_roles();
	}

	//****  roles settings
	if ($active_tab == 'buttons' ) {
		bsp_style_settings_buttons() ;
	}

	//****  roles settings
	if ($active_tab == 'topic_order' ) {
		bsp_style_settings_topic_order() ;
	}

	//****  shortcode page
	if ($active_tab == 'shortcodesd' ) {
		bsp_shortcodes_display();
	}

	//****  widgets page
	if ($active_tab == 'widgets' ) {
		bsp_widgets();
	}


	//****  css page
	if ($active_tab == 'css' ) {
		bsp_css_settings();
	}

	//****  help page
	if ($active_tab == 'help' ) {
		bsp_help();
	}

	//****  plugins
	if ($active_tab == 'plugins' ) {
		bsp_plugins();
	}
	
	//****  plugins info
	if ($active_tab == 'translation' ) {
		bsp_translation_settings();
	}

	//****  plugins info
	if ($active_tab == 'plugin-info' ) {
		bsp_plugin_info();
	}

	//****  what's new page
	if ($active_tab == 'new' ) {
		bsp_new();
	}

	//****  la widget page
	if ($active_tab == 'la_widget' ) {
		bsp_style_settings_la();
	}

	//****  css location page
	if ($active_tab == 'css-location' ) {
		bsp_css_location();
	}

	//****  reset page
	if ($active_tab == 'reset' ) {
		bsp_style_settings_reset();
	}
	
	//****  export
	if ($active_tab == 'export' ) {
		bsp_style_settings_export();
	}
	//****  import
	if ($active_tab == 'import' ) {
		bsp_style_settings_import();
	}
	
	//****  Not working
	if ($active_tab == 'not_working' ) {
		bsp_not_working();
	}
	
	//****  unread
	if ($active_tab == 'unread' ) {
		bsp_style_settings_unread();
	}
	
	//****  email
	if ($active_tab == 'email' ) {
		bsp_style_settings_email();
	}
	
	//****  email
	if ($active_tab == 'bug_fixes' ) {
		bsp_settings_bugs();
	}


}	//end of function bsp_settings_page()

// register the plugin settings
function bsp_register_settings() {

	register_setting( 'bsp_style_settings_f', 'bsp_style_settings_f' );
	register_setting( 'bsp_style_settings_ti', 'bsp_style_settings_ti' );
	register_setting( 'bsp_style_settings_t', 'bsp_style_settings_t' );
	register_setting( 'bsp_style_settings_form', 'bsp_style_settings_form' );
	register_setting( 'bsp_style_settings_la', 'bsp_style_settings_la' );
	register_setting( 'bsp_forum_display', 'bsp_forum_display' );
	register_setting( 'bsp_forum_order', 'bsp_forum_order' );
	register_setting( 'bsp_login', 'bsp_login' );
	register_setting( 'bsp_login_fail', 'bsp_login_fail' );
	register_setting( 'bsp_breadcrumb', 'bsp_breadcrumb' );
	register_setting( 'bsp_profile', 'bsp_profile' );
	register_setting( 'bsp_templates', 'bsp_templates' );
	register_setting( 'bsp_css', 'bsp_css' );
	register_setting( 'bsp_roles', 'bsp_roles' );
	register_setting( 'bsp_style_settings_freshness', 'bsp_style_settings_freshness' );
	register_setting( 'bsp_style_settings_buttons', 'bsp_style_settings_buttons' );
	register_setting( 'bsp_css_location', 'bsp_css_location' );
	register_setting( 'bsp_topic_order', 'bsp_topic_order' );
	register_setting( 'bsp_style_settings_search', 'bsp_style_settings_search' );
	register_setting( 'bsp_style_settings_unread', 'bsp_style_settings_unread' );
	register_setting( 'bsp_style_settings_translation', 'bsp_style_settings_translation' );
	register_setting( 'bsp_style_settings_bugs', 'bsp_style_settings_bugs' );
	
	//the next one uses the callback sanitization feature to add a callback function bsp_test_email to issue a text email if test has been selected
	register_setting( 'bsp_style_settings_email', 'bsp_style_settings_email', 'bsp_test_email' );
}

//call register settings function
add_action( 'admin_init', 'bsp_register_settings' );

function bsp_settings_menu() {
	// add settings page
	add_submenu_page('options-general.php', __('bbp Style Pack', 'bbp-style-pack'), __('bbp Style Pack', 'bbp-style-pack'), 'manage_options', 'bbp-style-pack', 'bsp_settings_page');
}

add_action('admin_menu', 'bsp_settings_menu');