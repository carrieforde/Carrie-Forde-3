<?php
/**
 * Carrie Forde 3 custom template tags.
 *
 * @package carrieforde3
 */

/**
 * Get the post categories and output them in a span.
 *
 * @author Carrie Forde
 */
function cf3_get_post_categories() {

	$categories = get_the_category_list();

	printf( '<span class="cat-links">%s</span>', wp_kses_post( $categories ) );
}
