<?php
function kindler_customize_register_layouts($wp_customize) {
    $wp_customize->get_section('background_image')->panel = 'kindler_design_panel';

    $wp_customize-> add_panel('kindler_design_panel', array(
        'title' => __('Design & Layouts'),
        'priority' => '50'
    ));

    $wp_customize-> add_section(
        'kindler_basic_settings',
        array(
            'title'		=> __('Basic Settings', 'kindler'),
            'priority'	=> 5,
            'panel' => 'kindler_design_panel'
        )
    );

    $wp_customize-> add_setting(
        'kindler_featured_thumb',
        array(
            'default'			=> true,
            'sanitize_callback'	=> 'kindler_sanitize_checkbox',
        )
    );

    $wp_customize-> add_control(
        'kindler_featured_thumb',
        array(
            'type'		=> 'checkbox',
            'label'		=> __('Show Featured Image in the Posts', 'kindler'),
            'section'	=> 'kindler_basic_settings',
        )
    );

    $wp_customize->add_section(
        'kindler_design_options',
        array(
            'title'     => __('Blog Layout','kindler'),
            'priority'  => 0,
            'panel'     => 'kindler_design_panel'
        )
    );


    $wp_customize->add_setting(
        'kindler_blog_layout',
        array( 'sanitize_callback' => 'kindler_sanitize_blog_layout' )
    );

    function kindler_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('grid', 'grid_2_column', 'grid_3_column', 'kindler') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'kindler_blog_layout',array(
            'label' => __('Select Layout','kindler'),
            'description' => __('Use 3 Column Layouts, only after disabling sidebar for the page.','kindler'),
            'settings' => 'kindler_blog_layout',
            'section'  => 'kindler_design_options',
            'type' => 'select',
            'choices' => array(
                'grid' => __('Standard Blog Layout','kindler'),
                'grid_2_column' => __('Grid - 2 Column','kindler'),
                'grid_3_column' => __('Grid - 3 Column','kindler'),
                'kindler' => __('Kindler Theme Layout','kindler'),
            )
        )
    );
    
    $wp_customize->add_section(
        'kindler_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','kindler'),
            'priority'  => 10,
            'panel'     => 'kindler_design_panel'
        )
    );
    
    $wp_customize-> add_setting(
        'kindler-sidebar',
        array(
            'default'			=> 'right',
            'sanitize_callback'	=> 'kindler_sanitize_select'

        )
    );

    $wp_customize->add_control(
        'kindler-sidebar',
        array(
            'type' => 'radio',
            'label' => __('Sidebar Layout', 'kindler'),
            'description'	=> __('Select the sidebar orientation for the site', 'kindler'),
            'section' => 'kindler_sidebar_options',
            'choices' => array(
                'left' => 'Left',
                'right' => 'Right',
            ),
        )
    );

    $wp_customize->add_setting(
        'kindler_disable_sidebar',
        array( 'sanitize_callback' => 'kindler_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'kindler_disable_sidebar', array(
            'settings' => 'kindler_disable_sidebar',
            'label'    => __( 'Disable Sidebar Everywhere.','kindler' ),
            'section'  => 'kindler_sidebar_options',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'kindler_disable_sidebar_home',
        array( 'sanitize_callback' => 'kindler_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'kindler_disable_sidebar_home', array(
            'settings' => 'kindler_disable_sidebar_home',
            'label'    => __( 'Disable Sidebar on Home/Blog.','kindler' ),
            'section'  => 'kindler_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'kindler_show_sidebar_options',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'kindler_disable_sidebar_front',
        array( 'sanitize_callback' => 'kindler_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'kindler_disable_sidebar_front', array(
            'settings' => 'kindler_disable_sidebar_front',
            'label'    => __( 'Disable Sidebar on Front Page.','kindler' ),
            'section'  => 'kindler_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'kindler_show_sidebar_options',
            'default'  => false
        )
    );


    $wp_customize->add_setting(
        'kindler_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'absint' )
    );

    $wp_customize->add_control(
        'kindler_sidebar_width', array(
            'settings' => 'kindler_sidebar_width',
            'label'    => __( 'Sidebar Width','kindler' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','kindler'),
            'section'  => 'kindler_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'kindler_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function kindler_show_sidebar_options($control) {

        $option = $control->manager->get_setting('kindler_disable_sidebar');
        return $option->value() == false ;

    }

    function kindler_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }
}
add_action('customize_register', 'kindler_customize_register_layouts');