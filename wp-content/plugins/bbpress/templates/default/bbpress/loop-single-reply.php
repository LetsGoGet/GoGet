<?php

/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

?>

<div id="post-<?php bbp_reply_id(); ?>" class="bbp-reply-header">
	<div class="bbp-meta">
		<span class="bbp-reply-post-date"><?php bbp_reply_post_date(); ?></span>

		<?php if (bbp_is_single_user_replies()) : ?>

			<span class="bbp-header">
				<?php esc_html_e('in reply to: ', 'bbpress'); ?>
				<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(bbp_get_reply_topic_id()); ?>"><?php bbp_topic_title(bbp_get_reply_topic_id()); ?></a>
			</span>

		<?php endif; ?>

		<!--	<a href="<?php bbp_reply_url(); ?>" class="bbp-reply-permalink">#<?php bbp_reply_id(); ?></a>-->

		<?php do_action('bbp_theme_before_reply_admin_links'); ?>

		<?php bbp_reply_admin_links(); ?>

		<?php do_action('bbp_theme_after_reply_admin_links'); ?>

	</div><!-- .bbp-meta -->
</div><!-- #post-<?php bbp_reply_id(); ?> -->

<div <?php bbp_reply_class(); ?>>
	<div class="bbp-reply-author">

		<?php do_action('bbp_theme_before_reply_author_details'); ?>

		<?php bbp_reply_author_link(array('show_role' => true)); ?>

		<?php if (current_user_can('moderate', bbp_get_reply_id())) : ?>

			<?php do_action('bbp_theme_before_reply_author_admin_details'); ?>

			<div class="bbp-reply-ip"><?php bbp_author_ip(bbp_get_reply_id()); ?></div>

			<?php do_action('bbp_theme_after_reply_author_admin_details'); ?>

		<?php endif; ?>

		<?php do_action('bbp_theme_after_reply_author_details'); ?>

	</div><!-- .bbp-reply-author -->

	<div class="bbp-reply-content">

		<?php do_action('bbp_theme_before_reply_content'); ?>

		<!-- add Quill css -->
		<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
		<?php
		$textarea_css = file_get_contents(ABSPATH . 'wp-content/plugins/andy-bbp-custom-form/css/textarea.css');
		echo ("<style>$textarea_css</style>");
		?>

		<?php bbp_reply_content(); ?>

		<!-- add target='_blank' to all link -->
		<?php
		echo ("<script type='text/javascript'>
			var link_element = document.querySelectorAll('div.ql-editor  a');
			for(var i = 0; i < link_element.length; i++)
				link_element[i].setAttribute('target', '_blank');
		</script>")
		?>

		<?php do_action('bbp_theme_after_reply_content'); ?>

	</div><!-- .bbp-reply-content -->
</div><!-- .reply -->