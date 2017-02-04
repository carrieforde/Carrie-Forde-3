<?php
/**
 * Template for Post cards.
 *
 * @package carrieforde3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'alcatraz-col--4 post-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<header class="entry-header post-card__header">
		<h2 class="entry-title post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>

	<div class="entry-content post-card__content">
		<?php the_excerpt(); ?>
	</div>
</article>
