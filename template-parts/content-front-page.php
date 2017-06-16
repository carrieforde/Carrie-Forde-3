<?php
/**
 * Content template for the front page.
 *
 * @package carrieforde3
 */
?>

<?php do_action( 'alcatraz_before_entry' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php alcatraz_the_entry_header(); ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'alcatraz' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<section class="module speaking-module">
		<header>
			<h2 class="module__heading"><?php esc_html_e( 'Upcoming Talks', 'carrieforde3' ); ?></h2>
		</header>

		<?php echo cf3_fetch_posts( array( // WPCS: XSS OK.
			'post_type'     => 'cf-speaking',
			'template_part' => 'template-parts/content-speaking-card',
		) ); ?>
	</section>

	<?php alcatraz_the_entry_footer(); ?>
</article>

<?php do_action( 'alcatraz_after_entry' ); ?>
