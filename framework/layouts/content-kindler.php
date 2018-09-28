<?php
/**
 * @package kindler
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('kindler col-md-12 col-sm-12 col-xs-12'); ?>>

    <div class="featured-image col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('kindler-home-thumb'); ?></a>
        <?php else: ?>
            <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( get_stylesheet_directory_uri()."/assets/images/dthumb.jpg" ); ?>"></a>
        <?php endif; ?>
    </div>

    <div class="entry-content col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <header class="entry-header">
            <h1 class="entry-title">
                <a href="<?php the_permalink() ?>" rel="bookmark">
                    <?php the_title(); ?>
                </a>
            </h1>
        </header><!-- .entry-header -->
        <?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-meta">
                <?php kindler_posted_on_date(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
        <div class="excerpt">
            <i class="fa fa-star" aria-hidden="true"></i>
        	<div class="entry-excerpt"><?php echo substr(get_the_excerpt(),0,50).(get_the_excerpt() ? "..." : "" ); ?></div>
        </div>
        <a href="<?php the_permalink(); ?>" class="more-link"><?php _e('READ MORE','kindler'); ?></a>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kindler' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->