<?php
/**
 * @package kindler
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="featured-image col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<?php if (has_post_thumbnail()) : ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('kindler-home-thumb'); ?></a>
	<?php else: ?>	
		<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( get_stylesheet_directory_uri()."/images/dthumb.jpg" ); ?>"></a>
	<?php endif; ?>	
	</div>

	<div class="entry-content col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<header class="entry-header">
		<h1 class="entry-title">
			<a href="<?php the_permalink() ?>">
				<?php
				$thetitle = $post->post_title; /* or you can use get_the_title() */
				$getlength = strlen($thetitle);
				$thelength = 35;
				echo esc_html(substr($thetitle, 0, $thelength) );
				if ($getlength > $thelength) echo "...";
				?>
			</a>
		</h1>
	</header><!-- .entry-header -->
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php kindler_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php
			/* translators: %s: Name of current post */
			kindler_excerpt_max_charlength(150); ?>
			<br>
			<a href="<?php the_permalink(); ?>" class="more-link"><?php _e('READ MORE','kindler'); ?></a>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kindler' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->