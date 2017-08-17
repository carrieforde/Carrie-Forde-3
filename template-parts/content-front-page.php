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

	<?php get_template_part( 'template-parts/components/component', 'newsletter' ); ?>

	<?php get_template_part( 'template-parts/components/component', 'three_column_text' ); ?>

	<?php get_template_part( 'template-parts/components/component', 'talks' ); ?>

	<?php alcatraz_the_entry_footer(); ?>
</article>

<?php do_action( 'alcatraz_after_entry' ); ?>
