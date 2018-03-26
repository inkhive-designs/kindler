<?php
/**
 *	Function for customizing the comments. This function will overrid the one in WordPress Core.
 **/

function kindler_comment($comment, $args, $depth) {
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $GLOBALS['comment'], $args['avatar_size'] ); ?>
        <?php printf( __( '<cite class="fn">%s</cite>','kindler' ), get_comment_author_link() ); ?>
    </div>
    <?php if ( $GLOBALS['comment']->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','kindler' ); ?></em>
        <br />
    <?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo esc_html( get_comment_link( $GLOBALS['comment']->comment_ID ) ); ?>">
            <?php
            /* translators: 1: date, 2: time */
            printf( '%1$s', get_comment_date('d M') ); ?></a><?php edit_comment_link( __( 'Edit','kindler' ), '  ', '' );
        ?>
    </div>

    <?php comment_text(); ?>

    <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
        </div>
    <?php endif; ?>
    <?php
}