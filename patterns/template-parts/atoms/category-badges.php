<?php
/**
 * Category Badges
 */
?>

<section class="alcatraz-pattern">

	<h2 class="alcatraz-pattern__heading"><?php esc_html_e( 'Category Badges', 'alcatraz' ); ?></h2>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Category Badge',
		'description'       => 'Category Badges display the main category of a post. The background color of the category badge is set with term meta. A modifier is appended to the end of badge\'s class for styling purposes. This function is set up to <strong>only</strong> return a single category.',
		'patterns_included' => '',
		'function'          => 'cf3_get_post_card_category_badge()',
		'output'            => cf3_get_post_card_category_badge( cf3_get_post_id() ),
	) );?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Category Badge - Thoughts',
		'description'       => 'Category Badge for the Thoughts category.',
		'patterns_included' => '',
		'function'          => 'cf3_get_post_card_category_badge()',
		'output'            => cf3_get_post_card_category_badge( cf3_get_post_id( array( 'category_name' => 'thoughts' ) ) ),
	) );?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Category Badge - Development',
		'description'       => 'Category Badge for the Development category.',
		'patterns_included' => '',
		'function'          => 'cf3_get_post_card_category_badge()',
		'output'            => cf3_get_post_card_category_badge( cf3_get_post_id( array( 'category_name' => 'development' ) ) ),
	) );?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Category Badge - Design',
		'description'       => 'Category Badge for the Design category.',
		'patterns_included' => '',
		'function'          => 'cf3_get_post_card_category_badge()',
		'output'            => cf3_get_post_card_category_badge( cf3_get_post_id( array( 'category_name' => 'design' ) ) ),
	) );?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Category Badge - WordPress',
		'description'       => 'Category Badge for the WordPress category.',
		'patterns_included' => '',
		'function'          => 'cf3_get_post_card_category_badge()',
		'output'            => cf3_get_post_card_category_badge( cf3_get_post_id( array( 'category_name' => 'WordPress' ) ) ),
	) );?>
</section>
