<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function kindler_custom_css_mods() {

    echo "<style id='custom-css-mods'>";

    if ( get_theme_mod('kindler_title_font') ) :
        echo ".title-font, h1, h2, .sections-title { font-family: ".esc_html(get_theme_mod('kindler_title_font','Revalia'))."; }";
    endif;

    if ( get_theme_mod('title_color') ) :
        echo "#masthead h1.site-title a, #masthead.other .site-branding h1.site-title a { color: ".esc_html(get_theme_mod('kindler_site_titlecolor', 'black'))."; }";
    endif;


    if ( get_theme_mod('header_textcolor') ) :
        echo "#masthead h2.site-description, #masthead.other .site-branding h2.site-description { color: #".esc_html(get_theme_mod('header_textcolor','404040'))."; }";
    endif;

    if ( !display_header_text() ) :
        echo "#masthead .site-branding #text-title-desc { display: none; }";
        echo "#masthead-2 .site-branding #text-title-desc { display: none; }";
    endif;

    if ( get_theme_mod( 'kindler-sidebar', 'right' ) == 'left' ) {
        echo "#primary {
						float: right;
					}";
    }
    else {
        echo "";
    }


    echo "</style>";
}

add_action('wp_head', 'kindler_custom_css_mods');