<?php
/**
 * Theme Hooks
 *
 * @package carrieforde3
 */

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
			background-image: url( <?php echo CARRIEFORDE3_URL . 'src/assets/images/carrie-forde-logo_white.svg'; ?> );
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

add_action( 'alcatraz_after_header', 'cf3_hook_acf_hero' );
/**
 * Hook the Homepage hero.
 */
function cf3_hook_acf_hero() {

	if ( ! is_front_page() ) {
		return;
	}

	get_template_part( 'template-parts/components/component', 'image_hero' );
}

add_action( 'alcatraz_after_header', 'cf3_hook_archive_hero' );
/**
 * Hook the portfolio hero.
 */
function cf3_hook_archive_hero() {

	if ( ! ( is_archive( 'cf-portfolio' ) || is_category() )  ) {
		return;
	}

	cf3_archive_hero();
}

add_action( 'alcatraz_after_header', 'cf3_hook_post_hero' );
/**
 * Hook the post hero.
 */
function cf3_hook_post_hero() {

	if ( ! ( is_singular( 'post' ) || is_page() || is_home() ) || is_front_page() ) {
		return;
	}

	cf3_the_post_hero();
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

add_action( 'alcatraz_after_primary_nav', 'cf3_hook_navigation_search' );

function cf3_hook_navigation_search() {

	cf3_the_navigation_search();
}

add_action( 'customize_register', 'cf3_customize_register', 20 );
/**
 * Remove and add customizer controls.
 *
 * @param  object  The $wp_customize object.
 */
function cf3_customize_register( $wp_customize ) {

	$option_defaults = alcatraz_get_option_defaults();

	// Remove CSS
	$wp_customize->remove_section( 'custom_css' );

	// Remove page banner.
	$wp_customize->remove_control( 'alcatraz_page_banner_widget_area_control' );

	// Sticky logo.
	$wp_customize->add_setting(
		'alcatraz_options[logo_sticky_id]',
		array(
			'default'     => $option_defaults['logo_sticky_id'],
			'type'        => 'option',
			'capability'  => 'edit_theme_options',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Media_Control( $wp_customize, 'alcatraz_logo_sticky',
			array(
				'label'    => __( 'Sticky Logo', 'carrieforde3' ),
				'section'  => 'alcatraz_header_section',
				'settings' => 'alcatraz_options[logo_sticky_id]',
			)
		)
	);
}

/**
 * Update the Alcatraz options.
 *
 * @param   array  $input  The options to update.
 *
 * @return  array          The updated options.
 */
function cf3_validate_new_options( $input ) {

	// Call Alcatraz's validation function.
	alcatraz_validate_options();

	// Update this theme's options.
	if ( isset( $input['logo_sticky_id'] ) ) {
		$options['logo_sticky_id'] = alcatraz_empty_or_int( $input['logo_sticky_id'] );
	}

	return $options;
}

add_filter( 'upload_mimes', 'cf3_mime_types' );
/**
 * Allow SVG upload
 *
 * @author  Carrie Forde
 *
 * @param   array  $mimes  The allowed mime type.
 * @return  array          The array of mime types.
 */
function cf3_mime_types( $mimes ) {

	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_action( 'alcatraz_header', 'cf3_output_logo', 1 );
/**
 * Output the site logo.
 *
 * @since  1.0.0
 */
function cf3_output_logo() {

	$options = get_option( 'alcatraz_options' );

	// Remove the Alcatraz defaults.
	remove_action( 'alcatraz_header', 'alcatraz_output_logo' );

	if ( ! empty( $options['logo_sticky_id'] ) ) {

		// Build the wrapper classes.
		$classes = 'logo-wrap';
		if ( has_custom_logo() ) {
			$classes .= ' has-logo';
		}
		if ( ! empty( $options['logo_sticky_id'] ) ) {
			$classes .= ' has-sticky-logo';
		}

		// Start the markup. 🎉 ?>
		<div class="<?php echo esc_attr( $classes ); ?>">

			<?php the_custom_logo(); ?>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

				<?php echo ( ! empty( $options['logo_sticky_id'] ) ) ? wp_get_attachment_image( $options['logo_sticky_id'], 'full', '', array( 'class' => 'logo logo-sticky' ) ) : ''; ?>
			</a>
		</div>

		<?php
	}
}

add_action( 'alcatraz_after_nav_inside', 'cf3_display_search_form' );
/**
 * Display the search form.
 */
function cf3_display_search_form() {

	get_search_form();
}

add_filter( 'body_class', 'cf3_body_classes' );
/**
 * Add custom body classes.
 *
 * @since   1.0.0
 *
 * @param   array  $classes  Classes for the body element.
 * @return  array
 */
function cf3_body_classes( $classes ) {

	if ( is_archive() || is_home() ) {
		$classes[] = 'background-white-smoke';
	}

	return $classes;
}

add_action( 'admin_init', 'cf3_add_editor_styles' );
/**
 * Include our theme CSS in the TinyMCE editor.
 *
 * @since  1.0.0
 */
function cf3_add_editor_styles() {

	add_editor_style( str_replace( ',', '%2C', '//use.typekit.net/jsi5beh.css' ) );
	add_editor_style( str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Fira+Mono|Fira+Sans:600,900|Montserrat:300,400' ) );
	add_editor_style( get_stylesheet_uri() );
}

// add_action( 'rest_api_init', 'cf3_add_post_meta' );

// function cf3_add_post_meta() {

// 	register_rest_field( 'post', 'category_color', array(
// 		'get_callback' => 'cf3_get_category_accent',
// 	));
// }
