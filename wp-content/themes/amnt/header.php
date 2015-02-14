<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage amnt
 * @since amnt 1.0
 */
global $pop_options;
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="UTF-8"> 

<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>

<meta name="robots" content="index,follow" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="canonical" href="<?php bloginfo('url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />

<!-- FEED -->

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="stylesheet" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" /> <!--Load CSS-->

<!-- fonts -->
<script type="text/javascript" src="//use.typekit.net/dtp2twi.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<!-- jQuery -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.matchHeight-min.js"></script>

<script>
$(document).ready(function($) {
    //$('#nf_submit_2').prepend('<div class="submit-bg"></div>');
	
	$('.mobile-nav').click(function(){
		$('.menu-mobile-menu-container').toggle('slow');
	});
	
	$('.content, #sidebar').matchHeight(false);
	
	if($(window).width() >= 880){
		$('.third').matchHeight(false);
	}
	
	if($(window).width() <= 800){
		$('.expand-content').click(function(){
			$('p.toggle-text').toggle();
		});
	}
	
});
</script>


<?php wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>

</head>

<body>
    <div id="page" class="hfeed site">
		<?php if(!is_front_page()) { ?>
		<header class="section dark">
			<div id="header-wrap" class="container up">
				<a id="logo" href="<?php bloginfo('url'); ?>"><img class="inline" src="<?php the_field('logo','options'); ?>" /></a>
				<div class="mobile-nav hide">
					<img src="<?php bloginfo('template_url'); ?>/images/menu-icon.png" />
				</div>
				<div id="nav" class="menu-wrap inline">
					<?php wp_nav_menu( array('menu' => 'Mobile Menu' )); ?>
					<?php wp_nav_menu( array('menu' => 'Primary Menu' )); ?>
				</div>
			</div>
		</header>
		<?php } ?>
        <div id="main" class="clearfix site-main">
			