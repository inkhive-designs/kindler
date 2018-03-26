<?php
function kindler_customize_register_misc_scripts($wp_customize){
    $wp_customize->add_section(
        'kindler_sec_pro',
        array(
            'title'     => __('Important Links','kindler'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'kindler_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new WP_Customize_Upgrade_Control(
            $wp_customize,
            'kindler_pro',
            array(
                'description'	=> '<a class="kindler-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'kindler').'</a>
                                    <a class="kindler-important-links" href="https://inkhive.com/documentation/kindler" target="_blank">'.__('Kindler Documentation', 'kindler').'</a>
                                    <a class="kindler-important-links" href="https://demo.inkhive.com/kindler-plus/" target="_blank">'.__('Kindler Plus Live Demo', 'kindler').'</a>
                                    <a class="kindler-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'kindler').'</a>
                                    <a class="kindler-important-links" href="https://wordpress.org/support/theme/kindler/reviews" target="_blank">'.__('Review Kindler on WordPress', 'kindler').'</a>',
                'section' => 'kindler_sec_pro',
                'settings' => 'kindler_pro',
            )
        )
    );
}
add_action('customize_register', 'kindler_customize_register_misc_scripts');