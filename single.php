<?php
/**
 * Template for displaying all single posts.
 *
 * @package carrieforde
 */

$type = cf3_post_type_for_pagination();

get_header(); ?>

	<div id="primary" class="content-area">

		<?php do_action( 'alcatraz_before_main' ); ?>

		<main id="main" class="site-main" role="main">

		<?php do_action( 'alcatraz_before_main_inside' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content-single', get_post_type() ); ?>

			<?php the_post_navigation( array(
				'prev_text' => '<h3><span class="post-navigation__span">Previous ' . $type . '</span>%title</h3>',
				'next_text' => '<h3><span class="post-navigation__span">Next ' . $type . '</span>%title</h3>',
			) ); ?>

			<?php // Maybe load comments. ?>
			<?php if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>

		<?php endwhile; ?>

		<?php do_action( 'alcatraz_after_main_inside' ); ?>

		</main>

		<?php do_action( 'alcatraz_after_main' ); ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
