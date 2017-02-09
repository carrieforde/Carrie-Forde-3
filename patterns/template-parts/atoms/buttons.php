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
		'heading'           => 'Text - Curious Blue',
		'description'       => 'This is an <code>a</code> with the <code>curious blue</code> modifier.',
		'function'          => 'alcatraz_button( array( \'type\' => \'text\', \'class\' => \'curious-blue\' ) )',
		'output'            => alcatraz_button( array( 'type' => 'text', 'class' => 'button-text--curious-blue' ) ),
		'params'            => array( '$args' => 'The function arguments' ),
		'args'              => array(
			'type' => 'text',
			'class' => 'button-text--curious-blue',
		),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Text - Lawn Green',
		'description'       => 'This is an <code>a</code> with the <code>lawn-green</code> modifier.',
		'function'          => 'alcatraz_button( array( \'type\' => \'text\', \'class\' => \'lawn-green\' ) )',
		'output'            => alcatraz_button( array( 'type' => 'text', 'class' => 'button-text--lawn-green' ) ),
		'params'            => array( '$args' => 'The function arguments' ),
		'args'              => array(
			'type' => 'text',
			'class' => 'button-text--lawn-green',
		),
	) ); ?>

	<?php alcatraz_pattern_doc( array(
		'heading'           => 'Text - Tree Poppy',
		'description'       => 'This is an <code>a</code> with the <code>tree-poppy</code> modifier.',
		'function'          => 'alcatraz_button( array( \'type\' => \'text\', \'class\' => \'tree-poppy\' ) )',
		'output'            => alcatraz_button( array( 'type' => 'text', 'class' => 'button-text--tree-poppy' ) ),
		'params'            => array( '$args' => 'The function arguments' ),
		'args'              => array(
			'type' => 'text',
			'class' => 'button-text--tree-poppy',
		),
	) ); ?>
</section>
