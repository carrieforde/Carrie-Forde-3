<?php
/**
 * Newsletter Component
 *
 * @package Carrie Forde 3
 */
?>

<section class="component component-sm-padding component--newsletter full-width background-razzmatazz color-white">

	<div class="row row-flex">
		<h2 class="h3 color-white"><?php esc_html_e( 'Tips & tricks in your inbox!', 'carrieforde3' ); ?></h2>
		<?php echo do_shortcode( '[gravityform id="16" title="false" description="false"]' ); ?>
	</div>
</section>
