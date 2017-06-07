<?php
/**
 * Default template for single posts.
 *
 * @package carrieforde3
 */
?>

<?php do_action( 'alcatraz_before_entry' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'component-content' ); ?>>

	<?php alcatraz_the_entry_header(); ?>

	<div class="component-example">
		<?php if ( class_exists( 'wp_component_library' ) ) :
			wp_component_library()->component->display_component();
		endif; ?>
	</div>

	<div class="entry-content">

		<?php the_content(); ?>
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-component-library' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<div class="component-code">
		<?php if ( class_exists( 'wp_component_library' ) ) :
			wp_component_library()->component->display_component_meta();
		endif; ?>
	</div><!-- .component-code -->
</article>

<?php do_action( 'alcatraz_after_entry' ); ?>
