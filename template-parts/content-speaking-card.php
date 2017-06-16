<?php
/**
 * Template for Post cards.
 *
 * @package carrieforde3
 */

$accent = cf3_get_category_accent();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'alcatraz-col--4 speaking-card' ); ?>>
	<div class="speaking-card__inner-wrap">
		<div class="post-thumbnail speaking-card__image">
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'card-image' ); ?>
				<?php else : ?>
					<?php echo wp_get_attachment_image( cf3_get_category_image( get_the_ID(), 'card-image' ), 'card-image' ); ?>
				<?php endif; ?>
			</a>
		</div>

		<header class="entry-header speaking-card__header">
			<h2 class="entry-title speaking-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>

		<div class="entry-content speaking-card__content">
			<?php the_excerpt(); ?>
		</div>

		<footer class="entry-footer speaking-card__footer">
			<a href="<?php the_permalink(); ?>" class="button button--text color-<?php echo esc_attr( $accent ); ?>"><?php esc_html_e( 'Read More', 'carrieforde' ); ?></a>
		</footer>
	</div>
</article>
