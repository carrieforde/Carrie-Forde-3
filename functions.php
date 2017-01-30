<?php
/**
 * Carrie Forde 3 functions and definitions.
 */

define( 'CARRIEFORDE3_VERSION', '1.0.0' );
define( 'CARRIEFORDE3_PATH', trailingslashit( get_stylesheet_directory() ) );
define( 'CARRIEFORDE3_URL', trailingslashit( get_stylesheet_directory_uri() ) );

add_action( 'wp_enqueue_scripts', 'carrieforde3_enqueue_scripts', 15 );
/**
 * Enqueue scripts and stylesheets.
 */
function carrieforde3_enqueue_scripts() {

	// Google fonts.
	wp_enqueue_style(
		'carrieforde3-google-fonts',
		str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Assistant:300,700|Source+Code+Pro:300' ),
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

add_action( 'wp_head', 'carrieforde3_typekit' );
/**
 * Load Typekit inline JavaScript in head.
 */
function carrieforde3_typekit() {

	echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
}

add_filter( 'alcatraz_set_colors', 'carrieforde3_set_colors' );
/**
 * Set the brand colors.
 */
function carrieforde3_set_colors() {

	$colors = array(
		'Brand Colors'  => array(
			'pink-cloud'   => 'linear-gradient(to top right, rgba(237, 28, 114, 0.85) 25%, rgba(234, 197, 222, 0.85))',
			'razzmatazz'   => '#ed1c72',
			'classic-rose' => '#eac5de',
			'charcoal'     => '#424143',
			'french-gray'  => '#bdbec0',
		),
		'Accent Colors' => array(
			'west-side'     => '#f79811',
			'sinopia'       => '#d63e0f',
			'dark-violet'   => '#900ad6',
			'blue'          => '#0d10f7',
			'electric-lime' => '#1ced26',
		),
	);

	return $colors;
}

add_filter( 'alcatraz_set_fonts', 'carrieforde3_set_fonts' );
/**
 * Set the brand fonts.
 */
function carrieforde3_set_fonts() {

	$fonts = array(
		'freight-display-pro' => '\'FreightDisp Pro\', freight-display-pro, serif',
		'assistant' => '\'Assistant\', sans-serif',
		'source-code-pro' => '\'Source Code Pro\', monospace',
	);

	return $fonts;
}
