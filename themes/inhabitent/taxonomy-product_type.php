<?php 
/**
 * The template for displaying archive product post types taxonomies.
 *
 * @package Inhabitent Theme
 */

get_header(); ?>

	<div id="primary" class="shop-content-area">
		<main id="main" class="shop-site-main" role="main">

		<?php if ( have_posts() ) : 

            $term = get_queried_object();

            ?>

			<header class="shop-page-header">

				<h1 class="shop-page-title"> <?php echo $term -> name; ?> </h1>
                <?php
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
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

