<?php
function kindler_customize_register_google_fonts($wp_customize) {
    $wp_customize->add_section(
        'kindler_typo_options',
        array(
            'title'     => __('Google Web Fonts','kindler'),
            'priority'  => 44,
            'panel' => 'kindler_design_panel'
        )
    );

    $font_array = array('Revalia','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora');
    $fonts = array_combine($font_array, $font_array);

    $wp_customize->add_setting(
        'kindler_title_font',
        array(
            'default'=> 'Revalia',
            'sanitize_callback' => 'kindler_sanitize_gfont'
        )
    );

    function kindler_sanitize_gfont( $input ) {
        if ( in_array($input, array('Revalia','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'kindler_title_font',array(
            'label' => __('Title','kindler'),
            'settings' => 'kindler_title_font',
            'section'  => 'kindler_typo_options',
            'type' => 'select',
            'choices' => $fonts,
        )
    );
}
add_action('customize_register', 'kindler_customize_register_google_fonts');