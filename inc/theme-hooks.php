<?php
/**
 * Theme Hooks
 *
 * @package carrieforde3
 */

add_action( 'alcatraz_after_patterns_atoms', 'cf3_append_theme_atoms' );
/**
 * Append theme atoms to template-patterns-atoms.php.
 */
function cf3_append_theme_atoms() {

	get_template_part( 'patterns/template-parts/atoms/category-badges' );
	get_template_part( 'patterns/template-parts/atoms/project-services' );
}

add_action( 'alcatraz_after_patterns_molecules', 'cf3_append_theme_molecules' );
/**
 * Append theme molecules to template-patterns-molecules.php.
 */
function cf3_append_theme_molecules() {

	get_template_part( 'patterns/template-parts/molecules/heroes' );
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

add_action( 'alcatraz_after_main_inside', 'cf3_hook_related_posts' );

function cf3_hook_related_posts() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	cf3_get_related_posts();
}
