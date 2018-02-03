<?php
/**
 * ACF - get meta.
 */


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

	echo cf3_get_post_footnotes( $post_id ); // WPCS: XSS OK.
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
	$project_repo  = get_post_meta( $post_id, 'github_repo', true );
	$services = get_the_term_list( $post_id, 'cf-project-services', '', ', ', '' );
	$technologies  = get_the_term_list( $post_id, 'cf-technologies', '', ', ', '' );

	ob_start(); ?>

	<aside class="portfolio-meta">
		<?php if ( $services ) : ?>
		<div class="porfolio-meta__taxonomy porfolio-meta__taxonomy--services">
			<h3 class="portfolio-meta__heading"><?php esc_html_e( 'Services', 'carrieforde3' ); ?></h3>
			<p class="portfolio-meta__terms"><?php echo wp_kses_post( $services ); ?></p>
		</div>
		<?php endif; ?>

		<?php if ( $technologies ) : ?>
		<div class="porfolio-meta__taxonomy porfolio-meta__taxonomy--techonologies">
			<h3 class="portfolio-meta__heading"><?php esc_html_e( 'Technologies', 'carrieforde3' ); ?></h3>
			<p class="portfolio-meta__terms"><?php echo wp_kses_post( $technologies ); ?></p>
		</div>
		<?php endif; ?>

		<?php if ( ! empty( $designer_name )) : ?>
		<div class="porfolio-meta__designer">
			<h3 class="portfolio-meta__heading"><?php esc_html_e( 'Designer', 'carrieforde3' ); ?></h3>
			<p class="portfolio-meta__details"><a href="<?php echo esc_url( $designer_url ); ?>"><?php echo esc_html( $designer_name ); ?></a></p>
		</div>
		<?php endif; ?>

		<a href="<?php echo esc_url( $project_url ); ?>" class="button"><?php esc_html_e( 'Launch Website', 'carrieforde3' ); ?></a>

		<?php if ( ! empty( $project_repo ) ) : ?>
		<a href="<?php echo esc_url( $project_repo ); ?>" class="button button--outline button--outline--razzmatazz"><?php esc_html_e( 'View on Github', 'carrieforde3' ); ?></a>
		<?php endif; ?>
	</aside>
	<?php return ob_get_clean();
}

/**
 * Echo the portfolio meta.
 */
function cf3_the_portfolio_meta( $post_id = 0 ) {

	echo cf3_get_portfolio_meta( $post_id ); // WPCS: XSS OK.
}

/**
 * Build the speaking meta markup.
 *
 * @param   int     The ID of the speaking post.
 *
 * @return  srting  The meta markup.
 */
function cf3_get_speaking_meta( $post_id = 0 ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	// Get the data.
	$event_name      = get_post_meta( $post_id, 'event_name', true );
	$event_time_date = get_post_meta( $post_id, 'event_date_time', true );
	$event_website   = get_post_meta( $post_id, 'event_website', true );

	$date = strtotime( $event_time_date );
	$day  = date( 'l, F d, Y', $date );
	$time = date( 'g:i a', $date );

	ob_start(); ?>

	<aside class="speaking-meta">

		<header class="speaking-meta__heading">
			<h3><?php echo esc_html( $event_name ); ?></h3>
		</header>

		<div class="speaking-meta__content">
			<h4><?php esc_html_e( 'Date', 'carrieforde3' ); ?></h4>
			<?php echo wp_kses_post( wpautop( $day ) ); ?>
		
			<h4><?php esc_html_e( 'Time', 'carrieforde3' ); ?></h4>
			<?php echo wp_kses_post( wpautop( $time ) ); ?>
		</div>
		
		<footer class="speaking-meta__footer">
			<a href="<?php echo esc_html( $event_website ); ?>" class="button"><?php esc_html_e( 'Event Website', 'carrieforde3' ); ?></a>
		</footer>
	</aside>

	<?php return ob_get_clean();
}

/**
 * Echo the speaking meta.
 */
function cf3_the_speaking_meta( $post_id = 0 ) {

	echo cf3_get_speaking_meta( $post_id ); // WPCS: XSS OK.
}
