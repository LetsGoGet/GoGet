<?php

function bsp_new() {
 ?>
			
						<table class="form-table">
					
					<tr valign="top">
						<th colspan="2">
						
						<h3>
						<?php _e ("What's New?" , 'bbp-style-pack' ) ; ?>
	

	</h3> 
	
	<h4><span style="color:blue"><?php _e('Version 4.6.1', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("Small correction for showing topic authors - you'll see nothing different! ", 'bbp-style-pack') ; ?>
</p>
	
	<h4><span style="color:blue"><?php _e('Version 4.6.0', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("I've added improved support for Last post time translation.  If you need to translate day etc. into your language, then put the translations in the translation tab, but put the plural first, eg days and then day.", 'bbp-style-pack') ; ?>
</p>
	
	
	<h4><span style="color:blue"><?php _e('Version 4.5.8/4.5.9', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("bbPress version 2.6.5 automatically adds a login to the topic and reply forms if the user is not logged in.  This login is the standard bbpress login which goes to the wordpress wp-login url.  If you are not using standard wordpress login, then the login may fail, so I've added the ability to remove the bbPress login. See Topic/Reply Form tab item 15", 'bbp-style-pack') ; ?>
</p>
	
	<h4><span style="color:blue"><?php _e('Version 4.5.7', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("bbPress required at least one Keymaster, and only keymasters can set other keymasters. However bbPress does allow you to change the last keymaster to another role without warning - leaving no keymasters, and no ability to set a keymaster.  I've added some code in the bug fixes tab that detects if this has happened, and allows creation of a new keymaster.", 'bbp-style-pack') ; ?>
</p>
	
	<h4><span style="color:blue"><?php _e('Version 4.5.6', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("I've added a new tab 'Login failures'.  If you are using either the [bbp-login] shortcode or the bbpress login widget, if users mis-enter login information, they are taken to the wordpress login.  This tab allows you to keep them in the relevant area and display error messages as you wish.", 'bbp-style-pack') ; ?>
</p>
	
	<h4><span style="color:blue"><?php _e('Version 4.5.5', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("I've added a different version of the bug fix for latest activity - this uses the proposed code in bbpress for the fix.  Go to bug fixes and select 'Try this option first' ", 'bbp-style-pack') ; ?>
</p>
	
	<h4><span style="color:blue"><?php _e('Version 4.5.4', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("If you turn off or restrict profiles in the 'profiles' tab, then I've added the ability to enter where users are redirected to if they try unauthorised access.", 'bbp-style-pack') ; ?>
</p>
<p>
<?php _e("I've added the new versions of topic and reply forms if you are using bbpress 2.6.x - this just brings these up to date for per forum moderation.", 'bbp-style-pack') ; ?>
</p>
	
	<h4><span style="color:blue"><?php _e('Version 4.5.3', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("I've added placeholder text to the topic and reply forms", 'bbp-style-pack') ; ?>
</p>
	
	<h4><span style="color:blue"><?php _e('Version 4.5.1/4.5.2', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("I've added additional root and current multi language of using polylang", 'bbp-style-pack') ; ?>
</p>
	
	<h4><span style="color:blue"><?php _e('Version 4.5.0', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("I added a bug fix to prevent an error on topic merging - see bug fixes tab", 'bbp-style-pack') ; ?>
</p>

<h4><span style="color:blue"><?php _e('Version 4.4.9', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("For Polylang plugin users, I've added the ability for the breadcrumb home to go to different pages for different languages", 'bbp-style-pack') ; ?>
</p>

<h4><span style="color:blue"><?php _e('Version 4.4.8', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("I added the ability to show the items on the Login tab to individual menus", 'bbp-style-pack') ; ?>
</p>

<h4><span style="color:blue"><?php _e('Version 4.4.7', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("I added a bug fix to prevent an error on topic splitting", 'bbp-style-pack') ; ?>
</p>

<h4><span style="color:blue"><?php _e('Version 4.4.5/4.4.6', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("bug fixes to 4.4.3", 'bbp-style-pack') ; ?>
</p>

<h4><span style="color:blue"><?php _e('Version 4.4.4', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("I've corrected an error in the css generator that caused a typo in 2 parts of the css", 'bbp-style-pack') ; ?>
</p>

<h4><span style="color:blue"><?php _e('Version 4.4.3', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("I've added a bug fix tab, with a couple of bug fixes for 2.6.x pending fixes within bbpress ", 'bbp-style-pack') ; ?>
</p>

<h4><span style="color:blue"><?php _e('Version 4.4.1/4.4.2', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("A technical update to add the 'widget' class to a widget !", 'bbp-style-pack') ; ?>
</p>

<h4><span style="color:blue"><?php _e('Version 4.3.9/4.4.0', 'bbp-style-pack' ) ; ?></span></h4>
<p>
<?php _e("A couple of technical updates to fix minor errors.", 'bbp-style-pack') ; ?>
</p>


 <?php
}
