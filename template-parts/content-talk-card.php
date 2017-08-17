<?php
/**
 * Template for Speaking cards.
 *
 * @package carrieforde3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card card--talk' ); ?>>

	<header class="entry-header card__header">
		<h2 class="entry-title card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>

	<div class="entry-content card__content">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer card__footer">
		<a href="<?php the_permalink(); ?>" class="button button--text color-white"><?php esc_html_e( 'Get Details', 'carrieforde' ); ?></a>
	</footer>
</article>
