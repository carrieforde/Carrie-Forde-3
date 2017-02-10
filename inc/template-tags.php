<?php
/**
 * Carrie Forde 3 custom template tags.
 *
 * @package carrieforde3
 */

/**
 * Get the terms associated with a post.
 * @param   int    [$post_id         = 0]    The post ID.
 * @param   string [$taxonomy        = '']  The taxonomy to query.
 * @param   array  [$args            = array()] Additional args to pass to wp_get_post_terms()
 * @return  array The terms.
 */

function cf3_get_post_terms( $post_id = 0, $taxonomy = '', $args = array() ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$defaults = array(
		'orderby' => 'name',
		'number'  => 0,
		'fields'  => 'all',
	);
	$args = wp_parse_args( $defaults, $args );

	$term_args = array(
		'orderby' => esc_attr( $args['orderby'] ),
		'number'  => esc_attr( $args['number'] ),
		'fields'  => esc_attr( $args['fields'] ),
	);

	$terms = wp_get_post_terms( $post_id, $taxonomy, $term_args );

	if ( empty( $terms ) || is_wp_error( $terms ) ) {
		return '';
	}

	return $terms;
}

/**
 * Echo the post card category.
 */
function cf3_get_post_card_category_badge( $post_id = 0 ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$category = cf3_get_post_terms( $post_id, 'category', array( 'number' => 1 ) );

	$cat_accent = get_term_meta( $category[0]->term_id, 'theme_colors', true );

	$output = sprintf( '<span class="category-badge category-badge--%s-bg"><a href="%s" rel="%s %s">%s</a></span>',
		esc_attr( $cat_accent ),
		get_term_link( $category[0]->term_id ),
		esc_attr( $category[0]->slug ),
		esc_attr( $category[0]->taxonomy ),
		esc_html( $category[0]->name )
	);

	return $output;
}

/**
 * Get the category image.
 *
 * @param  int    [$post_id              = 0]         The post ID.
 * @param  string [$image_size           = 'full'] The image size.
 *
 * @return string The image markup.
 */
function cf3_get_category_image( $post_id = 0, $image_size = 'full' ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$category = cf3_get_post_terms( $post_id, 'category', array( 'number' => 1) );

	$cat_image = get_term_meta( $category[0]->term_id, 'category_image', true );

	$output = wp_kses_post( wp_get_attachment_image( $cat_image, $image_size ) );

	return $output;
}


/**
 * Get the accent color for the post category.
 *
 * @return  string  The accent color.
 */
function cf3_get_category_accent( $post_id = 0 ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$category = cf3_get_post_terms( $post_id, 'category', array( 'number' => 1 ) );

	$cat_accent = get_term_meta( $category[0]->term_id, 'theme_colors', true );

	return $cat_accent;
}

/**
 * Get the portfolio terms (project services).
 *
 * @param   int     [$post_id = 0] Post ID.
 *
 * @return  string                 The terms.
 */
function cf3_get_portfolio_terms( $post_id = 0 ) {

	if ( ! $post_id ) {

		$post_id = get_the_ID();
	}

	$terms = cf3_get_post_terms( $post_id, 'cf-project-services' );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

		$project_terms = array();

		foreach ( $terms as $term ) {

			$project_terms[] = sprintf( '<span class="project-service">%s</span>',
				esc_html( $term->name )
			);
		}

		$project_terms = implode( ', ', $project_terms );

		return $project_terms;
	}
}

function cf3_get_post_tags( $post_id = 0 ) {

	if ( ! $post_id ) {

		$post_id = get_the_ID();
	}

	$terms = cf3_get_post_terms( $post_id, 'post_tag' );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

		$tags = array();

		foreach ( $terms as $term ) {

			$tags[] = esc_attr( $term->slug );
		}

//		$tags = implode( ',', $tags );

		return $tags;
	}
}

/**
 * Get the post hero pattern.
 *
 * @param   int     [$post_id      = 0]  The post ID.
 * @return  string                       The hero markup.
 */
function cf3_get_post_hero( $post_id = 0 ) {

	if ( ! $post_id ) {

		$post_id = get_the_ID();
	}

	ob_start(); ?>

	<section class="hero post-hero">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail(); ?>
		<?php else: ?>
			<?php echo cf3_get_category_image( $post_id ); ?>
		<?php endif; ?>
		<?php echo cf3_get_post_card_category_badge( $post_id ); ?>
	</section>

	<?php return ob_get_clean();
}

/**
 * Echo the post hero.
 *
 * @param  int  [$post_id = 0]  The post ID.
 */
function cf3_the_post_hero( $post_id = 0 ) {

	echo cf3_get_post_hero( $post_id ); // WPCS: XSS OK.
}
