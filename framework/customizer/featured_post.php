<?php
function kindler_customize_register_fpost($wp_customize) {
    //---- Featured Posts Area ----//
    $wp_customize->add_section(
        'kindler-fp',
        array(
            'title'	=> __('Featured Posts Area', 'kindler'),
            'priority'	=> 40
        )
    );

    $wp_customize->add_setting(
        'kindler-fp-enable',
        array(
            'default' => false,
            'sanitize_callback'	=> 'kindler_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'kindler-fp-enable',
        array(
            'type' => 'checkbox',
            'label' => __('Enable Featured Posts on the Home Page','kindler'),
            'section' => 'kindler-fp',
        )
    );

    function kindler_fp_enable() {
        if ( get_theme_mod( 'kindler-fp-enable', false ) ) {
            return true;
        } else {
            return false;
        }
    }

    $wp_customize->add_setting(
        'kindler-fp-title',
        array(
            'default'	=> '',
            'sanitize_callback'	=> 'kindler_sanitize_text'
        )
    );

    $wp_customize->add_control(
        'kindler-fp-title',
        array(
            'type'	=> 'text',
            'label'	=> __('Title for the Featured Posts Area', 'kindler'),
            'section'	=> 'kindler-fp-enable',
            'active_callback'	=> 'kindler_fp_enable'
        )
    );

    $wp_customize-> add_setting(
        'kindler_category_select',
        array(
            'sanitize_callback'	=> ''
        )
    );

    $wp_customize->add_control(
        new Kindler_WP_Customize_Category_Control(
            $wp_customize,
            'kindler_category_select',
            array(
                'label'		=> __('Select a Category for Featured Posts','kindler'),
                'section' 	=> 'kindler-fp',
                'settings'	=> 'kindler_category_select',
                'active_callback'	=> 'kindler_fp_enable'
            )
        )
    );
}
add_action('customize_register', 'kindler_customize_register_fpost');