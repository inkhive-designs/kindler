<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kindler
 */

?>

	</div><!-- #content -->
	<div id="footer-wrapper">
		<?php get_template_part('modules/social/social', 'fa'); ?>

        <?php get_sidebar('footer'); ?>

        <footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( 'https://wordpress.org/', 'kindler' ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'kindler' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme %1$s by %2$s.', 'kindler' ), 'Kindler', '<a href="http://www.divjot.co/" rel="designer">Divjot Singh</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
