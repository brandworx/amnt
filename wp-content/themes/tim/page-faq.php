<?php
/**
 * Template Name: FAQ Page
 *
 * @package tim
 */

get_header(); ?>

	<?php get_template_part( 'content', 'header' ); ?>
	<div id="primary" class="content-area faq clearfix">
		<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">

				<?php

				// check if the repeater field has rows of data
				if( have_rows('questions') ):

				 	// loop through the rows of data
				    while ( have_rows('questions') ) : the_row();

			    ?>

				        <div class="faq-entry">
							<div class="titleHead">
								<h3>Q: <?php the_sub_field('question'); ?></h3>
							</div>
							<?php the_sub_field('answer'); ?>
							<a class="button blue small" href="<?php the_sub_field('cta_link'); ?>"><?php the_sub_field('cta'); ?></a>
						</div>

				<?php
				    endwhile;

				endif;

				wp_reset_query();
				?>

				</div><!-- .entry-content -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="clearfix"></div>

<?php get_footer(); ?>
