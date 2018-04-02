<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kindler
 */

if (is_front_page() && has_header_image() ) :
	get_header('home');
else :
	get_header(); 
endif; ?>

	<div id="primary" class="content-area <?php do_action('kindler_primary-width') ?>">
        <?php if ( is_home() ) : ?>
            <div class="section-title"><span><?php echo get_theme_mod('kindler_blog_title',__('RECENT ARTICLES','kindler')); ?></span></div> <?php
        endif; ?>
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

                <?php
                /* Include the Post-Format-specific template for the content.
                 */
                do_action('kindler_blog_layout');

                ?>

			<?php endwhile; ?>

			<?php kindler_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'modules/content/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
