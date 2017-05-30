<?php
/**
 * Get the ACF Hero markup.
 *
 * @param   int     [$post_id = 0]  The post ID.
 * @return  string                  The hero markup.
 */

$post_id = get_the_ID();
$hero_title        = get_post_meta( $post_id, 'hero_title', true );
$hero_description  = get_post_meta( $post_id, 'hero_description', true );
$image             = get_the_post_thumbnail_url( $post_id, 'hero-image' );

if ( empty( $image ) ) {
	return;
}

?>

<section class="hero hero-acf image-as-background" style="background-image: url( <?php echo esc_url( $image ); ?> );">

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
</section>
