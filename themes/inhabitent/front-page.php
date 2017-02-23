<?php
/**
 * The template for Inhabitent front page.
 *
 * @package Inhabitent Theme
 */

get_header(); 

?>

<section class="product-types">

    <?php 

    $terms = get_terms(array(
        'order' => 'ASC',
        'taxonomy' => 'product_type',)
    );

    foreach ( $terms as $term ) : ?>
        <div class="recent-journal-entry">
            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/<?php echo $term->slug ?>.svg" />
            <p class = "front-type-description"><?php echo $term->description ?></p>
            <button><a href="<?php echo get_permalink();?>" class="front-type-name"><?php echo $term->name ?></a></button>
        </div>
    <?php endforeach; wp_reset_postdata(); ?>

</section>

<section class="latest-journal site-container">

<?php

$args = array(
    'order' => 'DESC',
    'posts_per_page' => 3,
    'post_type' => 'post',
    'orderby' => 'post_date',
);

$journal_posts = get_posts( $args ); // returns an array of posts

    foreach ( $journal_posts as $post ) : setup_postdata( $post ); ?>
    <div class="recent-journal-entry">
        <a href="<?php echo get_permalink(); ?>" class="front-recent-thumbnail"><?php the_post_thumbnail('small'); ?></a>
        <div class = "front-recent-comments"><?php red_starter_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></div>
        <a href="<?php echo get_permalink(); ?>" class="front-recent-title"><h2 class = "hello"><?php the_title(); ?></h2></a>
    </div>
<?php endforeach; wp_reset_postdata(); ?>

</section>

<?php get_footer(); ?>