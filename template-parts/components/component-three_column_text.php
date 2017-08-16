<?php
/**
 * Three Column Text Component
 *
 * @since   0.0.0
 * @package WP_Component_Library
 */

// Get the post ID.
$post_id = get_the_ID();

// If we're using this within the components library, we need the flexible content name, and row count.
$component = get_post_meta( $post_id, 'component', true );
$prefix    = ( ! empty( $component ) ) ? 'component_' . $count . '_' : '';

// Get component variables.
$col_1_title = get_post_meta( $post_id, $prefix . 'column_1_title', true );
$col_1_text  = get_post_meta( $post_id, $prefix . 'column_1_text', true );
$col_2_title = get_post_meta( $post_id, $prefix . 'column_2_title', true );
$col_2_text  = get_post_meta( $post_id, $prefix . 'column_2_text', true );
$col_3_title = get_post_meta( $post_id, $prefix . 'column_3_title', true );
$col_3_text  = get_post_meta( $post_id, $prefix . 'column_3_text', true );

// Start the markup. 🎉 ?>
<section class="component component--three-column-text full-width">

	<div class="row">
		<div class="column">
			<h3 class="color-razzmatazz"><?php echo esc_html( $col_1_title ); ?></h3>
			<div class="content"><?php echo wp_kses_post( $col_1_text ); ?></div>
		</div>

		<div class="column">
			<h3 class="color-razzmatazz"><?php echo esc_html( $col_2_title ); ?></h3>
			<div class="content"><?php echo wp_kses_post( $col_2_text ); ?></div>
		</div>

		<div class="column">
			<h3 class="color-razzmatazz"><?php echo esc_html( $col_3_title ); ?></h3>
			<div class="content"><?php echo wp_kses_post( $col_3_text ); ?></div>
		</div>
	</div>
</section><!-- .hero -->
