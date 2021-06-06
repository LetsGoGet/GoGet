<?php

/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<ul id="bbp-topic-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>
	<li class="bbp-topic-title">

		<?php if ( bbp_is_user_home() ) : ?>

			<?php if ( bbp_is_favorites() ) : ?>

				<span class="bbp-row-actions">

					<?php do_action( 'bbp_theme_before_topic_favorites_action' ); ?>

					<?php bbp_topic_favorite_link( array( 'before' => '', 'favorite' => '+', 'favorited' => '&times;' ) ); ?>

					<?php do_action( 'bbp_theme_after_topic_favorites_action' ); ?>

				</span>

			<?php elseif ( bbp_is_subscriptions() ) : ?>

				<span class="bbp-row-actions">

					<?php do_action( 'bbp_theme_before_topic_subscription_action' ); ?>

					<?php bbp_topic_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>

					<?php do_action( 'bbp_theme_after_topic_subscription_action' ); ?>

				</span>

			<?php endif; ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_topic_title' ); ?>

		<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a>
<!-- 在下面這邊加入判斷解鎖資訊 -->
		<?php 
			if(mycred_post_is_for_sale(bbp_get_topic_id() )&& mycred_get_content_sales_count(bbp_get_topic_id()) < 3){
				echo('
					<div class="watch-first"; ; style="display: inline-block; color: red ; padding: 4px ; border: 1px solid; text-align:center " >  搶先看！ </div>

				');
			}
		
		?>
		
		<?php
		if (bbp_get_forum_id() == 70){ // 討論版
    		$excerpt = get_the_excerpt(); 
            $excerpt = substr( $excerpt, 0, 100 );
            echo('<br>'. $excerpt);
		}
        ?>
<!-- 在上面這邊加入判斷解鎖資訊 -->

		<?php do_action( 'bbp_theme_after_topic_title' ); ?>

		<?php bbp_topic_pagination(); ?>

		<?php do_action( 'bbp_theme_before_topic_meta' ); ?>

		<p class="bbp-topic-meta">

			<?php do_action( 'bbp_theme_before_topic_started_by' ); ?>

			<span class="bbp-topic-started-by">
				<?php 
					printf( esc_html__( 'Started by: %1$s', 'bbpress' ), bbp_get_topic_author_link( array( 'size' => '14' ))
				);


				?>	
				</span>




			<?php do_action( 'bbp_theme_after_topic_started_by' ); ?>

			<?php if ( ! bbp_is_single_forum() || ( bbp_get_topic_forum_id() !== bbp_get_forum_id() ) ) : ?>

				<?php do_action( 'bbp_theme_before_topic_started_in' ); ?>

				<span class="bbp-topic-started-in"><?php printf( esc_html__( 'in: %1$s', 'bbpress' ), '<a href="' . bbp_get_forum_permalink( bbp_get_topic_forum_id() ) . '">' . bbp_get_forum_title( bbp_get_topic_forum_id() ) . '</a>' ); ?></span>
				<?php do_action( 'bbp_theme_after_topic_started_in' ); ?>

			<?php endif; ?>

		</p>

		<?php do_action( 'bbp_theme_after_topic_meta' ); ?>

		<?php bbp_topic_row_actions(); ?>

	</li>

    <li class="bbp-topic-voice-count"><?php echo get_wpbbp_post_view( bbp_get_topic_id() ); ?>
<!-- ===== -->


<li class="bbp-topic-reply-count">

	<!-- topic reply count -->
	<?php bbp_topic_reply_count() ?>

	</li>


	<li class="bbp-topic-freshness">

<!-- 控制顯示日期只有年/月 -->
	<?php 
		$post_date = bbp_get_topic_post_date();
		echo("<div style='transform: translateX(10px)'>".substr($post_date,0,10)."</div>");
	?>


<!--		<p class="bbp-topic-meta">

			<?php do_action( 'bbp_theme_before_topic_freshness_author' ); ?>

			<span class="bbp-topic-freshness-author"><?php bbp_author_link( array( 'post_id' => bbp_get_topic_last_active_id(), 'size' => 14 ) ); ?></span>

			<?php do_action( 'bbp_theme_after_topic_freshness_author' ); ?>

		</p>-->
	</li>
<!-- ======== -->
</ul><!-- #bbp-topic-<?php bbp_topic_id(); ?> -->


