<?php
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