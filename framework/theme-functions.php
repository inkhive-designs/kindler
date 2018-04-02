<?php
/*
 * @package kindler, Copyright Rohit Tripathi, rohitink.com
 * This file contains Custom Theme Related Functions.
 */

//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/admin_styles.php';
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';
require get_template_directory() . '/framework/admin_modules/comments.php';
require get_template_directory() . '/framework/admin_modules/excerpt_length.php';

// retrieves the attachment ID from the file URL
function kindler_get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
    return $attachment[0];
}

/*
** Function to check if Sidebar is enabled on Current Page 
*/

function kindler_load_sidebar() {
    $load_sidebar = true;
    if ( get_theme_mod('kindler_disable_sidebar') ) :
        $load_sidebar = false;
    elseif( get_theme_mod('kindler_disable_sidebar_home') && is_home() )	:
        $load_sidebar = false;
    elseif( get_theme_mod('kindler_disable_sidebar_front') && is_front_page() ) :
        $load_sidebar = false;
    endif;

    return  $load_sidebar;
}

/*
**	Determining Sidebar and Primary Width
*/
function kindler_primary_class() {
    $sw = get_theme_mod('kindler_sidebar_width',4);
    $class = "col-md-".(12-$sw);

    if ( !kindler_load_sidebar() )
        $class = "col-md-12";

    echo $class;
}
add_action('kindler_primary-width', 'kindler_primary_class');

function kindler_secondary_class() {
    $sw = get_theme_mod('kindler_sidebar_width',4);
    $class = "col-md-".$sw;

    echo $class;
}
add_action('kindler_secondary-width', 'kindler_secondary_class');


/*
** Function to Get Theme Layout 
*/
function kindler_get_blog_layout(){
    $ldir = 'framework/layouts/content';
    if (get_theme_mod('kindler_blog_layout') ) :
        get_template_part( $ldir , get_theme_mod('kindler_blog_layout') );
    else :
        get_template_part( $ldir ,'grid');
    endif;
}
add_action('kindler_blog_layout', 'kindler_get_blog_layout');
