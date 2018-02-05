<?php
/**
 * Template for the blog landing page.
 *
 * @package carrieforde3
 */

// Set up a few variables.
$type = cf3_post_type_for_pagination();
$i    = 0; // an iterator to help us grab the right post card.

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

			<div class="blog-grid masonry"></div>

			<button id="loadMore" class="button" type="button"><?php esc_html_e( 'Load More Posts', 'carrieforde3' ); ?></button>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		<?php do_action( 'alcatraz_after_main_inside' ); ?>

		</main>

		<?php do_action( 'alcatraz_after_main' ); ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
