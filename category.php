<?php
/**
 * Template for the category landing page.
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

			<div class="blog-grid masonry">
				
				<?php while ( have_posts() ) : the_post(); ?>
						
						<?php if ( 0 === $i ) :
							get_template_part( 'template-parts/content-post-card-sticky' );

						else :
							get_template_part( 'template-parts/content-post-card' );
						endif; ?>

					<?php $i++; ?>
				<?php endwhile; ?>

			</div>

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
