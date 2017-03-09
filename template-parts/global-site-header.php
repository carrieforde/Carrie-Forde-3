<?php
/**
 * The site header markup.
 */
?>

<header id="site-header" class="site-header" role="banner">

	<?php do_action( 'alcatraz_before_header_inside' ); ?>

	<div class="header-inner">

		<?php do_action( 'alcatraz_header' ); ?>

	</div>

	<?php if ( has_nav_menu( 'primary' ) ) :

		$options = get_option( 'alcatraz_options' );
	?>

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<?php do_action( 'alcatraz_before_primary_nav' ); ?>

		<?php wp_nav_menu( array(
			'theme_location'  => 'primary',
			'menu_id'         => 'primary-menu',
			'menu_class'      => 'primary-menu',
			'container_class' => 'main-navigation__menu',
		) ); ?>

		<?php do_action( 'alcatraz_after_primary_nav' ); ?>
	</nav>

	<?php endif; ?>

	<?php do_action( 'alcatraz_after_header_inside' ); ?>

</header>
