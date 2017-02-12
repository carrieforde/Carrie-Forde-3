<?php
/**
 * Card Section
 */
?>

<section class="alcatraz-pattern">

	<h2 class="alcatraz-pattern__heading"><?php esc_html_e( 'Card Sections', 'alcatraz' ); ?></h2>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Posts Grid',
		'description'       => 'This is the default posts grid layout. The posts section is wrapped in <code>' . esc_html( '<section class="posts-grid />' ) . '</code>, and utilizes a CSS-masonry effect using <code>column-count, column-gap, and break-inside</code>.',
		'patterns_included' => 'alcatraz_button',
		'function'          => 'cf3_fetch_posts( array(
	\'template_part\' => \'template-parts/content-post-card\',
) )',
		'output'            => '<section class="post-grid">' . cf3_fetch_posts( array(
			'template_part' => 'template-parts/content-post-card',
			'posts_per_page' => 6,
		) ) . '</section>',
		'params'            => array( '$args' => 'The arguments.' ),
		'args'              => array( 'template_part' => 'template-parts/content-post-card' ),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Portfolio Section',
		'description'       => 'This is the default card for posts.',
		'patterns_included' => 'alcatraz_button',
		'function'          => 'cf3_fetch_posts( array(
	\'template_part\' => \'template-parts/content-portfolio-card\',
) )',
		'output'            => cf3_fetch_posts( array(
			'template_part' => 'template-parts/content-portfolio-card',
			'posts_per_page' => 2,
			'post_type' => 'cf-portfolio'
		) ),
		'params'            => array( '$args' => 'The arguments.' ),
		'args'              => array( 'template_part' => 'template-parts/content-post-card' ),
	) ); ?>
</section>
