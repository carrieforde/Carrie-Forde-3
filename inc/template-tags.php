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

	return $category;
}

/**
 * Echo the post card category.
 */
function cf3_the_post_card_category() {

	$category = cf3_get_post_category();

	$cat_accent = get_term_meta( $category[0]->term_id, 'cat_color_accent', true );

	$output = sprintf( '<span class="post-card__category post-card__category--%s-bg"><a href="%s" rel="%s %s">%s</a></span>',
		esc_attr( $cat_accent ),
		get_term_link( $category[0]->term_id ),
		esc_attr( $category[0]->slug ),
		esc_attr( $category[0]->taxonomy ),
		esc_html( $category[0]->name )
	);

	echo $output;
}


/**
 * Get the accent color for the post category.
 *
 * @return  string  The accent color.
 */
function cf3_get_category_accent() {

	$category = cf3_get_post_category();

	$cat_accent = get_term_meta( $category[0]->term_id, 'cat_color_accent', true );

	return $cat_accent;
}
