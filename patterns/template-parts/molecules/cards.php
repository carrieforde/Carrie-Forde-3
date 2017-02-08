<?php
/**
 * Cards
 */
?>

<section class="alcatraz-pattern">

	<h2 class="alcatraz-pattern__heading"><?php esc_html_e( 'Cards', 'alcatraz' ); ?></h2>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Post Card - Sticky Post',
		'description'       => 'This is the card for displaying sticky posts',
		'patterns_included' => 'alcatraz_button()',
		'function'          => 'cfe_get_sticky_post( array( \'template_part\' => \'template-parts/content-post-card\' ) )',
		'output'            => cf3_get_sticky_post( array( 'template_part' => 'template-parts/content-post-card-sticky' ) ),
		'params'            => array( '$args' => 'The arguments.' ),
		'args'              => array( 'template_part' => 'template-parts/content-post-card-sticky' ),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Post Card - Thoughts',
		'description'       => 'This is the default card for posts.',
		'patterns_included' => 'alcatraz_button',
		'function'          => 'cf3_fetch_posts( array(
	\'category_name\' => \'thoughts\',
	\'template_part\' => \'template-parts/content-post-card\',
) )',
		'output'            => cf3_fetch_posts( array(
			'category_name' => 'thoughts',
			'template_part' => 'template-parts/content-post-card',
		) ),
		'params'            => array( '$args' => 'The arguments.' ),
		'args'              => array( 'template_part' => 'template-parts/content-post-card' ),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Post Card - Development',
		'description'       => 'This is the default card for posts.',
		'patterns_included' => 'alcatraz_button',
		'function'          => 'cf3_fetch_posts( array(
	\'category_name\' => \'development\',
	\'template_part\' => \'template-parts/content-post-card\',
) )',
		'output'            => cf3_fetch_posts( array(
			'category_name' => 'development',
			'template_part' => 'template-parts/content-post-card',
		) ),
		'params'            => array( '$args' => 'The arguments.' ),
		'args'              => array( 'template_part' => 'template-parts/content-post-card' ),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Portfolio Card',
		'description'       => 'This is the card for the Portfolio post type.',
		'patterns_included' => '',
		'function'          => 'cf3_fetch_posts( array( \'post_type\' => \'cf-portfolio\', \'template-part\' => \'template-parts/content-portfolio-card\' ) )',
		'output'            => cf3_fetch_posts( array(
			'post_type' => 'cf-portfolio',
			'template_part' => 'template-parts/content-portfolio-card'
		) ),
		'params'            => array( '$args' => 'The arguments.' ),
		'args'              => array( 'post_type' => 'cf-portfolio', 'template-part' => 'template-part/content-portfolio-card' ),
	) ); ?>
</section>
