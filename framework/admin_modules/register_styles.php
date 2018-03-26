<?php
/**
 * Enqueue scripts and styles.
 */
function kindler_scripts() {
    wp_enqueue_style( 'kindler-style', get_stylesheet_uri() );

    wp_enqueue_style('kindler-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('kindler_title_font', 'Revalia')) ).':100,300,400,700' );

    wp_enqueue_style('bootstrap-style', get_template_directory_uri()."/assets/bootstrap/bootstrap.css", array('kindler-style'));

    wp_enqueue_style('kindler-main-skin', get_template_directory_uri()."/assets/theme_styles/css/default.css", array('bootstrap-style'));

    wp_enqueue_style('font-awesome', get_template_directory_uri()."/assets/font-awesome/css/font-awesome.min.css", array('kindler-main-skin'));

    wp_enqueue_script('custom-js', get_template_directory_uri()."/js/custom.js", array('jquery'));

    wp_enqueue_script('nav-js', get_template_directory_uri()."/js/jquery.slicknav.js", array('jquery'));

    wp_enqueue_script( 'kindler-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'kindler-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'kindler_scripts' );
