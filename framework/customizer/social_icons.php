<?php
function kindler_customize_register_social($wp_customize) {
    $wp_customize-> add_section(
        'kindler_social',
        array(
            'title'			=> __('Social Icons', 'kindler'),
            'description'	=> __('Manage the Social Icon Setings of your site.', 'kindler'),
            'priority'		=> 20,
            'panel'         => 'kindler_header_panel'
        )
    );

    $wp_customize-> add_setting(
        'social',
        array(
            'default'			=> false,
            'sanitize_callback'	=> 'kindler_sanitize_checkbox',
        )
    );
    
    $wp_customize-> add_control(
        'social',
        array(
            'type'		=> 'checkbox',
            'label'		=> __('Enable Social Icons', 'kindler'),
            'section'	=> 'kindler_social',
            'priority'	=> 1,
        )
    );

    $social_networks = array( //Redefinied in Sanitization Function.
        'none' => __('-','kindler'),
        'facebook' => __('Facebook','kindler'),
        'twitter' => __('Twitter','kindler'),
        'google-plus' => __('Google Plus','kindler'),
        'instagram' => __('Instagram','kindler'),
        'rss' => __('RSS Feeds','kindler'),
        'vine' => __('Vine','kindler'),
        'vimeo-square' => __('Vimeo','kindler'),
        'youtube' => __('Youtube','kindler'),
        'flickr' => __('Flickr','kindler'),
    );

    $social_count = count($social_networks);

    for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

        $wp_customize->add_setting(
            'kindler_social_'.$x, array(
            'sanitize_callback' => 'kindler_sanitize_social',
            'default' => 'none'
        ));

        $wp_customize->add_control( 'kindler_social_'.$x, array(
            'settings' => 'kindler_social_'.$x,
            'label' => __('Icon ','kindler').$x,
            'section' => 'kindler_social',
            'type' => 'select',
            'choices' => $social_networks,
        ));

        $wp_customize->add_setting(
            'kindler_social_url'.$x, array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control( 'kindler_social_url'.$x, array(
            'settings' => 'kindler_social_url'.$x,
            'description' => __('Icon ','kindler').$x.__(' Url','kindler'),
            'section' => 'kindler_social',
            'type' => 'url',
            'choices' => $social_networks,
        ));

    endfor;

    function kindler_sanitize_social( $input ) {
        $social_networks = array(
            'none' ,
            'facebook',
            'twitter',
            'google-plus',
            'instagram',
            'rss',
            'vine',
            'vimeo-square',
            'youtube',
            'flickr'
        );
        if ( in_array($input, $social_networks) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'kindler_customize_register_social');