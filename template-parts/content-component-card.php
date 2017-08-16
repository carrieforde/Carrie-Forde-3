<?php
/**
 * Template for Component cards.
 *
 * @package carrieforde3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card card--component' ); ?>>

	<div class="post-thumbnail card__image">
		<a href="<?php the_permalink(); ?>">
			<?php cf3_the_component_image(); ?>
		</a>
	</div>

	<div class="card__content-wrap">
		<header class="entry-header card__header">
			<h2 class="entry-title card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>
	</div>
</article>
