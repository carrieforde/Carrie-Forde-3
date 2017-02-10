<?php
/**
 * Carrie Forde 3 functions and definitions.
 */

define( 'CARRIEFORDE3_VERSION', '1.0.0' );
define( 'CARRIEFORDE3_PATH', trailingslashit( get_stylesheet_directory() ) );
define( 'CARRIEFORDE3_URL', trailingslashit( get_stylesheet_directory_uri() ) );

add_action( 'wp_enqueue_scripts', 'cf3_enqueue_scripts', 15 );
/**
 * Enqueue scripts and stylesheets.
 */
function cf3_enqueue_scripts() {

	// Google fonts.
	wp_enqueue_style(
		'carrieforde3-google-fonts',
		str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Assistant:300,600|Inconsolata' ),
		array(),
		CARRIEFORDE3_VERSION
	);

	// Typekit font.
	wp_enqueue_script(
		'carrieforde3-typekit-font',
		'//use.typekit.net/jsi5beh.js',
		array(),
		CARRIEFORDE3_VERSION
	);

	// Include this theme's stylesheet.
	wp_enqueue_style(
		'carrieforde3-style',
		CARRIEFORDE3_URL . 'style.css',
		array(),
		CARRIEFORDE3_VERSION
	);

	// Include this theme's JS.
	wp_enqueue_script(
		'carrieforde3-scripts',
		CARRIEFORDE3_URL . 'js/carrieforde3-theme.min.js',
		array( 'jquery' ),
		CARRIEFORDE3_VERSION
	);
}

add_action( 'wp_head', 'cf3_typekit' );
/**
 * Load Typekit inline JavaScript in head.
 *
 * @author Carrie Forde
 */
function cf3_typekit() {

	echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
}

add_filter( 'alcatraz_post_types', 'cf3_allowed_post_types' );
/**
 * Filter which on which pages the Post Options metabox shows.
 *
 * @author Carrie Forde
 *
 * @return  array  The post types.
 */
function cf3_allowed_post_types() {

	$post_type = array(
		'alcatraz_patterns',
		'page',
		'style-tile',
	);

	return $post_type;
}

add_filter( 'alcatraz_set_colors', 'cf3_set_colors' );
/**
 * Set the brand colors.
 *
 * @author Carrie Forde
 *
 * @return  array  The brand colors.
 */
function cf3_set_colors() {

	$colors = array(
		'Brand Colors'   => array(
			'pink-cloud'   => 'linear-gradient(to top right, rgba(237, 28, 114, 0.85) 25%, rgba(234, 197, 222, 0.85))',
			'razzmatazz'   => '#ed1c72',
			'classic-rose' => '#eac5de',
			'charcoal'     => '#424143',
			'french-gray'  => '#bdbec0',
		),
		'Neutral Colors' => array(
			'mine-shaft' => '#323132',
			'dim-gray'   => '#686769',
			'oslo-gray'  => '#8d8b8f',
			'iron'       => '#d9d5dc',
		),
		'Accent Colors'  => array(
			'tree-poppy'   => '#ff951e',
			'curious-blue' => '#219bd0',
			'lawn-green'   => '#85f200',
		),
	);

	return $colors;
}

add_action( 'alcatraz_after_patterns_atoms', 'cf3_append_theme_atoms' );

function cf3_append_theme_atoms() {

	get_template_part( 'patterns/template-parts/atoms/category-badges' );
	get_template_part( 'patterns/template-parts/atoms/project-services' );
}

add_action( 'alcatraz_after_patterns_molecules', 'cf3_append_theme_molecules' );

function cf3_append_theme_molecules() {

	get_template_part( 'patterns/template-parts/molecules/heroes' );
}

add_filter( 'alcatraz_set_fonts', 'cf3_set_fonts' );
/**
 * Set the brand fonts.
 *
 * @author Carrie Forde
 *
 * @return  array  The fonts.
 */
function cf3_set_fonts() {

	$fonts = array(
		'freight-display-pro' => '\'FreightDisp Pro\', freight-display-pro, serif',
		'assistant' => '\'Assistant\', sans-serif',
		'inconsolata' => '\'Inconsolata\', monospace',
	);

	return $fonts;
}

add_filter( 'excerpt_more', 'cf3_excerpt_more' );

function cf3_excerpt_more() {

	return '&hellip;';
}

add_action( 'login_enqueue_scripts', 'cf3_custom_login_screen' );
function cf3_custom_login_screen() { ?>

	<style type="text/css">
		.login {
			align-items: center;
			background: linear-gradient(to top right, rgba(237, 28, 114, 0.85) 25%, rgba(234, 197, 222, 0.85));
			display: flex;
			flex-direction: column;
			height: 100vh;
			justify-content: center;
		}

		#login {
			padding: 0 !important;
		}

		#login h1 a,
		.login h1 a {
			background-image: url( <?php echo CARRIEFORDE3_URL . '/images/carrie-forde-logo_white.svg'; ?> );
			background-size: contain;
			height: 150px;
			width: 200px;
		}

		.login #nav a,
		#login #nav a,
		.login #backtoblog a,
		#login #backtoblog a {
			color: #fff;
		}

		.login #nav a:hover,
		#login #nav a:hover,
		.login #backtoblog a:hover,
		#login #backtoblog a:hover {
			color: #ccc;
		}
	</style>
<?php }

require_once CARRIEFORDE3_PATH . '/inc/acf.php';

require_once CARRIEFORDE3_PATH . '/inc/queries.php';

require_once CARRIEFORDE3_PATH . '/inc/template-tags.php';

require_once CARRIEFORDE3_PATH . '/inc/theme-filters.php';

require_once CARRIEFORDE3_PATH . '/inc/theme-hooks.php';
