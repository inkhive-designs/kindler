<?php
/**
 * The social icon template of the theme.
 *
 * @package kindler
 */
?>
<?php if ( get_theme_mod( 'social' ) == true ) { ?>

    <div id="social-icons">


	<?php for ($i = 1; $i < 8; $i++) :
        $social = esc_html(get_theme_mod('kindler_social_'.$i));
        if ( ($social != 'none') && ($social != '') ) : ?>
		<a target="_blank" href="<?php echo get_theme_mod('kindler_social_url'.$i); ?>"><i class="fa fa-<?php echo $social; ?> fa-inverse"></i></a>
	<?php endif;
	endfor;
	?>

</div>

<?php } ?>