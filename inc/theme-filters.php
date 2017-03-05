<?php
/**
 * Theme Filters.
 *
 * @package carrieforde3
 */

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

add_action( 'alcatraz_set_allowed_html', 'cf3_set_allowed_html' );
function cf3_set_allowed_html() {

	$allowed_tags = array_merge( wp_kses_allowed_html( 'post' ), array(
		'input' => array(
			'type'         => true,
			'name'         => true,
			'value'        => true,
			'placeholder'  => true,
			'required'     => true,
			'autocomplete' => true,
			'class'        => true,
		),
		'select' => array(
			'class' => true,
		),
		'optgroup' => array(
			'class' => true,
		),
		'option' => array(
			'class' => true,
		),
		'article' => array(
			'id' => true,
			'class' => true,
		),
		'svg' => array(
			'aria-hidden' => true,
			'class'       => true,
			'id'          => true,
			'role'        => true,
			'title'       => true,
		),
		'use' => array(
			'xlink:href' => true,
		),
		'path' => array(
			'd' => true,
		),
	) );

	return $allowed_tags;
}

add_filter( 'excerpt_more', 'cf3_excerpt_more' );
/**
 * Filter the excerpt more text.
 *
 * @return  string  The excerpt more text.
 */
function cf3_excerpt_more() {

	return '&hellip;';
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

add_filter( 'alcatraz_posted_on', 'cf3_posted_on' );
/**
 * Filter posted on output.
 *
 * @return  string  The post date markup.
 */
function cf3_posted_on() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	$post_id = get_the_ID();

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U', $post_id ) !== get_post_modified_time( 'U', false, $post_id ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c', $post_id ) ),
		esc_html( get_the_date( '', $post_id ) ),
		esc_attr( get_post_modified_time( 'c', false, $post_id ) ),
		esc_html( get_post_modified_time( '', false, $post_id ) )
	);

	$posted_on = sprintf( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );

	$output = '<span class="posted-on">' . $posted_on . '</span>';

	return $output;
}

add_filter( 'alcatraz_entry_footer_taxonomies', 'cf3_entry_footer_taxonomies' );

function cf3_entry_footer_taxonomies() {

	$footer_taxonomies = array(
		'post_tag' => __( 'Tagged: ', 'alcatraz' ),
	);

	return $footer_taxonomies;
}

add_filter( 'alcatraz_option_defaults', 'cf3_option_defaults' );
/**
 * Filter the default customizer options.
 *
 * @return  array  The customizer defaults.
 */
function cf3_option_defaults() {

	$defaults = array(
		'show_activation_notice'  => 1,
		'site_layout'             => 'full-width',
		'site_sidebar'            => 'right-sidebar',
		'sub_page_nav_in_sidebar' => 0,
		'header_style'            => 'default',
		'logo_id'                 => '',
		'mobile_logo_id'          => '',
		'logo_sticky'             => '',
		'footer_widget_areas'     => 3,
		'footer_bottom'           => '',
		'social_icons_in_footer'  => '',
	);
}