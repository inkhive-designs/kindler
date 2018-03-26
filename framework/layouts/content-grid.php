<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kindler
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12 col-md-12'); ?>>
		<div class="featured-home col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<?php if ( has_post_thumbnail() ): ?>
			<a href="<?php the_permalink(); ?>"><?php 
				echo the_post_thumbnail('kindler-home-thumb'); ?></a>
			<?php else: ?>	
		<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( get_stylesheet_directory_uri()."/assets/images/dthumb.jpg" ); ?>"></a>
	<?php endif; ?>	
		</div>
		<div class="entry-content col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<i class="fa fa-star" aria-hidden="true"></i>
		</div>
</article>