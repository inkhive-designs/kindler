<?php
/**
 *
 *	Featured Posts area of the theme.
 *
 **/
?>
		<div id="fp-wrapper" class="container">
			<h1 class="fp-title"><?php _e('FEATURED POSTS','kindler'); ?></h1>
				<ul id="kindler-fp">	
					<?php 
						$args	=	array(
							'post_type'	=> 'post',
							'cat'	=> esc_html( get_theme_mod('kindler_category_select', 0)),
							'posts_per_page'	=> 3,
							'ignore_sticky_posts'=> 1,
						);
						$loop	= new WP_Query($args);
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<li class="fp-wrapper col-md-4 col-sm-4 col-xs-12">
								<div class="fp-thumb">
									<?php if ( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('kindler-fp-thumb'); ?></a>
									<?php else : ?>
										<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri() . '/images/dthumb-fp.jpg'; ?>"></a>
									<?php endif; ?>
									<div class="hexagon"></div>
									<div class="fp-title">
									<?php 
								if (strlen(get_the_title()) >= 30) { ?>
									<h1 class="entry-title">
										<a href="<?php the_permalink(); ?>" data-title="<?php esc_attr(get_the_title()); ?>" rel="bookmark">
											<?php echo esc_attr(substr(get_the_title(), 0, 29))."...";
										} else { ?>
											<h1 class="entry-title"><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark">
										<?php	the_title_attribute();	
											}	
												 ?>
										</a>
									</h1>
								</div>
								</div>
							</li>
						<?php endwhile; ?>
						
				</ul>
		</div>
				


