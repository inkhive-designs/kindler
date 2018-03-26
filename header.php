<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> sections and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kindler
 */

?>
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kindler' ); ?></a>

	<?php get_template_part('modules/social/social', 'fa');	?>

    <?php get_template_part('modules/header/masthead'); ?>

    <?php get_template_part('modules/navigation/menu', 'primary'); ?>

    <?php get_template_part('framework/featured-components/showcase'); ?>

    <div id="content" class="site-content container">

        <?php get_template_part('framework/featured-components/post','featured'); ?>

