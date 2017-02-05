<?php
/**
 * Carrie Forde 3 custom template tags.
 *
 * @package carrieforde3
 */

/**
 * Get the first post category.
 *
 * @param   int    [$post_id      = 0] The post ID.
 * @return  string  The formatted category.
 */
function cf3_get_post_category( $post_id = 0 ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$category_args = array(
		'orderby' => 'name',
		'number'  => 1,
		'fields'  => 'all',
	);

	$category = wp_get_post_terms( $post_id, 'category', $category_args );

	if ( empty( $category) || is_wp_error( $category ) ) {
		return '';
	}

	$output = sprintf( '<span class="category"><a href="%s" rel="%s %s">%s</a></span>',
		get_term_link( $category[0]->term_id ),
		esc_attr( $category[0]->slug ),
		esc_attr( $category[0]->taxonomy ),
		esc_html( $category[0]->name )
	);

	return $output;
}
