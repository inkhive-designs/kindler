<?php
/**
 * The social icon template of the theme.
 *
 * @package kindler
 */
?>

<div id="social-icons">
	
	<?php 
	$s = array(
				"facebook",
				"twitter",
				"google-plus",
				"instagram",
				"youtube",
				"linkedin",
				"pinterest-p",
				"vimeo",
				"envelope-o",
				"tumblr",
				"stumbleupon",
				"reddit-alien",
				"vine",
				"soundcloud",
				"yelp"
			  );
			  
	$t = array(
				"Facebook",
				"Twitter",
				"Google Plus",
				"Instagram",
				"Youtube",
				"Linked In",
				"Pinterest",
				"Vimeo",
				"Mail",
				"Tumblr",
				"StumbleUpon",
				"Reddit",
				"Vine",
				"SoundCloud",
				"Yelp"
			);
			  
	for($u = 0; $u < 14; $u++) {
		if (get_theme_mod($s[$u])) {
	?>
		<a target="_blank" href="<?php echo get_theme_mod($s[$u]); ?>" title="<?php echo $t[$u] ?>"><i class="fa fa-<?php echo $s[$u] ?> fa-inverse"></i></a>
	<?php }
	}
	?>

</div>