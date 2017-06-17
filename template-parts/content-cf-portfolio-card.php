<?php
/**
 * Template for Portfolio cards.
 *
 * @package carrieforde3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card card--portfolio alcatraz-col--6 portfolio-card' ); ?>>
	<div class="portfolio-card__inner-wrap">
		<header class="entry-header portfolio-card__header">
			<a href="<?php the_permalink(); ?>">
				<h2 class="entry-title portfolio-card__title"><?php the_title(); ?></h2>
				<div class="portfolio-card__services"><?php echo cf3_get_portfolio_terms(); ?></div>
			</a>
		</header>

		<div class="entry-content portfolio-card__content">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="post-thumbnail portfolio-card__image">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'card-image' ); ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</article>
