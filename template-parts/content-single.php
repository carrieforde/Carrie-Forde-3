<?php
/**
 * Default template for single posts.
 *
 * @package carrieforde3
 */
if ( is_singular( 'cf-speaking' ) ) {

	$post_id      = get_the_ID();
	$video        = get_post_meta( $post_id, 'video_link', true );
	$presentation = get_post_meta( $post_id, 'speaker_deck_link', true );
} ?>

<?php do_action( 'alcatraz_before_entry' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content' ); ?>>

	<?php alcatraz_the_entry_header(); ?>

	<div class="entry-content">
		
		<?php if ( is_singular( 'cf-speaking' ) ) : ?>
			<?php echo apply_filters( 'the_content', $video ); // WPCS: XSS OK. ?>

			<?php cf3_the_speaking_meta(); ?>
		<?php endif; ?>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'alcatraz' ),
				'after'  => '</div>',
			) );
		?>

		<?php if ( is_singular( 'cf-speaking' ) ) : ?>
			<?php echo apply_filters( 'the_content', $presentation ); ?>
		<?php endif; ?>
	</div>

	<?php alcatraz_the_entry_footer(); ?>
</article>

<?php do_action( 'alcatraz_after_entry' ); ?>
