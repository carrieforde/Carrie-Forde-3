<?php
/**
 * Queries
 */

/**
 * A simple query used to fetch posts with markup from a specified template part.
 *
 * @param   array  [$args = array()] The arguments.
 *
 * @return  string                   The HTML markup.
 */
function cf3_fetch_posts( $args = array() ) {

	$defaults = array(
		'category_name'   => '',
		'post_type'       => 'post',
		'posts_per_page'  => 1,
		'template_part'   => 'template-parts/content',
		'post__not_in'    => get_option( 'sticky_posts' ),
	);
	$args = wp_parse_args( $args, $defaults );

	$post = array(
		'category_name'       => esc_attr( $args['category_name'] ),
		'ignore_sticky_posts' => 1,
		'post_type'           => esc_attr( $args['post_type'] ),
		'posts_per_page'      => absint( $args['posts_per_page'] ),
		'post__not_in'        => array_map( 'esc_attr', $args['post__not_in'] ),
	);

	$posts = new WP_Query( $post );

	if ( $posts->have_posts() ) {

		ob_start();

		while ( $posts->have_posts() ) {

			$posts->the_post();

			get_template_part( $args['template_part'] );
		}
	}

	wp_reset_postdata();

	return ob_get_clean();
}

/**
 * Get a sticky post, or the latest post.
 *
 * @param   array  [$args = array()]  The args.
 * @return  string                    The HTML markup.
 */
function cf3_get_sticky_post( $args = array() ) {

	$defaults = array(
		'posts_per_page'      => 1,
		'post__in'            => get_option( 'sticky_posts' ),
		'ignore_sticky_posts' => 1,
		'template_part'       => 'template-parts/content',
	);
	$args = wp_parse_args( $args, $defaults );

	$post = array(
		'posts_per_page'      => absint( $args['posts_per_page'] ),
		'post__in'            => array_map( 'esc_attr', $args['post__in'] ),
		'ignore_sticky_posts' => absint( $args['ignore_sticky_posts'] ),
	);

	$posts = new WP_Query( $post );

	if ( $posts->have_posts() ) {

		ob_start();

		while ( $posts->have_posts() ) {
			$posts->the_post();

			get_template_part( $args['template_part'] );
		}
	}

	wp_reset_postdata();

	return ob_get_clean();
}

/**
 * Get a random (or specific) post ID or set of post IDs for use within the pattern library.
 *
 * @param   array [$args = array()] The WP_Query arguments.
 *
 * @return  int                     The queried post ID(s).
 */
function cf3_get_post_id( $args = array() ) {

	$defaults = array(
		'category_name'   => '',
		'orderby'         => 'rand',
		'post_type'       => 'post',
		'tag'             => '',
	);
	$args = wp_parse_args( $args, $defaults );

	$post = array(
		'category_name'   => esc_attr( $args['category_name'] ),
		'orderby'         => esc_attr( $args['orderby']),
		'post_type'       => esc_attr( $args['post_type'] ),
		'posts_per_page'  => 1,
		'tag'             => esc_attr( $args['tag'] ),
	);

	$posts = new WP_Query( $post );

	$post_id = 0;

	if ( $posts->have_posts() ) {

		while ( $posts->have_posts() ) {

			$posts->the_post();

			$post_id = get_the_ID();
		}
	}

	wp_reset_postdata();

	return $post_id;
}

/**
 * Get related posts.
 *
 * @param  int  [$post_id = 0]  The post ID.
 */
function cf3_get_related_posts( $post_id = 0 ) {

	if ( ! $post_id ) {

		$post_id = get_queried_object_id();
	}

	$tags = cf3_get_post_tags( $post_id );

	$related_post = array(
		'orderby'         => 'rand',
		'post__not_in'    => array( $post_id ),
		'posts_per_page'  => 3,
		'post_type'       => 'post',
		'tax_query' => array(
			array(
				'taxonomy' => 'post_tag',
				'field'    => 'slug',
				'terms'    => $tags,
			),
		),
	);

	$related_posts = new WP_Query( $related_post );

	if ( $related_posts->have_posts() ) :

		ob_start(); ?>

		<section class="related-posts">
			<header class="related-posts__header">
				<h2 class="related-posts__title"><?php esc_html_e( 'Related Posts', 'carrieforde3' ); ?></h2>
			</header>

			<div class="grid--one-two-three">

				<?php while ( $related_posts->have_posts() ) :

					$related_posts->the_post();

					get_template_part( 'template-parts/content-post-card' );

				endwhile; ?>

			</div>
		</section>

	<?php endif;

	wp_reset_postdata();

	return ob_get_clean();
}

/**
 * Echo the related posts.
 */
function cf3_the_related_posts() {

	echo cf3_get_related_posts();
}
