<?php
/**
 * Template for Post cards.
 *
 * @package carrieforde3
 */

$accent = cf3_get_category_accent();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card post-card--sticky' ); ?>>

	<div class="post-thumbnail post-card__image post-card--sticky__image">
		<a href="<?php the_permalink(); ?>">
			<?php if ( has_post_thumbnail( 'card-image' ) ) : ?>
				<?php the_post_thumbnail(); ?>
			<?php else : ?>
				<?php echo cf3_get_category_image( get_the_ID(), 'card-image' ); ?>
			<?php endif; ?>
		</a>
	<?php echo cf3_get_post_card_category_badge(); ?>
	</div>

	<div class="post-card--sticky__content-wrap">
		<header class="entry-header post-card__header post-card--sticky__header">
			<h2 class="entry-title post-card__title post-card--sticky__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>

		<div class="entry-content post-card__content post-card--sticky__content">
			<?php the_excerpt(); ?>
		</div>

		<footer class="entry-footer post-card__footer post-card--sticky__footer">
			<a href="<?php the_permalink(); ?>" class="button button-text--<?php echo esc_attr( $accent ); ?>"><?php esc_html_e( 'Read More', 'carrieforde' ); ?></a>
		</footer>
	</div>
</article>
