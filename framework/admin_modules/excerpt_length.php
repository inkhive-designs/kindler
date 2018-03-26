<?php
function kindler_excerpt_max_charlength($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;

    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            echo esc_html( mb_substr( $subex, 0, $excut ) );
        } else {
            echo esc_html($subex, 'kindler');
        }
        echo '...';
    } else {
        echo esc_html($excerpt, 'kindler');
    }
}
