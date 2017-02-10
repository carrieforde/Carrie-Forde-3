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

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Post Hero',
		'description'       => 'This is the hero that appears at the top of posts. The hero first looks for a post thumbnail, and if one isn\'t found, it defaults to the category image. The category badge is positioned within the hero.',
		'patterns_included' => 'category_badge()',
		'function'          => 'cf3_get_post_hero()',
		'output'            => cf3_get_post_hero( cf3_get_post_id() ),
		'params'            => array( '$post_id' => '0' ),
		'args'              => array( '$post_id' => 'The ID of the post.' ),
	) ); ?>
</section>
