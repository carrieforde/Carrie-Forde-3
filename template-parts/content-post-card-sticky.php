<?php
/**
 * Template for Post cards.
 *
 * @package carrieforde3
 */

$accent = cf3_get_category_accent();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card card--horizontal alcatraz-col--8' ); ?>>

	<div class="post-thumbnail card__image">
		<a href="<?php the_permalink(); ?>">
			<?php cf3_the_post_image(); ?>
		</a>
	<?php cf3_the_post_category_badge(); ?>
	</div>

	<div class="card__content-wrap">
		<header class="entry-header card__header">
			<h2 class="entry-title card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>

		<div class="entry-content card__content">
			<?php the_excerpt(); ?>
		</div>

		<footer class="entry-footer card__footer">
			<a href="<?php the_permalink(); ?>" class="button button--text color-<?php echo esc_attr( $accent ); ?>"><?php esc_html_e( 'Read More', 'carrieforde' ); ?></a>
		</footer>
	</div>
</article>
