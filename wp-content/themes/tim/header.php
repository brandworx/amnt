<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package tim
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

<div id="popUp">
	<div id="popWrap">
		<li id="hamburger" class="nav-close open">Close</li>
		<div id="popForm"><?php echo do_shortcode('[ninja_forms_display_form id=5]'); ?></div>
		<div id="popContact">
			<?php 
				$popPhone = get_field('phone_number','option');
				$popEmail = get_field('email','option');
			?>
			<h2>Call Us</h2>
			<a class="button green" href="tel:<?php echo $popPhone; ?>"><?php echo $popPhone; ?></a>
			<h2>Email Us</h2>
			<a class="button blue" href="mailto:<?php echo $popEmail; ?>"><?php echo $popEmail; ?></a>
		</div>
	</div>
</div>

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'tim' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<a id="logo" href="<?php echo bloginfo('url'); ?>"><img src="<?php the_field('logo','option'); ?>" /></a>
		<a id="phone" target="_blank" href="tel:<?php the_field('phone_number','option'); ?>"><?php the_field('phone_number','option'); ?></a>
		<a id="facebook" class="social facebook right" target="_blank" href="<?php the_field('facebook_url','option'); ?>"></a>
		<a id="twitter" class="social twitter right" target="_blank" href="<?php the_field('twitter_url','option'); ?>"></a>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'tim' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
