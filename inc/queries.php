<?php
/**
 * Queries
 */

function cf3_fetch_posts( $args = array() ) {

	$defaults = array(
		'category_name'   => '',
		'post_type'       => 'post',
		'posts_per_page'  => 1,
		'template_part'   => 'template-parts/content',
	);
	$args = wp_parse_args( $args, $defaults );

	$post = array(
		'category_name'   => esc_attr( $args['category_name'] ),
		'post_type'       => esc_attr( $args['post_type'] ),
		'posts_per_page'  => absint( $args['posts_per_page'] ),
	);

	$posts = new WP_Query( $post );

	if ( $posts->have_posts() ) {

		ob_start();

		while ( $posts->have_posts() ) {

			$posts->the_post();

			get_template_part( $args['template_part'] );
		}
	}

	wp_reset_postdata();

	return ob_get_clean();
}
