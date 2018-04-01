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
		str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Fira+Mono|Fira+Sans:600,900|Montserrat:300,400' ),
		array(),
		CARRIEFORDE3_VERSION
	);

	// Typekit fonts.
	wp_enqueue_style(
		'carrieforde3-typekit-font',
		str_replace( ',', '%2C', '//use.typekit.net/jsi5beh.css' ),
		array(),
		CARRIEFORDE3_VERSION
	);

	// Include this theme's stylesheet.
	wp_enqueue_style(
		'carrieforde3-style',
		CARRIEFORDE3_URL . 'dist/main.css',
		array(),
		CARRIEFORDE3_VERSION
	);

	// Sticky JS.
	wp_enqueue_script(
		'sticky-js',
		CARRIEFORDE3_URL . 'src/assets/vendor/jquery.sticky.js',
		array( 'jquery' ),
		'1.0.4',
		true
	);

	wp_enqueue_script(
		'carrieforde3-scripts',
		CARRIEFORDE3_URL . 'dist/bundle.js',
		array( 'jquery', 'sticky-js' ),
		CARRIEFORDE3_VERSION,
		true
	);

	// Enqueue masonry.
	if ( is_home() || is_category() || is_tag() ) {
		wp_enqueue_script( 'carrieforde3-masonry' );
	}

	// Enqueue Prism.
	if ( is_singular( 'post' ) ) {
		wp_enqueue_style(
			'prism-css',
			CARRIEFORDE3_URL . 'src/assets/vendor/prism/prism.css',
			array(),
			CARRIEFORDE3_VERSION
		);

		wp_enqueue_script(
			'prism-js',
			CARRIEFORDE3_URL . 'src/assets/vendor/prism/prism.js',
			array( 'jquery' ),
			CARRIEFORDE3_VERSION,
			true
		);
	}

	// Translatable strings and other data for JS.
	$vars = array(
		'root_url' => home_url( '/' ),
	);

	wp_localize_script( 'carrieforde3-scripts', 'cf3_js_vars', $vars );
}

add_action( 'wp_footer', 'cf3_google_analytics' );
/**
 * Add Google Analytics Tracking.
 */
function cf3_google_analytics() {

	// Hook the Google Analytics code into the footer. ?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-45589015-1', 'auto');
		ga('send', 'pageview');
	</script>

	<?php
}
