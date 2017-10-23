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
		CARRIEFORDE3_URL . 'style.min.css',
		array( 'prism-css' ),
		CARRIEFORDE3_VERSION
	);

	// Sticky JS.
	wp_enqueue_script(
		'sticky-js',
		CARRIEFORDE3_URL . 'assets/vendor/jquery.sticky.js',
		array( 'jquery' ),
		'1.0.4',
		true
	);

	// Include this theme's JS.
	wp_enqueue_script(
		'carrieforde3-scripts',
		CARRIEFORDE3_URL . 'assets/js/carrieforde3-theme.min.js',
		array( 'jquery', 'sticky-js', 'prism-js' ),
		CARRIEFORDE3_VERSION,
		true
	);

	// Post masonry.
	wp_register_script(
		'carrieforde3-masonry',
		CARRIEFORDE3_URL . 'assets/js/card-masonry.js',
		array( 'jquery', 'jquery-masonry' ),
		CARRIEFORDE3_VERSION,
		true
	);

	// Enqueue masonry.
	if ( is_home() || is_category() || is_tag() ) {
		wp_enqueue_script( 'carrieforde3-masonry' );
	}

	// Enqueue Prism.
	if ( is_singular( 'post' ) ) {
		wp_register_style(
			'prism-css',
			CARRIEFORDE3_URL . 'assets/vendor/prism/prism.css',
			array(),
			CARRIEFORDE3_VERSION
		);

		wp_register_script(
			'prism-js',
			CARRIEFORDE3_URL . 'assets/vendor/prism/prism.js',
			array( 'jquery' ),
			CARRIEFORDE3_VERSION,
			true
		);
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
