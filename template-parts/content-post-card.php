<?php
/**
 * Template for Post cards.
 *
 * @package carrieforde3
 */

$accent = cf3_get_category_accent();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card card--post alcatraz-col--4 post-card' ); ?>>
	<div class="post-card__inner-wrap">
		<div class="post-thumbnail post-card__image">
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'card-image' ); ?>
				<?php else : ?>
					<?php echo wp_get_attachment_image( cf3_get_category_image( get_the_ID(), 'card-image' ), 'card-image' ); ?>
				<?php endif; ?>
			</a>
		<?php echo cf3_get_post_card_category_badge(); ?>
		</div>

		<header class="entry-header post-card__header">
			<h2 class="entry-title post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>

		<div class="entry-content post-card__content">
			<?php the_excerpt(); ?>
		</div>

		<footer class="entry-footer post-card__footer">
			<a href="<?php the_permalink(); ?>" class="button button--text color-<?php echo esc_attr( $accent ); ?>"><?php esc_html_e( 'Read More', 'carrieforde' ); ?></a>
		</footer>
	</div>
</article>
