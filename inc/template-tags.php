<?php
/**
 * Carrie Forde 3 custom template tags.
 *
 * @package carrie-forde3
 */

function cf3_get_post_categories() {

	$categories = get_the_category_list();

	printf( '<span class="cat-links">%s</span>', wp_kses_post( $categories ) );
}
