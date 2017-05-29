<?php
/**
 * Carrie Forde 3 scripts.
 */

add_action( 'wp_enqueue_scripts', 'cf3_enqueue_scripts', 15 );
/**
 * Enqueue scripts and stylesheets.
 */
function cf3_enqueue_scripts() {

	// Google fonts.
	wp_enqueue_style(
		'carrieforde3-google-fonts',
		str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Fira+Mono|Fira+Sans:600,900' ),
		array(),
		CARRIEFORDE3_VERSION
	);

	// Typekit font.
	wp_enqueue_script(
		'carrieforde3-typekit-font',
		'//use.typekit.net/jsi5beh.js',
		array(),
		'1.0.1'
	);

	// Include this theme's stylesheet.
	wp_enqueue_style(
		'carrieforde3-style',
		CARRIEFORDE3_URL . 'style.css',
		array(),
		CARRIEFORDE3_VERSION
	);

	// Sticky JS.
	wp_enqueue_script(
		'sticky-js',
		CARRIEFORDE3_URL . 'js/jquery.sticky.js',
		array( 'jquery' ),
		'1.0.4',
		true
	);

	// Include this theme's JS.
	wp_enqueue_script(
		'carrieforde3-scripts',
		CARRIEFORDE3_URL . 'js/carrieforde3-theme.min.js',
		array( 'jquery', 'sticky-js' ),
		CARRIEFORDE3_VERSION,
		true
	);

	// Post masonry.
	wp_register_script(
		'carrieforde3-masonry',
		CARRIEFORDE3_URL . 'js/card-masonry.js',
		array( 'jquery', 'jquery-masonry' ),
		CARRIEFORDE3_VERSION,
		true
	);

	// Enqueu masonry.
	if ( is_home() ) {
		wp_enqueue_script( 'carrieforde3-masonry' );
	}
}

add_action( 'wp_head', 'cf3_typekit' );
/**
 * Load Typekit inline JavaScript in head.
 *
 * @author Carrie Forde
 */
function cf3_typekit() {

	echo '<script type="text/javascript">try{Typekit.load({ async: true });}catch(e){}</script>';
}
