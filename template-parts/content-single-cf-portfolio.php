<?php
/**
 * Template for single portfolio posts.
 *
 * @package carrieforde3
 */
?>

<?php do_action( 'alcatraz_before_entry' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content' ); ?>>

	<?php alcatraz_the_entry_header(); ?>

	<div class="entry-content">
        <?php cf3_the_portfolio_meta(); ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'alcatraz' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<?php alcatraz_the_entry_footer(); ?>
</article>

<?php do_action( 'alcatraz_after_entry' ); ?>
