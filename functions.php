<?php
if ( ! function_exists( 'freelancer_setup' ) ) :

function freelancer_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    /* Pinegrow generated Load Text Domain Begin */
    load_theme_textdomain( 'freelancer', get_template_directory() . '/languages' );
    /* Pinegrow generated Load Text Domain End */

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );
    
    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );

    // Add menus.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'freelancer' ),
        'social'  => __( 'Social Links Menu', 'freelancer' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );
}
endif; // freelancer_setup

add_action( 'after_setup_theme', 'freelancer_setup' );


if ( ! function_exists( 'freelancer_init' ) ) :

function freelancer_init() {

    
    // Use categories and tags with attachments
    register_taxonomy_for_object_type( 'category', 'attachment' );
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );

    /*
     * Register custom post types. You can also move this code to a plugin.
     */
    /* Pinegrow generated Custom Post Types Begin */

    register_post_type('portfolio_item', array(
        'labels' => 
            array(
                'name' => __( 'Portfolio items', 'freelancer' ),
                'singular_name' => __( 'Portfolio item', 'freelancer' )
            ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' )
    ));

    register_post_type('portfolio_item2', array(
        'labels' => 
            array(
                'name' => __( 'Portfolio items2', 'freelancer' ),
                'singular_name' => __( 'Portfolio item2', 'freelancer' )
            ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' )
    ));

    register_post_type('contact_item1', array(
        'labels' => 
            array(
                'name' => __( 'Contact Items1', 'freelancer' ),
                'singular_name' => __( 'Contact Item1', 'freelancer' )
            ),
        'public' => true,
        'supports' => array( 'post-formats', 'page-attributes', 'revisions', 'custom-fields', 'trackbacks', 'thumbnail', 'author', 'excerpt', 'editor', 'comments', 'title' )
    ));

    /* Pinegrow generated Custom Post Types End */
    
    /*
     * Register custom taxonomies. You can also move this code to a plugin.
     */
    /* Pinegrow generated Taxonomies Begin */

    /* Pinegrow generated Taxonomies End */

}
endif; // freelancer_setup

add_action( 'init', 'freelancer_init' );


if ( ! function_exists( 'freelancer_widgets_init' ) ) :

function freelancer_widgets_init() {

    /*
     * Register widget areas.
     */
    /* Pinegrow generated Register Sidebars Begin */

    /* Pinegrow generated Register Sidebars End */
}
add_action( 'widgets_init', 'freelancer_widgets_init' );
endif;// freelancer_widgets_init



if ( ! function_exists( 'freelancer_customize_register' ) ) :

function freelancer_customize_register( $wp_customize ) {
    // Do stuff with $wp_customize, the WP_Customize_Manager object.

    /* Pinegrow generated Customizer Controls Begin */

    /* Pinegrow generated Customizer Controls End */

}
add_action( 'customize_register', 'freelancer_customize_register' );
endif;// freelancer_customize_register


if ( ! function_exists( 'freelancer_enqueue_scripts' ) ) :
    function freelancer_enqueue_scripts() {

        /* Pinegrow generated Enqueue Scripts Begin */

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', false, null, true);

    wp_deregister_script( 'bootstrap' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', false, null, true);

    wp_deregister_script( 'jqueryeasing' );
    wp_enqueue_script( 'jqueryeasing', 'http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', false, null, true);

    wp_deregister_script( 'classie' );
    wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', false, null, true);

    wp_deregister_script( 'cbpanimatedheader' );
    wp_enqueue_script( 'cbpanimatedheader', get_template_directory_uri() . '/js/cbpAnimatedHeader.js', false, null, true);

    wp_deregister_script( 'jqbootstrapvalidation' );
    wp_enqueue_script( 'jqbootstrapvalidation', get_template_directory_uri() . '/js/jqBootstrapValidation.js', false, null, true);

    wp_deregister_script( 'contact_me' );
    wp_enqueue_script( 'contact_me', get_template_directory_uri() . '/js/contact_me.js', false, null, true);

    wp_deregister_script( 'freelancer' );
    wp_enqueue_script( 'freelancer', get_template_directory_uri() . '/js/freelancer.js', false, null, true);

    /* Pinegrow generated Enqueue Scripts End */

        /* Pinegrow generated Enqueue Styles Begin */

    wp_deregister_style( 'style-1' );
    wp_enqueue_style( 'style-1', 'http://fonts.googleapis.com/css?family=Akronim:400', false, null, 'all');

    wp_deregister_style( 'bootstrap' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, null, 'all');

    wp_deregister_style( 'freelancer' );
    wp_enqueue_style( 'freelancer', get_template_directory_uri() . '/css/freelancer.css', false, null, 'all');

    wp_deregister_style( 'fontawesome' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', false, null, 'all');

    wp_deregister_style( 'style-2' );
    wp_enqueue_style( 'style-2', 'http://fonts.googleapis.com/css?family=Montserrat:400,700', false, null, 'all');

    wp_deregister_style( 'style-3' );
    wp_enqueue_style( 'style-3', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic', false, null, 'all');

    wp_deregister_style( 'custom' );
    wp_enqueue_style( 'custom', get_template_directory_uri() . '/custom.css', false, null, 'all');

    wp_deregister_style( 'style-4' );
    wp_enqueue_style( 'style-4', 'https://fonts.googleapis.com/css?family=Bangers:400', false, null, 'all');

    /* Pinegrow generated Enqueue Styles End */

    }
    add_action( 'wp_enqueue_scripts', 'freelancer_enqueue_scripts' );
endif;

/*
 * Resource files included by Pinegrow.
 */
/* Pinegrow generated Include Resources Begin */

    /* Pinegrow generated Include Resources End */
?>