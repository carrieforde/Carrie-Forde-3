<?php
/**
 * Carrie Forde 3 functions and definitions.
 */

define( 'CARRIEFORDE3_VERSION', '1.0.0' );
define( 'CARRIEFORDE3_PATH', trailingslashit( get_stylesheet_directory() ) );
define( 'CARRIEFORDE3_URL', trailingslashit( get_stylesheet_directory_uri() ) );

add_filter( 'alcatraz_option_defaults', 'cf3_option_defaults' );
function cf3_option_defaults() {

	$defaults = array(
		'show_activation_notice'  => 1,
		'site_layout'             => 'full-width',
		'site_sidebar'             => 'right-sidebar',
		'page_banner_widget_area' => 0,
		'sub_page_nav_in_sidebar' => 0,
		'header_style'            => 'default',
		'mobile_nav_toggle_style' => 'hamburger',
		'mobile_nav_style'        => 'default',
		'sub_menu_toggle_style'   => 'chevron',
		'logo_id'                 => '',
		'mobile_logo_id'          => '',
		'logo_sticky'             => '',
		'footer_widget_areas'     => 3,
		'footer_bottom'           => '',
		'social_icons_in_footer'  => '',
	);
}

add_action( 'customize_register', 'cf3_customize_register', 20 );
function cf3_customize_register( $wp_customize ) {

	$option_defaults = alcatraz_get_option_defaults();

	// Remove CSS
	$wp_customize->remove_section( 'custom_css' );

	// Remove page banner.
	$wp_customize->remove_control( 'alcatraz_page_banner_widget_area_control' );

	// Remove menu options section.
	$wp_customize->remove_control( 'alcatraz_menu_options_section' );

	// Sticky logo.
	$wp_customize->add_setting(
		'alcatraz_options[logo_sticky]',
		array(
			'default'     => $option_defaults['logo_sticky'],
			'type'        => 'option',
			'capability'  => 'edit_theme_options',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Media_Control( $wp_customize, 'alcatraz_logo_sticky', array(
				'label'    => __( 'Sticky Logo', 'carrieforde3' ),
				'section'  => 'alcatraz_header_section',
				'settings' => 'alcatraz_options[logo_sticky]',
			)
		)
	);
}

/**
 * Add theme image sizes.
 */
add_image_size( 'card-image', 1040, 690, true );


require_once CARRIEFORDE3_PATH . '/inc/acf.php';

require_once CARRIEFORDE3_PATH . '/inc/queries.php';

require_once CARRIEFORDE3_PATH . '/inc/scripts.php';

require_once CARRIEFORDE3_PATH . '/inc/template-tags.php';

require_once CARRIEFORDE3_PATH . '/inc/theme-filters.php';

require_once CARRIEFORDE3_PATH . '/inc/theme-hooks.php';
