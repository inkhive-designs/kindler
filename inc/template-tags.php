<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package kindler
 */
 
 if ( ! function_exists( 'kindler_pagination' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function kindler_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array',
	    'prev_text' => '',
	    'next_text' => ''
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<div class="pagination container" align="center"><ul>';
	            foreach ( $page_format as $page ) {
	                   echo '<li>' . wp_kses( $page, array(
	                   									'span'	=> array('class'	=> array() ),
	                   									'a'		=> array('href'		=> array(),
	                   													 'class'	=> array() )
	                   								) ) . '</li>';
	            }
	           echo '</ul></div>';
	}
}endif;

if ( ! function_exists( 'kindler_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function kindler_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		'%s',
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'kindler' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

function kindler_posted_on_date() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'F j, Y' ) ),
        esc_html( get_the_date('F j, Y') ),
        esc_attr( get_the_modified_date( 'F j, Y' ) ),
        esc_html( get_the_modified_date('F j, Y') )
    );

    $posted_on = sprintf(
        '%s',
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span>';

}

if ( ! function_exists( 'kindler_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function kindler_entry_footer() {
	global $wp_query;
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'kindler' ) );
		if ( $categories_list && kindler_categorized_blog() ) {
			$post = $wp_query->post;
			$cat = wp_get_post_terms( $post->ID, 'category' );
			$count	= count( $cat );
			if ( $count > 1 ) {
				printf( '<span class="cat-links col-lg-6 col-md-6 col-sm-6 col-xs-12"><span class="text">' . __("CATEGORIES", "kindler") . '</span>' . '%1$s' . '</span>', $categories_list ); // WPCS: XSS OK.
			}
			else {
				printf( '<span class="cat-links col-lg-6 col-md-6 col-sm-6 col-xs-12"><span class="text">' . __("CATEGORIES", "kindler") . '</span>' . '%1$s' . '</span>', $categories_list ); // WPCS: XSS OK.	
			}
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'kindler' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links col-lg-5 col-md-5 col-sm-5 col-xs-12"><span class="text"> ' . _e("TAGS", "kindler") . '</span>' . '%1$s' . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'kindler' ), esc_html__( '1 Comment', 'kindler' ), esc_html__( '% Comments', 'kindler' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'kindler' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function kindler_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'kindler_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'kindler_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so kindler_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so kindler_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in kindler_categorized_blog.
 */
function kindler_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'kindler_categories' );
}
add_action( 'edit_category', 'kindler_category_transient_flusher' );
add_action( 'save_post',     'kindler_category_transient_flusher' );
