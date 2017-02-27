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
			</header><!-- .page-header -->
            <section class="adventure-archive-content">
			<?php while ( have_posts() ) : the_post(); ?>
                <div class="adventures-container">
                    <img src="<?php echo CFS()->get( 'adventure_header_image' ) ?>" class="adventure-header-image" />
                    <h2 class = "front-adventure-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="general-button"><a href="<?php echo get_permalink(); ?>" class="front-read-more-button">Read more</a></p>
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
