<?php
/**
 * kindler functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kindler
 */

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! isset( $content_width ) ) $content_width = 640;

if ( ! function_exists( 'kindler_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function kindler_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on kindler, use a find and replace
         * to change 'kindler' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'kindler', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         */
        add_theme_support( 'post-thumbnails' );

        add_theme_support('custom-logo');

        add_image_size('kindler-home-thumb', 600, 600, true);
        add_image_size('kindler-fp-thumb', 600, 400, true);

        add_theme_support( 'custom-header' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'kindler' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'kindler_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
    }
endif; // kindler_setup
add_action( 'after_setup_theme', 'kindler_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kindler_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'kindler_content_width', 640 );
}
add_action( 'after_setup_theme', 'kindler_content_width', 0 );