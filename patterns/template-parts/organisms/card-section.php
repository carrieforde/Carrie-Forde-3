<?php
/**
 * Card Section
 */
?>

<section class="alcatraz-pattern">

	<h2 class="alcatraz-pattern__heading"><?php esc_html_e( 'Card Sections', 'alcatraz' ); ?></h2>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Posts Grid',
		'description'       => 'This is the default posts grid layout. The posts section is wrapped in <code>' . esc_html( '<section class="grid--one-two-three" />' ) . '</code>, and utilizes a CSS-masonry effect using <code>column-count, column-gap, and break-inside</code>.',
		'patterns_included' => 'alcatraz_button',
		'function'          => 'cf3_fetch_posts( array(
	\'template_part\' => \'template-parts/content-post-card\',
) )',
		'output'            => '<section class="grid--one-two-three">' . cf3_fetch_posts( array(
			'template_part' => 'template-parts/content-post-card',
			'posts_per_page' => 6,
		) ) . '</section>',
		'params'            => array( '$args' => 'The arguments.' ),
		'args'              => array( 'template_part' => 'template-parts/content-post-card' ),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Portfolio Section',
		'description'       => 'This is the default portfolio grid layout. The portfolio section is wrapped in <code>' . esc_html( '<section class="grid--one-two' ) . '</code>, and this grid utilitzes CSS columns for layout.',
		'patterns_included' => 'alcatraz_button',
		'function'          => 'cf3_fetch_posts( array(
	\'template_part\' => \'template-parts/content-portfolio-card\',
) )',
		'output'            => '<section class="grid--one-two">' . cf3_fetch_posts( array(
			'template_part' => 'template-parts/content-portfolio-card',
			'posts_per_page' => 4,
			'post_type' => 'cf-portfolio'
		) ) . '</section>',
		'params'            => array( '$args' => 'The arguments.' ),
		'args'              => array( 'template_part' => 'template-parts/content-post-card' ),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Related Posts',
		'description'       => 'Related posts show at the bottom of the single post page. Related posts shows up to three random posts based on the single post\'s tag.',
		'patterns_included' => '',
		'function'          => 'cf3_get_related_posts()',
		'output'            => cf3_get_related_posts( cf3_get_post_id() ),
		'params'            => array(),
		'args'              => array(),
	) ); ?>
</section>
