<?php
/**
 * Theme Hooks
 *
 * @package carrieforde3
 */

add_action( 'alcatraz_after_patterns', 'cf3_append_theme_patterns' );
/**
 * Append theme atoms to template-patterns-atoms.php.
 */
function cf3_append_theme_patterns() {

	// Bail early if we're not looking at a pattern.
	if ( ! is_singular( 'alcatraz_patterns' ) ) {
		return;
	}

	// Append Atoms.
	if ( is_page_template( 'template-patterns-atoms.php' ) ) {

		get_template_part( 'patterns/template-parts/atoms/category-badges' );
		get_template_part( 'patterns/template-parts/atoms/project-services' );
	}

	// Append Molecules.
	if ( is_page_template( 'template-patterns-molecules.php' ) ) {

		get_template_part( 'patterns/template-parts/molecules/heroes' );
	}

	// Append Organisms.
	if ( is_page_template( 'template-patterns-organisms.php' ) ) {

		get_template_part( 'patterns/template-parts/organisms/card-section' );
	}
}

add_action( 'login_enqueue_scripts', 'cf3_custom_login_screen' );
/**
 * Customize the login screen styles.
 */
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
	<?php
}

add_action( 'alcatraz_after_header', 'cf3_hook_post_hero' );
/**
 * Hook the post hero.
 */
function cf3_hook_post_hero() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	cf3_the_post_hero();
}

add_action( 'alcatraz_after_header', 'cf3_hook_homepage_hero' );
/**
 * Hook the Homepage hero.
 */
function cf3_hook_homepage_hero() {

	if ( ! is_front_page() ) {
		return;
	}

	cf3_the_acf_hero();
}

add_action( 'alcatraz_after_main_inside', 'cf3_hook_related_posts' );
/**
 * Hook the related posts.
 */
function cf3_hook_related_posts() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	cf3_the_related_posts();
}

add_action( 'alcatraz_entry_footer_inside', 'cf3_hook_post_footnotes', 9 );
/**
 * Hook the post footnotes.
 */
function cf3_hook_post_footnotes() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	cf3_the_post_footnotes();
}

add_action( 'alcatraz_after_header', 'cf3_hook_portfolio_hero' );
/**
 * Hook the portfolio hero.
 */
function cf3_hook_portfolio_hero() {

	if ( ! is_singular( 'cf-portfolio' ) ) {
		return;
	}

	cf3_the_portfolio_hero();
}
