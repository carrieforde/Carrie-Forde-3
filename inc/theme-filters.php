<?php
/**
 * Theme Filters.
 *
 * @package carrieforde3
 */

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
