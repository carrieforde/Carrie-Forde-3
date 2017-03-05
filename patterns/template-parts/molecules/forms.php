<?php
/**
 * Forms
 */
?>

<section class="alcatraz-pattern">

	<h2 class="alcatraz-pattern__heading"><?php esc_html_e( 'Forms', 'alcatraz' ); ?></h2>

	<?php alcatraz_pattern_doc( array(
		'heading'     => 'Form Field with Label',
		'description' => 'This is what fields with labels look like by default.',
		'function'    => "alcatraz_form_element_with_label( array( 'label_text'   => 'Input Label',
		'tag'          => 'input',
		'type'         => 'text',
		'name'         => 'text', ) )",
		'output'      => alcatraz_form_element_with_label( array(
			'label_text'   => 'Input Label',
			'tag'          => 'input',
			'type'         => 'text',
			'name'         => 'text',
		) ),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'      => 'Search Form',
		'description'  => 'This is the native WordPress search form. You may edit it\'s HTML by creating a <a href="https://developer.wordpress.org/reference/functions/get_search_form/">searchform.php</a> file.',
		'function'     => 'get_search_form()',
		'output'       => get_search_form( $echo = false ),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Navigation Search Form',
		'description'       => 'This is the native WordPress search form which will be placed within the mobile navigation. The search form hides by default, and is triggered by clicking the Search button.',
		'patterns_included' => '',
		'function'          => 'cf3_get_navigation_search()',
		'output'            => cf3_get_navigation_search(),
		'params'            => array(),
		'args'              => array(),
	) ); ?>
</section>