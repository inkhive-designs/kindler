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
		'primary' => esc_html__( 'Primary Menu', 'kindler' ),
		'depth'	=> 1,
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
 * Enqueue the stylesheet.
 */
function kindler_customizer_stylesheet() {

	wp_enqueue_style('font-awesome-2', get_template_directory_uri()."/assets/font-awesome/css/font-awesome.min.css", NULL, NULL, 'all' );
    wp_enqueue_style( 'kindler-customizer-css', get_template_directory_uri() . '/assets/css/customizer.css', NULL, NULL, 'all' );
}
add_action( 'customize_controls_print_styles', 'kindler_customizer_stylesheet' );

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

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kindler_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kindler' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><div class="hexagon"></div><p>',
		'after_title'   => '</p></h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 1', 'kindler' ),
		'id'            => 'sidebar-2',
		'description'   => __('The left-most widget column in the footer','kindler'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 2', 'kindler' ),
		'id'            => 'sidebar-3',
		'description'   => __('The second widget column in the footer','kindler'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 3', 'kindler' ),
		'id'            => 'sidebar-4',
		'description'   => __('The third widget column in the footer','kindler'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 4', 'kindler' ),
		'id'            => 'sidebar-5',
		'description'   => __('The last widget column in the footer','kindler'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'kindler_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kindler_scripts() {
	wp_enqueue_style( 'kindler-style', get_stylesheet_uri() );
	
	wp_enqueue_style('bootstrap-style', get_template_directory_uri()."/assets/bootstrap/bootstrap.css", array('kindler-style'));
	
	wp_enqueue_style('kindler-main-skin', get_template_directory_uri()."/assets/css/main.css", array('bootstrap-style'));
	
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

function kindler_fonts_url() {
    $fonts_url = '';
    
    $revalia	=	_x('on', 'Revalia font: on or off', 'kindler');
    
    $cabin = _x('on', 'Cabin font: on or off', 'kindler');

	if ( 'off' !== $cabin || 'off' !== $revalia ) {
	    $font_families = array();
		    
	    if ('off' !== $cabin ) {
		    $font_families[] = 'Cabin:300,400,700';
	    }
	    
	    if ('off' !== $revalia ) {
		    $font_families[] = 'Revalia:400';
	    }
	    
		$query_args = array(
		    'family' => urlencode( implode( '|', $font_families ) ),
		    'subset' => urlencode( 'latin,latin-ext' ),
		);
	}
	
	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
 
    return $fonts_url;
}

function kindler_scripts_styles() {
    wp_enqueue_style( 'kindler-fonts', kindler_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'kindler_scripts_styles' );

/**
 *	Function for customizing the comments. This function will overrid the one in WordPress Core.
**/

function kindler_comment($comment, $args, $depth) {
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $GLOBALS['comment'], $args['avatar_size'] ); ?>
	<?php printf( __( '<cite class="fn">%s</cite>','kindler' ), get_comment_author_link() ); ?>
	</div>
	<?php if ( $GLOBALS['comment']->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','kindler' ); ?></em>
		<br />
	<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo esc_html( get_comment_link( $GLOBALS['comment']->comment_ID ) ); ?>">
		<?php
			/* translators: 1: date, 2: time */
			printf( '%1$s', get_comment_date('d M') ); ?></a><?php edit_comment_link( __( 'Edit','kindler' ), '  ', '' );
		?>
	</div>

	<?php comment_text(); ?>

	<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}


/**
 *	All the custom CSS codes get loaded from here.
**/
function custom_css() {
	$desc	=	esc_attr( get_theme_mod('header_textcolor', '#ffffff'));
	
	$css1	=	".site-description {
					color: #$desc;	
				}";
	if ( get_theme_mod( 'kindler-sidebar', 'right' ) == 'left' ) {
		$css2	= "#primary {
						float: right;
					}";
	}
	else {
		$css2	= "";
	}
	
	$c1		=	esc_attr(get_theme_mod('title_color'));
	
	$css3	=	".site-title a {
					color: $c1;
				}";
								
	wp_add_inline_style('kindler-main-skin', $css1 . $css2 . $css3);
}

add_action('wp_enqueue_scripts','custom_css');


// retrieves the attachment ID from the file URL
function kindler_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}

function kindler_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo esc_html( mb_substr( $subex, 0, $excut ) );
		} else {
			echo esc_html($subex, 'kindler');
		}
		echo '...';
	} else {
		echo esc_html($excerpt, 'kindler');
	}
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
