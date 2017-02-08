<?php
/**
 * Theme images.
 */
?>

<section class="alcatraz-pattern">

	<h2 class="alcatraz-pattern__heading"><?php esc_html_e( 'Images', 'alcatraz' ); ?></h2>

	<?php alcatraz_pattern_doc( array(
		'heading'     => 'Post Thumbnail',
		'description' => 'The default post thumbnail is 1200 x 740px',
		'function'    => 'the_post_thumbnail()',
		'output'      => alcatraz_image( array(
			'type' => 'url',
			'src' => 'https://unsplash.it/1200/740/?random',
		) ),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'     => 'Card Image',
		'description' => 'This is a 300 x 200px image.',
		'function'    => "alcatraz_image( array( 'type' => 'url', 'src' => 'https://unsplash.it/300/200/?random' ) )",
		'output'      => alcatraz_image( array( 'type' => 'url', 'src' => 'https://unsplash.it/300/200/?random' ) ),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Category Image',
		'description'       => 'This is the category image. It may be used as a hero image for category archives, but more importantly serves as a fallback for post cards when no featured image is set.',
		'patterns_included' => '',
		'function'          => 'cf3_get_category_image()',
		'output'            => cf3_get_category_image( cf3_get_post_id() ),
		'params'            => array( '$post_id' => 'The ID of the post being queried.', '$image_size' => 'The image size to fetch' ),
		'args'              => array( '$post_id' => 'cf3_get_post_id()', '$image_size' => 'full' ),
	) ); ?>
</section>
