<?php
/**
 * Template for Speaking archive cards.
 *
 * @package carrieforde3
 */

$video = get_post_meta( get_the_ID(), 'video_link', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card card--speaking' ); ?>>

	<div class="card__inner-wrap">
		<header class="entry-header card__header">
			<?php if ( ! empty( $video ) ) : ?>
				<div class="fluid-embed">
					<?php echo apply_filters( 'the_content', $video ); // WPCS: XSS OK. ?>
				</div>
			<?php elseif ( cf3_is_talk_upcoming() ) : ?>
				<span class="upcoming-talk color-white background-razzmatazz"><?php esc_html_e( 'Upcoming Talk', 'carrieforde3' ); ?></span>
			<?php endif; ?>
			<h2 class="entry-title card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>

		<div class="entry-content card__content">
			<?php the_excerpt(); ?>
		</div>

		<footer class="entry-footer card__footer">
			<a href="<?php the_permalink(); ?>" class="button button--text color-razzmatazz"><?php esc_html_e( 'Read More', 'carrieforde' ); ?></a>
		</footer>
	</div>
</article>
