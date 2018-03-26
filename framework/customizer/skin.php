<?php
function kindler_customize_register_skin($wp_customize) {
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_control( 'header_textcolor' )->priority  = 10;
    $wp_customize->get_control( 'header_textcolor' )->label		= 'Site Description Color';
    $wp_customize->get_section( 'colors' )->panel = 'kindler_design_panel';

    $wp_customize->add_setting('title_color', array(
            'default'		=>	'black',
            'sanitize_callback'	=>	'sanitize_hex_color',
            'transport'		=>	'postMessage',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'title_color', array(
                'label'		=> 'Site Title Color',
                'section'	=> 'colors',
                'settings'	=> 'title_color',
                'priority'	=> 1
            )
        )
    );
}
add_action('customize_register', 'kindler_customize_register_skin');