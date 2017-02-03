<?php
/**
 * Buttons
 */
?>

<section class="alcatraz-pattern">

	<h2 class="alcatraz-pattern__heading"><?php esc_html_e( 'Buttons', 'alcatraz' ); ?></h2>

	<?php alcatraz_pattern_doc( array(
		'heading'     => 'Button',
		'description' => 'This is a <code>button</code>.',
		'function'    => 'alcatraz_button( array( \'type\' => \'button\' ) )',
		'params'      => array( '$args' => 'The function arguments' ),
		'args'        => array( 'type' => 'button' ),
		'output'      => alcatraz_button( array( 'type' => 'button' ) ),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'      => 'Submit',
		'description'  => 'This is an <code>input[type="submit"]</code>.',
		'function'     => 'alcatraz_button( array( \'type\' => \'submit\' ) )',
		'params'       => array( '$args' => 'The function arguments' ),
		'args'         => array( 'type' => 'submit' ),
		'output'       => alcatraz_button( array( 'type' => 'submit' ) ),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'      => 'Text',
		'description'  => 'This is an <code>a</code> button.',
		'function'     => 'alcatraz_button( array( \'type\' => \'text\' ) )',
		'params'       => array( '$args' => 'The function arguments' ),
		'args'         => array( 'type' => 'text' ),
		'output'       => alcatraz_button( array( 'type' => 'text' ) ),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Text - Blue',
		'description'       => 'This is an <code>a</code> with the <code>blue</code> modifier.',
		'function'          => 'alcatraz_button( array( \'type\' => \'text\', \'class\' => \'blue\' ) )',
		'output'            => alcatraz_button( array( 'type' => 'text', 'class' => 'button-text--blue' ) ),
		'params'            => array( '$args' => 'The function arguments' ),
		'args'              => array(
			'type' => 'text',
			'class' => 'button-text--blue',
		),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Text - Dark Violet',
		'description'       => 'This is an <code>a</code> with the <code>dark-violet</code> modifier.',
		'function'          => 'alcatraz_button( array( \'type\' => \'text\', \'class\' => \'dark-violet\' ) )',
		'output'            => alcatraz_button( array( 'type' => 'text', 'class' => 'button-text--dark-violet' ) ),
		'params'            => array( '$args' => 'The function arguments' ),
		'args'              => array(
			'type' => 'text',
			'class' => 'button-text--dark-violet',
		),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Text - Electric Lime',
		'description'       => 'This is an <code>a</code> with the <code>electric-lime</code> modifier.',
		'function'          => 'alcatraz_button( array( \'type\' => \'text\', \'class\' => \'electric-lime\' ) )',
		'output'            => alcatraz_button( array( 'type' => 'text', 'class' => 'button-text--electric-lime' ) ),
		'params'            => array( '$args' => 'The function arguments' ),
		'args'              => array(
			'type' => 'text',
			'class' => 'button-text--electric-lime',
		),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Text - Sinopia',
		'description'       => 'This is an <code>a</code> with the <code>sinopia</code> modifier.',
		'function'          => 'alcatraz_button( array( \'type\' => \'text\', \'class\' => \'sinopia\' ) )',
		'output'            => alcatraz_button( array( 'type' => 'text', 'class' => 'button-text--sinopia' ) ),
		'params'            => array( '$args' => 'The function arguments' ),
		'args'              => array(
			'type' => 'text',
			'class' => 'button-text--sinopia',
		),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Text - West Side',
		'description'       => 'This is an <code>a</code> with the <code>west-side</code> modifier.',
		'function'          => 'alcatraz_button( array( \'type\' => \'text\', \'class\' => \'west-side\' ) )',
		'output'            => alcatraz_button( array( 'type' => 'text', 'class' => 'button-text--west-side' ) ),
		'params'            => array( '$args' => 'The function arguments' ),
		'args'              => array(
			'type' => 'text',
			'class' => 'button-text--west-side',
		),
	) ); ?>
</section>
