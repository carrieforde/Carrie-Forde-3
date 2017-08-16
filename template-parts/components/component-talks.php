<?php
/**
 * Talks
 *
 * @package Carrie Forde 3
 */
?>

<section class="component component--talks full-width background-dark-pastel-green color-white">

	<div class="image-as-background column" style="background-image: url('<?php echo CARRIEFORDE3_URL . 'images/wordpress-stickers.jpg'; // WPCS: XSS OK. ?>');">
		<span><?php esc_html_e( 'Photo by Stewart Savage, Abaton Consulting.', 'carrieforde3' ); ?></span>
	</div>
	<div class="talks column">
		<?php cf3_fetch_upcoming_speaking_post(); ?>
	</div>
</section>
