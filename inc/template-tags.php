<?php
/**
 * Carrie Forde 3 custom template tags.
 *
 * @package carrieforde3
 */

/**
 * Get the terms associated with a post.
 *
 * @param   int    [$post_id  = 0]        The post ID.
 * @param   string [$taxonomy = '']       The taxonomy to query.
 * @param   array  [$args     = array()]  Additional args to pass to wp_get_post_terms()
 * @return  array                         The terms.
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
 * Build the post card category.
 *
 * @param   int     The post ID.
 * @return  string  The category badge markup.
 */
function cf3_get_post_card_category_badge( $post_id = 0 ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$category = cf3_get_post_terms( $post_id, 'category', array( 'number' => 1 ) );

	$cat_accent = get_term_meta( $category[0]->term_id, 'theme_colors', true );

	$output = sprintf( '<span class="category-badge background-%s"><a href="%s" rel="%s %s">%s</a></span>',
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
 * @param  int    [$post_id    = 0]       The post ID.
 * @param  string [$image_size = 'full']  The image size.
 *
 * @return string The image markup.
 */
function cf3_get_category_image( $post_id = 0, $image_size = 'full' ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$category = cf3_get_post_terms( $post_id, 'category', array( 'number' => 1 ) );

	if ( empty( $category ) ) {
		return;
	}

	$cat_image = get_term_meta( $category[0]->term_id, 'category_image', true );

	return $cat_image;
}

/**
 * Get the accent color for the post category.
 *
 * @param   int     The post ID.
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

/**
 * Build the list of post tags.
 *
 * @param   int     The post ID.
 * @return  string  The post tags.
 */
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

		if ( is_home() ) {
			$post_id = get_option( 'page_for_posts' );
		} else {
			$post_id = get_the_ID();
		}
	}

	if ( has_post_thumbnail( $post_id ) ) {
		$image = get_the_post_thumbnail_url( $post_id, 'hero-image' );
	} else {
		$image = wp_get_attachment_url( cf3_get_category_image( $post_id, 'hero-image' ) );
	}

	if ( empty( $image ) ) {
		return;
	}

	ob_start(); ?>

	<section class="hero post-hero image-as-background" style="background-image: url( <?php echo esc_url( $image ); ?> );">
		<?php if ( is_singular( 'post' ) ) : ?>
			<?php echo cf3_get_post_card_category_badge( $post_id ); ?>
		<?php endif; ?>
	</section>

	<?php return ob_get_clean();
}


/**
 * Displays a hero image on an archive.
 */
function cf3_archive_hero() {

	// Bail if we're not on an archive or category archive.
	if ( ! is_archive() ) {
		return;
	}

	// Get the image ID.
	if ( is_category() ) {
		$category = get_the_category();
		$image    = get_term_meta( $category[0]->term_id, 'category_image', true );
	} else {
		$image = get_option( 'options_archive_hero' );
	}

	// Get attachment URL for background usage.
	$image = wp_get_attachment_url( $image, 'hero-image' );

	if ( empty( $image ) ) {
		return;
	} ?>

	<section class="hero archive-hero image-as-background" style="background-image: url( '<?php echo esc_url( $image ); ?>' );"></section>
	<?php
}

/**
 * Echo the post hero.
 *
 * @param  int  [$post_id = 0]  The post ID.
 */
function cf3_the_post_hero( $post_id = 0 ) {

	echo cf3_get_post_hero( $post_id ); // WPCS: XSS OK.
}


/**
 * Get the portfolio hero.
 *
 * @param   int     The post ID.
 * @return  string  The hero markup.
 */
function cf3_get_portfolio_hero( $post_id = 0 ) {

	if ( ! $post_id ) {

		$post_id = get_the_ID();
	}

	ob_start(); ?>

	<section class="hero post-hero post-hero--portfolio">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>
	</section>

	<?php return ob_get_clean();
}

/**
 * Echo the portfolio hero.
 */
function cf3_the_portfolio_hero( $post_id = 0 ) {

	echo cf3_get_portfolio_hero( $post_id ); // WPCS: XSS OK.
}

/**
 * Determine the post type to print in the post navigation.
 *
 * @return  string  The post type.
 */
function cf3_post_type_for_pagination( $post_id = 0 ) {

	if ( ! $post_id ) {

		$post_id = get_the_ID();
	}

	switch ( get_post_type() ) {

		case 'post' :
			return 'Post';
			break;
		case 'cf-portfolio' :
			return 'Project';
			break;
		case 'wpcl-component' :
			return 'Component';
			break;
		default :
			return '';
			break;
	}
}

/**
 * Build and return the navigation search.
 *
 * @return  string  The navigation search HTML.
 */
function cf3_get_navigation_search() {

	ob_start(); ?>

	<div class="navigation-search"><?php get_search_form(); ?></div>

	<?php return ob_get_clean();
}

/**
 * Echo the navigation search.
 */
function cf3_the_navigation_search() {

	echo cf3_get_navigation_search(); // WPCS: XSS OK.
}
