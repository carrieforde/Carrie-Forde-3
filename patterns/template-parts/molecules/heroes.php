<?php
/**
 * Cards
 */
?>

<section class="alcatraz-pattern">

	<h2 class="alcatraz-pattern__heading"><?php esc_html_e( 'Heroes', 'alcatraz' ); ?></h2>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Homepage Hero',
		'description'       => 'This is the hero that appears on the homepage. The hero utilizes the post thumbnail and ACF post meta.',
		'function'          => 'cf3_get_acf_hero()',
		'output'            => cf3_get_acf_hero( get_option( 'page_on_front' ) ),
	) ); ?>
</section>
