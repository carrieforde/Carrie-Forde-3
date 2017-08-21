<?php
/**
 * Talks
 *
 * @package Carrie Forde 3
 */
?>

<section class="component component--talks component-no-padding full-width background-ocean-boat-blue color-white">

	<div class="image-as-background column" style="background-image: url('<?php echo CARRIEFORDE3_URL . 'assets/images/wordpress-stickers.jpg'; // WPCS: XSS OK. ?>');">
		<?php echo sprintf( '<span class="attribution">%s<a href="%s">%s</a></span>', esc_html__( 'Photo by Stewart Savage, ', 'carrieforde3' ), esc_url( 'http://abatonconsulting.com/' ), esc_html__( 'Abaton Consulting', 'carrieforde3' ) ); ?>
	</div>

	<div class="talks column">
		<header class="component__header">
			<h2 class="component__title color-white">
				<?php if ( cf3_has_upcoming_talks() ) : ?>
					<?php esc_html_e( 'Upcoming Talks', 'carrieforde3' ); ?>
				<?php else : ?>
					<?php esc_html_e( 'Featured Talks', 'carrieforde3' ); ?>
				<?php endif; ?>
			</h2>
		</header>
		<?php cf3_fetch_upcoming_speaking_post(); ?>
		<footer class="component__footer">
			<a href="<?php echo esc_url( get_site_url( null, '/speaking/', null ) ); ?>" class="button button--outline button--outline--white"><?php esc_html_e( 'View All Talks', 'carrieforde3' ); ?></a>
		</footer>
	</div>
</section>
