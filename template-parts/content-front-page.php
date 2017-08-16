<?php
/**
 * Content template for the front page.
 *
 * @package carrieforde3
 */
?>

<?php do_action( 'alcatraz_before_entry' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'front-page-content' ); ?>>

	<?php alcatraz_the_entry_header(); ?>

	<section class="component component-sm-padding component--newsletter full-width background-razzmatazz color-white">

		<div class="row row-flex">
			<h2 class="h3 color-white"><?php esc_html_e( 'Tips & tricks in your inbox!', 'carrieforde3' ); ?></h2>
			<?php echo do_shortcode( '[gravityform id="16" title="false" description="false"]' ); ?>
		</div>
	</section>

	<?php get_template_part( 'template-parts/components/component', 'three_column_text' ); ?>

	<?php get_template_part( 'template-parts/components/component', 'talks' ); ?>

	<section class="component open-source-project-component full-width background-white-smoke">

		<div class="row">
			<header>
				<h2 class="component__header"><?php esc_html_e( 'I ❤️ Open Source', 'carrieforde' ); ?></h2>
			</header>

			<?php echo cf3_fetch_posts( array( 'category' => 'open-source', 'template_part' => 'template-parts/content-post-card-sticky' ) ); // WPCS: XSS OK. ?>
		</div>
	</section>

	<?php alcatraz_the_entry_footer(); ?>
</article>

<?php do_action( 'alcatraz_after_entry' ); ?>
