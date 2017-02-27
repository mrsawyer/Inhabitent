<?php
/**
 * The template for displaying archive product post types (shop page).
 *
 * @package Inhabitent Theme
 */

get_header(); ?>

	<div id="primary" class="shop-content-area">
		<main id="main" class="shop-site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="shop-page-header">
				<?php the_archive_title( '<h1 class="shop-page-title">', '</h1>' ); ?>
					<ul class="product-types">

						<?php 

						$terms = get_terms(array(
							'order' => 'ASC',
							'taxonomy' => 'product_type',)
						);

						foreach ( $terms as $term ) : ?>
							<li class="product-term-item">
								<a href="<?php echo get_term_link( $term->slug, 'product_type' );?>" class="front-type-name"><p> <?php echo $term->slug ?></p></a>
							</li>
						<?php endforeach; wp_reset_postdata(); ?>

					</ul>
			</header><!-- .page-header -->

	
			<section class ="product-archive-section">
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="product-list-entry">
				<header class="entry-header">
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php echo get_permalink() ?>" rel="bookmark"> <?php the_post_thumbnail( 'large' ); ?></a>
					<?php endif; ?>
				</header>

				<p class = "product-name-price">
					<span class='entry-title'><?php echo the_title(); ?></span>
					<span class='entry-price'><?php echo get_post_meta(get_the_ID(), 'price', true); ?></span>
				</p>
			</div>
			<?php endwhile; ?>
			</section>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
