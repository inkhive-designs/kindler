<?php
function kindler_customize_register_header_settings($wp_customize) {
    $wp_customize->get_section('header_image')->panel = 'kindler_header_panel';
    $wp_customize->get_section('title_tagline')->panel = 'kindler_header_panel';

    $wp_customize->add_panel('kindler_header_panel', array(
        'title' => __('Header Settings', 'kindler'),
        'priority' => 20,
    ));
}
add_action('customize_register', 'kindler_customize_register_header_settings');