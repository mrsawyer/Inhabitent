<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Inhabitent_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );

/**
 * Customize WP login page
 *
 * 
 */
function inhabitent_login_logo() { 
    echo '<style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('.get_stylesheet_directory_uri().'/images/inhabitent-logo-text-dark.svg);
            padding-bottom: 20px;
			background-size: 95%;
			width: 99%;
			height: 35px;
        }
        #login .button.button-primary {
            background-color: #248A83;
            border-color: #248A83;
        }
    </style>';
}

add_action( 'login_enqueue_scripts', 'inhabitent_login_logo' );

function inhabitent_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'inhabitent_login_logo_url' );

function inhabitent_login_logo_url_title() {
    return 'Inhabitent Camping Supply Co.';
}
add_filter( 'login_headertitle', 'inhabitent_login_logo_url_title' );


/**
 * Custom about page styles method
 *
 * 
 */

function inhabitent_about_styles() {

    if(!is_page_template('page-templates/about.php')){
        return;
    }
	$image = CFS()->get( 'about_header_image' );

    if(!$image){
        return;
    }

    $hero_css = ".page-template-about .entry-header {
        background:
            linear-gradient( to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.4) 100% ),
            url({$image}) no-repeat center bottom;
        background-size: cover, cover;
        }"; 
    wp_add_inline_style( 'red-starter-style', $hero_css );
}
add_action( 'wp_enqueue_scripts', 'inhabitent_about_styles' );

/**
 * Custom products archive title
 *
 */
					
function modify_shop_archive_title( $title ) {	
    if(is_post_type_archive('products')){
        $title = "Shop Stuff";
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'modify_shop_archive_title');

/**
 * Custom # of products shown on shop page
 */

function shop_pagesize( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_post_type_archive( 'products' ) ) {
        $query->set( 'posts_per_page', 16 );
		$query->set('order', 'ASC' );
        return;
    }
}
add_action( 'pre_get_posts', 'shop_pagesize', 1 );


/**
 * Customize excerpt length and style.
 *
 * @param  string The raw post content.
 * @return string
 */
function red_wp_trim_excerpt( $text ) {
	$raw_excerpt = $text;
	
	if ( '' == $text ) {
		// retrieve the post content
		$text = get_the_content('');
		
		// delete all shortcode tags from the content
		$text = strip_shortcodes( $text );
		
		$text = apply_filters( 'the_content', $text );
		$text = str_replace( ']]>', ']]&gt;', $text );
		
		// indicate allowable tags
		$allowed_tags = '<p>,<a>,<em>,<strong>,<blockquote>,<cite>';
		$text = strip_tags( $text, $allowed_tags );
		
		// change to desired word count
		$excerpt_word_count = 50;
		$excerpt_length = apply_filters( 'excerpt_length', $excerpt_word_count );
		
		// create a custom "more" link
		$excerpt_end = '<span>[...]</span><p class="general-button"><a href="' . get_permalink() . '">Read more &rarr;</a></p>'; // modify excerpt ending
		$excerpt_more = apply_filters( 'excerpt_more', ' ' . $excerpt_end );
		
		// add the elipsis and link to the end if the word count is longer than the excerpt
		$words = preg_split( "/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY );
		
		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			$text = implode( ' ', $words );
			$text = $text . $excerpt_more;
		} else {
			$text = implode( ' ', $words );
		}
	}
	
	return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
}

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'red_wp_trim_excerpt' );



/**
 * Custom adventures page styles method
 *
 * 
 */

function inhabitent_adventures_styles() {

    if(!('adventures' == get_post_type())){
        return;
    }
	$image = CFS()->get( 'adventure_header_image' );

    if(!$image){
        return;
    }

    $hero_css = ".adventures-template-default .entry-header {
        background:
            linear-gradient( to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.4) 100% ),
            url({$image}) no-repeat center bottom;
        background-size: cover, cover;
        }"; 
    wp_add_inline_style( 'red-starter-style', $hero_css );
}
add_action( 'wp_enqueue_scripts', 'inhabitent_adventures_styles' );

/**
 * Custom adventures archive title
 *
 */
					
function modify_adventures_archive_title( $title ) {	
    if(is_post_type_archive('adventures')){
        $title = "Latest Adventures";
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'modify_adventures_archive_title');



