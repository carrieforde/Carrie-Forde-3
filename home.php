<?php
/**
 * Template for the blog landing page.
 *
 * @package carrieforde3
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php do_action( 'alcatraz_before_main' ); ?>

		<main id="main" class="site-main" role="main">

		<?php do_action( 'alcatraz_before_main_inside' ); ?>

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<div class="blog-grid masonry">
				<?php echo cf3_get_sticky_post( array( // WPCS: XSS OK.
					'template_part' => 'template-parts/content-post-card-sticky',
				) ); ?>

				<?php echo cf3_fetch_posts( array( // WPCS: XSS OK.
					'offset' => 1,
					'posts_per_page' => 8,
					'template_part' => 'template-parts/content-post-card',
				) ); ?>
			</div>

			<?php $type = cf3_post_type_for_pagination(); ?>

			<?php the_posts_navigation( array(
				'prev_text' => '<h3>Older ' . $type . 's</h3>',
				'next_text' => '<h3>Newer ' . $type . 's</h3>',
			) ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		<?php do_action( 'alcatraz_after_main_inside' ); ?>

		</main>

		<?php do_action( 'alcatraz_after_main' ); ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
