<?php
/**
 * ACF - get meta.
 */

/**
 * Get the ACF Hero markup.
 *
 * @param   int     [$post_id = 0]  The post ID.
 * @return  string                  The hero markup.
 */
function cf3_get_acf_hero( $post_id = 0 ) {

	if ( ! $post_id ) {

		$post_id = get_the_ID();
	}

	$hero_title        = get_post_meta( $post_id, 'hero_title', true );
	$hero_description  = get_post_meta( $post_id, 'hero_description', true );
	$image             = get_post_thumbnail_id( $post_id );

	ob_start();

	if ( ! empty( $image ) ) { ?>

		<div class="hero hero-acf">
			<?php echo wp_kses_post( wp_get_attachment_image( $image, 'full' ) ); ?>

			<?php if ( ! empty( $hero_title ) || ! empty( $hero_description ) ) : ?>
				<div class="hero__text hero-acf__text">
					<?php if ( ! empty( $hero_title ) ) : ?>
						<h2 class="hero__title hero-acf__title"><?php echo esc_html( $hero_title ); ?></h2>
					<?php endif; ?>
					<?php if ( ! empty( $hero_description ) ) : ?>
						<div class="hero__description hero-acf__description"><?php echo esc_html( $hero_description ); ?></div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php
	}

	return ob_get_clean();
}
