<?php
/**
 * Template Name: Blog Page
 *
 * @package tim
 */

get_header(); ?>

	<?php get_template_part( 'content', 'header' ); ?>
	<div id="primary" class="content-area full clearfix">
		<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
		<?php 
			$numPosts = get_field('num_posts');

			query_posts( array( 'post_type' => 'post', 'posts_per_page' => $numPosts, 'orderby' => 'date', 'order' => 'DESC' ) );

			if(have_posts()) : ?> 

				<?php while(have_posts()) : the_post(); ?>

					<div class="post-entry">
						<?php the_post_thumbnail('blogThumb', array('class' => 'left')); ?>
						<div class="right">
							<h2><?php the_title(); ?></h2>
							<p><?php the_excerpt(); ?></p>
							<a class="button green" href="<?php the_permalink(); ?>">Read More</a>
						</div>
					</div>

				<?php endwhile; // end of the loop. ?>

			<?php the_posts_navigation(); ?>

			<div class="clearfix"></div>

			<?php endif; 

			wp_reset_query();
			?>

				</div><!-- .entry-content -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="clearfix"></div>

<?php get_footer(); ?>
