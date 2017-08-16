<?php
/**
 * Template for displaying the CF Portfolio Archive.
 *
 * @package carrieforde3
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php do_action( 'alcatraz_before_main' ); ?>

		<main id="main" class="site-main" role="main">

		<?php do_action( 'alcatraz_before_inside' ); ?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php the_archive_title( '<h1 class="page-title screen-reader-text">', '</h1>' ); ?>
			</header>

			<div class="page-content grid--one-two">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'component-card' ); ?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			
		</div><!-- .page-content -->
		<?php endif; ?>

		<?php do_action( 'alcatraz_after_main_inside' ); ?>

		</main>

		<?php do_action( 'alcatraz_after_main' ); ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
