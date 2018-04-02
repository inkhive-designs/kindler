<?php
function kindler_customize_register_sanitization($wp_customize) {

    function kindler_sanitize_checkbox( $i ) {
        if ( $i == 1 ) {
            return 1;
        }
        else {
            return '';
        }
    }

    function kindler_sanitize_select( $input ) {
        $valid = array(
            'left'  => 'Left',
            'right' => 'Right',
        );

        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }
}
add_action('customize_register', 'kindler_customize_register_sanitization');