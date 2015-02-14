<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package tim
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div id="footer-bar">
			<?php dynamic_sidebar( 'footer-bar' ); ?>
		</div>
		<div id="footer-widgets">
			<div id="footer-widgets-container">
				<?php dynamic_sidebar( 'footer-1' ); ?>
				<?php dynamic_sidebar( 'footer-2' ); ?>
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
		</div>

		<div id="site-info">
			<div id="aboutSocial">
				<a class="social facebook" target="_blank" href="<?php the_field('facebook_url','option'); ?>"></a>
				<a class="social twitter" target="_blank" href="<?php the_field('twitter_url','option'); ?>"></a>
			</div>
			<div class="site-info">
				Developed by <a href="//brandworxmedia.com/">BrandWorx Web Design</a>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
