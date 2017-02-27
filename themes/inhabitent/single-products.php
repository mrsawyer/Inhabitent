<?php
/**
 * The template for displaying all single posts.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="product-content-area site-container">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'large' ); ?>
					<?php endif; ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

					<div class="entry-price">
						<?php echo get_post_meta(get_the_ID(), 'price', true); ?>
					</div><!-- .entry-meta -->
					<?php the_content(); ?>
					<div class="shop-social-media">
					<p class="general-button"><a href=""><i class="fa fa-facebook" aria-hidden="true"></i>Like</a></p>
					<p class="general-button"><a href=""><i class="fa fa-twitter" aria-hidden="true"></i>Tweet</a></p>
					<p class="general-button"><a href=""><i class="fa fa-pinterest" aria-hidden="true"></i>Pin</a></p>
					</div>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php red_starter_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
