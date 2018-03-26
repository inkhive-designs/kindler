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
}
add_action('customize_register', 'kindler_customize_register_layouts');