<?php
/**
 * Template Name: About Page
 *
 * @package Inhabitent
 */

get_header(); ?>

	<div id="primary" class="about-content-area">
		<main id="main" class="about-page" role="main">
                  <header class="entry-header custom-header">
                        <?php the_title( sprintf( '<h1 class=""><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	            </header><!-- .entry-header -->
            <div class ="about-content">     
                  <h2> Our Story </h2>
                  <?php echo CFS()->get( 'about_our_story' ); ?>
                  <h2> Our Team </h2>
                  <?php echo CFS()->get( 'about_our_team' ); ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
