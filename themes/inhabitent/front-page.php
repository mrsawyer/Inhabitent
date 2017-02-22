<?php
/**
 * The template for Inhabitent front page.
 *
 * @package Inhabitent Theme
 */

get_header(); 

?>

<section class="latest-journal">


<?php

$args = array(
    'order' => 'DESC',
    'posts_per_page' => 3,
    'post_type' => 'post',
    'orderby' => 'post_date',
);

$product_posts = get_posts( $args ); // returns an array of posts

foreach ( $product_posts as $post ) : setup_postdata( $post ); ?>
<div class="recent-journal-entry">
    <a href="<?php echo home_url() ?>" class="front-page-thumbnail"><?php the_post_thumbnail('small'); ?></a>
    <span class = "front-page-comments"><?php red_starter_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
    <h1><?php the_title(); ?></h1>
</div>
<?php endforeach; wp_reset_postdata(); ?>

</section>





<?php get_footer(); ?>