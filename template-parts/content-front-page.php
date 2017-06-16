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

	<section class="module speaking-module full-width">

		<div class="row">
			<header>
				<h2 class="module__heading"><?php esc_html_e( 'Upcoming Talk', 'carrieforde3' ); ?></h2>
			</header>

			<?php cf3_fetch_upcoming_speaking_post(); ?>

			<footer>
				<a href="<?php echo esc_url( get_site_url( null, '/speaking/', null ) ); ?>" class="button"><?php esc_html_e( 'View All Talks', 'carrieforde3' ); ?></a>
			</footer>
		</div>
	</section>

	<section class="module open-source-project-module full-width background-white-smoke">

		<div class="row">
			<header>
				<h2 class="module__heading"><?php esc_html_e( 'I ❤️ Open Source', 'carrieforde' ); ?></h2>
			</header>

			<?php echo cf3_fetch_posts( array( 'category' => 'open-source', 'template_part' => 'template-parts/content-post-card-sticky' ) ); // WPCS: XSS OK. ?>
		</div>
	</section>

	<?php alcatraz_the_entry_footer(); ?>
</article>

<?php do_action( 'alcatraz_after_entry' ); ?>
