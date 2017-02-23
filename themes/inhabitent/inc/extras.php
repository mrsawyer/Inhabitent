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
