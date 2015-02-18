<?php
/**
 * @package tim
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<h4><?php the_field('event_city'); ?>, <?php the_field('event_state'); ?> - <?php the_field('event_date'); ?></h4>
		<?php the_content(); ?>
		<?php 
			$text = get_field('cta_text');
			$link = get_field('cta_link');
		
			if($text && $link){ 
				echo '<a class="button green" href="' . $link . '">' . $text . '</a>'; 
			} 

		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'tim' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
