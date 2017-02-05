<?php
/**
 * Project Services
 */
?>

<section class="alcatraz-pattern">

	<h2 class="alcatraz-pattern__heading"><?php esc_html_e( 'Portfolio Terms', 'alcatraz' ); ?></h2>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Project Services',
		'description'       => 'Project Services are a taxonomy associated to the Portfolio post type. This will display the services associated to a specific post.',
		'function'          => 'cf3_get_portfolio_terms()',
		'output'            => cf3_get_portfolio_terms( cf3_get_post_id( array( 'post_type' => 'cf-portfolio' ) ) ),
	) ); ?>
</section>
