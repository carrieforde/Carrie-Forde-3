<?php
/**
 * ACF - get meta.
 */



/**
 * Echo the ACF homepage hero.
 */
function cf3_the_acf_hero( $post_id = 0 ) {

	get_template_part( 'template-parts/acf-content/acf', 'hero' );
}

/**
 * Build the footnotes markup.
 *
 * @author Carrie Forde
 * @return  string  The markup.
 */
function cf3_get_post_footnotes( $post_id = 0 ) {

	// Bail early if we're not on a single post.
	if ( ! is_singular( 'post' ) ) {
		return;
	}

	// Get the post ID if one wasn't passed.
	if ( ! $post_id ) {

		$post_id = get_the_id();
	}

	// Get the meta.
	$footnotes = get_post_meta( $post_id, 'footnotes', true );

	if ( $footnotes ) :

	ob_start(); ?>

		<div class="footnotes">

			<h2 class="footnotes__heading h4"><?php esc_html_e( 'Footnotes', 'carrieforde' ); ?></h2>

			<ol class="footnotes__list">

			<?php for ( $i = 0; $i < $footnotes; $i++ ) :

				$footnote = get_post_meta( $post_id, 'footnotes_' . $i . '_footnote', true ); ?>

				<li id="<?php echo esc_attr( $i + 1 ); ?>" class="footnotes__list-item"><?php echo wp_kses_post( $footnote ); ?></li>
			<?php endfor; ?>
			</ol>
		</div>
	<?php endif;

	return ob_get_clean();
}

/**
 * Echo the post footnotes.
 * @author Carrie Forde
 */
function cf3_the_post_footnotes( $post_id = 0 ) {

	echo cf3_get_post_footnotes( $post_id );
}

/**
 * Build and return the Portfolio meta.
 *
 * @param   int  The post ID.
 * @return  string  The Portfolio meta markup.
 */
function cf3_get_portfolio_meta( $post_id = 0 ) {

	// Bail if we're not on the single portfolio.
	if ( ! is_singular( 'cf-portfolio' ) ) {
		return;
	}

	// Get the post id if one wasn't passed.
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$designer_name = get_post_meta( $post_id, 'designer_name', true );
	$designer_url  = get_post_meta( $post_id, 'designer_url', true );
	$project_url   = get_post_meta( $post_id, 'project_url', true );

	ob_start(); ?>

	<aside class="portfolio-meta">
		<div class="portfolio-meta__services">
			<h3 class="portfolio-meta__heading"><?php esc_html_e( 'Services', 'carrieforde3' ); ?></h3>
			<p class="portfolio-meta__terms"><?php the_terms( $post_id, 'cf-project-services', '', ', ', '' ); ?></p>
		</div>

		<?php if ( isset( $designer_name ) && $designer_name ) : ?>
		<div class="porfolio-meta__designer">
			<h3 class="portfolio-meta__heading"><?php esc_html_e( 'Designer', 'carrieforde3' ); ?></h3>
			<p class="portfolio-meta__details"><a href="<?php echo esc_url( $designer_url ); ?>"><?php echo esc_html( $designer_name ); ?></a></p>
		</div>
		<?php endif; ?>

		<a href="<?php echo esc_url( $project_url ); ?>" class="button"><?php esc_html_e( 'Launch Website', 'carrieforde3' ); ?></a>
	</aside>
	<?php return ob_get_clean();
}

/**
 * Echo the portfolio meta.
 */
function cf3_the_portfolio_meta( $post_id = 0 ) {

	echo cf3_get_portfolio_meta( $post_id ); // WPCS: XSS OK.
}
