<?php
/**
 * Theme Hooks
 *
 * @package carrieforde3
 */

add_action( 'alcatraz_after_header', 'cf3_hook_post_hero' );

function cf3_hook_post_hero() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	cf3_the_post_hero();
}
