<?php

/**
 * Topics Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_topics_loop' ); ?>

<ul id="bbp-forum-<?php bbp_forum_id(); ?>" class="bbp-topics">
	<li class="bbp-header">
		<ul class="forum-titles">
			<li class="bbp-topic-title"><?php esc_html_e( 'Topic', 'bbpress' ); ?></li>

<!-- Henry editing histroy -->	
			<li class="bbp-topic-voice-count"><?php esc_html_e( '點閱', 'bbpress' ); ?> 

				<a href="./?k=post_views_count"> 
					<?php if($_GET['k']=='post_views_count'){echo "▼";}else{ echo "▽" ;} ?>
				</a>
			</li>

			<li class="bbp-topic-reply-count"><?php esc_html_e( '留言', 'bbpress' ); ?>
				<a href="./?k=_bbp_reply_count"> 
					<?php if($_GET['k']=='_bbp_reply_count'){echo "▼";}else{ echo "▽" ;} ?>
			 	</a>

			</li>

		<li class="bbp-topic-post-date"><?php esc_html_e( '發布日期', 'bbpress' ); ?>
			
			<a href="./"> 
			<?php if($_GET['k']==''){ 
						echo "▼"; }else{ echo "▽" ;} 
				?>   
			</a>


		</li>
		</ul>
	</li>

<!-- Henry editing histroy-->	

	<li class="bbp-body">

		<?php while ( bbp_topics() ) : bbp_the_topic(); ?>

			<?php bbp_get_template_part( 'loop', 'single-topic' ); ?>

		<?php endwhile; ?>

	</li>

	<li class="bbp-footer">
		<div class="tr">
			<p>
				<span class="td colspan<?php echo ( bbp_is_user_home() && ( bbp_is_favorites() || bbp_is_subscriptions() ) ) ? '5' : '4'; ?>">&nbsp;</span>
			</p>
		</div><!-- .tr -->
	</li>
</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->

<?php do_action( 'bbp_template_after_topics_loop' );
