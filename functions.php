<?php
/**
 * Carrie Forde 3 functions and definitions.
 */

define( 'CARRIEFORDE3_VERSION', '1.0.0' );
define( 'CARRIEFORDE3_PATH', trailingslashit( get_stylesheet_directory() ) );
define( 'CARRIEFORDE3_URL', trailingslashit( get_stylesheet_directory_uri() ) );

/**
 * Add theme image sizes.
 */
add_image_size( 'card-image', 1040, 690, true );

add_image_size( 'hero-image', 1920, 500, true );


/**
 * Adds Portfolio Archive Settings page.
 */
if( function_exists('acf_add_options_page') ) {

	// Add subpage to Portfolio Menu.
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Portfolio Settings',
		'menu_title' 	=> 'Portfolio Settings',
		'parent_slug' 	=> '/edit.php?post_type=cf-portfolio',
	));
}


require_once CARRIEFORDE3_PATH . '/inc/acf.php';

require_once CARRIEFORDE3_PATH . '/inc/queries.php';

require_once CARRIEFORDE3_PATH . '/inc/scripts.php';

require_once CARRIEFORDE3_PATH . '/inc/template-tags.php';

require_once CARRIEFORDE3_PATH . '/inc/theme-filters.php';

require_once CARRIEFORDE3_PATH . '/inc/theme-hooks.php';
