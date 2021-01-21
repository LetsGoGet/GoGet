<?php
/**
 * Template part for displaying the footer info
 *
 * @package buddyx
 */

namespace BuddyX\Buddyx;
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />

<div class="site-info">
    <div class="container">	
        <?php //echo buddyx_footer_custom_text(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		
		<img class="footer-logo" src="https://dev2.letsgoget.info/wp-content/uploads/2020/12/logo-footer.jpg" alt="goget-logo">
		<span class="footer-contact">
			<p style="display: inline;">聯絡我們：</p>
			<a href="https://www.facebook.com/GoGetGoAndGetYourDreamJob/" target="_blank"  style="margin-right: 3px;"><span class="fab fa-facebook-square"></span>Facebook</a>
			<a href="https://www.instagram.com/goget_tw/?hl=zh-tw" target="_blank"><span class="fab fa-instagram"></span>Instagram</a>
		</span>
    </div>

	<?php
    if (function_exists('the_privacy_policy_link')) {
        the_privacy_policy_link();
    }
    ?>
</div><!-- .site-info -->
