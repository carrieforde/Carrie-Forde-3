<?php
/**
 * Carrie Forde 3 functions and definitions.
 */

define( 'CARRIEFORDE3_VERSION', '1.0.0' );
define( 'CARRIEFORDE3_PATH', trailingslashit( get_stylesheet_directory() ) );
define( 'CARRIEFORDE3_URL', trailingslashit( get_stylesheet_directory_uri() ) );


require_once CARRIEFORDE3_PATH . '/inc/acf.php';

require_once CARRIEFORDE3_PATH . '/inc/queries.php';

require_once CARRIEFORDE3_PATH . '/inc/scripts.php';

require_once CARRIEFORDE3_PATH . '/inc/template-tags.php';

require_once CARRIEFORDE3_PATH . '/inc/theme-filters.php';

require_once CARRIEFORDE3_PATH . '/inc/theme-hooks.php';
