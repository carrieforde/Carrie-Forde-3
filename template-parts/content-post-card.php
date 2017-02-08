<?php
/**
 * Template for Post cards.
 *
 * @package carrieforde3
 */

$accent = cf3_get_category_accent();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'alcatraz-col--4 post-card' ); ?>>
	<div class="post-thumbnail post-card__image">
		<a href="<?php the_permalink(); ?>">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail(); ?>
			<?php else : ?>
				<?php echo cf3_get_category_image(); ?>
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
		<?php echo alcatraz_button( array( // WPCS: XSS OK.
			'type' => 'text',
			'link' => get_the_permalink(),
			'button_text' => 'Read More',
			'class' => 'button-text--' . esc_attr( $accent ),
		) ); ?>
	</footer>
</article>
