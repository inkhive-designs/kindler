<?php
function kindler_customize_register_showcase($wp_customize) {
    /*---- Showcase Area Settings ----*/

    $wp_customize->add_panel(
        'kindler-showcase',
        array(
            'priority'       => 30,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __('Custom Showcase', 'kindler'),
        )
    );

    $wp_customize-> add_section(
        'kindler-showcase-enable',
        array(
            'title'			=> __('Enable/Disable','kindler'),
            'priority'		=> 1,
            'panel'			=> 'kindler-showcase',
        )
    );

    $wp_customize->add_setting(
        'kindler-showcase-blog',
        array(
            'default' => false,
            'sanitize_callback'	=> 'kindler_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'kindler-showcase-blog',
        array(
            'type' => 'checkbox',
            'label' => __('Enable Showcase Area on the Blog Page','kindler'),
            'section' => 'kindler-showcase-enable',
        )
    );

    $wp_customize->add_setting(
        'kindler-showcase-title',
        array(
            'default'	=> '',
            'sanitize_callback'	=> 'kindler_sanitize_text'
        )
    );

    $wp_customize->add_control(
        'kindler-showcase-title',
        array(
            'type'	=> 'text',
            'label'	=> __('Title for the Showcase Area', 'kindler'),
            'section'	=> 'kindler-showcase-enable',
            'active_callback'	=> 'kindler_fa_enable'
        )
    );

    for ( $i = 1 ; $i <= 3 ; $i++ ) :
    $wp_customize->add_section(
        'kindler-showcase'.$i,
        array(
            'title'		=> __('Showcase Item ','kindler').$i,
            'priority'	=> $i,
            'panel'		=> 'kindler-showcase',
            'active_callback'	=> 'kindler_fa_enable'
        )
    );

    $wp_customize->add_setting(
        'kindler-s-img'.$i, array(
            'sanitize_callback'	=> 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'kindler-s-img'.$i,
            array(
                'label' => __('Image Upload ','kindler'),
                'section' => 'kindler-showcase'.$i,
                'settings' => 'kindler-s-img'.$i,
            )
        )
    );

    $wp_customize-> add_setting(
        'kindler-s-title'.$i, array(
            'sanitize_callback'	=> 'kindler_sanitize_text',
        )
    );

    $wp_customize-> add_control(
        'kindler-s-title'.$i, array(
            'label'		=> __('Description','kindler'),
            'section'	=> 'kindler-showcase'.$i,
            'type'		=> 'text',
        )
    );

    $wp_customize-> add_setting(
        'kindler-s-url'.$i, array(
            'sanitize_callback'	=> 'esc_url_raw',
        )
    );

    $wp_customize-> add_control(
        'kindler-s-url'.$i, array(
            'label'		=> __('URL','kindler'),
            'section'	=> 'kindler-showcase'.$i,
            'type'		=> 'text',
        )
    );

    endfor;

    function kindler_fa_enable() {
        if ( get_theme_mod( 'kindler-showcase-blog', false ) ) {
            return true;
        } else {
            return false;
        }
    }
}
add_action('customize_register', 'kindler_customize_register_showcase');