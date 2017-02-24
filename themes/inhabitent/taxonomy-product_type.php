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

			<header class="page-header">

				<h1 class="page-title"> <?php echo $term -> name; ?> </h1>
                <?php
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<header class="entry-header">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'medium' ); ?>
					<?php endif; ?>
				</header>

				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>


			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
