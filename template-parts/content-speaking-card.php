<?php
/**
 * Template for Speaking cards.
 *
 * @package carrieforde3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card card--speaking speaking-card' ); ?>>
	<div class="card__inner-wrap">
		<div class="post-thumbnail card__image">
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'card-image' ); ?>
				<?php endif; ?>
			</a>
		</div>

		<header class="entry-header card__header">
			<h2 class="entry-title card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>

		<div class="entry-content card__content">
			<?php the_excerpt(); ?>
		</div>

		<footer class="entry-footer card__footer">
			<a href="<?php the_permalink(); ?>" class="button button--text color-razzmatazz"><?php esc_html_e( 'More Details', 'carrieforde' ); ?></a>
		</footer>
	</div>
</article>
