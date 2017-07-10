<?php
/**
 * Theme Filters.
 *
 * @package carrieforde3
 */

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
		'page',
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
/**
 * Returns the footer taxonomies.
 *
 * @return  array  The taxonomies to be included.
 */
function cf3_entry_footer_taxonomies() {

	$footer_taxonomies = array(
		'post_tag' => '<span class="screen-reader-text">Tagged:</span>',
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
		'logo_sticky'             => '',
		'footer_widget_areas'     => 3,
		'footer_bottom'           => '',
		'social_icons_in_footer'  => '',
	);
}
