<?php
/**
 * Image Hero Component
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
$image       = get_the_post_thumbnail_url( $post_id, 'hero-image' );
$title       = get_post_meta( $post_id, $prefix . 'title', true );
$description = get_post_meta( $post_id, $prefix . 'description', true );
$cta_button  = get_post_meta( $post_id, $prefix . 'cta_button', true );

// Bail if the image is empty.
if ( empty( $image ) ) {
	return;
}

// Start the markup. 🎉 ?>
<section class="hero image-as-background full-width" style="background-image: url( <?php echo esc_url( $image ); ?> );" role="dialog" aria-labelledby="hero-title" aria-describedby="hero-description">

	<?php if ( ! empty( $title ) || ! empty( $description ) ) : ?>
		<div class="hero__text">
			<?php if ( ! empty( $title ) ) : ?>
				<h2 class="hero__title"><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>

			<?php if ( ! empty( $description ) ) : ?>
				<p class="hero__description"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>

			<?php if ( 'yes' === $cta_button ) :
				$button_text = get_post_meta( $post_id, $prefix . 'button_text', true );
				$button_link = get_post_meta( $post_id, $prefix . 'button_link', true );

				// Return if either of button part is empty.
				if ( ! empty( $button_text && $button_link ) ) : ?>
					<a href="<?php echo esc_url( $button_link ); ?>" class="button"><?php echo esc_html( $button_text ); ?></a>
				<?php endif; ?>
			<?php endif; ?>
		</div><!-- .hero__text -->
	<?php endif; ?>
</section><!-- .hero -->
