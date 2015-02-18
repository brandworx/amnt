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
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$posts = array(
				'post_type' => 'post',
				'orderby' => 'date',
				'order' => 'ASC',
				'posts_per_page' => $numPosts,
				'paged' => $paged
			);

			$postsQuery = new WP_Query($posts);
			if($postsQuery->have_posts()) : ?> 

				<?php while($postsQuery->have_posts()) : $postsQuery->the_post(); ?>

					<div class="post-entry">
						<?php the_post_thumbnail('blogThumb', array('class' => 'left')); ?>
						<div class="right">
							<h2><?php the_title(); ?></h2>
							<p><?php the_excerpt(); ?></p>
							<a class="button green" href="<?php the_permalink(); ?>">Read More</a>
						</div>
					</div>

				<?php endwhile; // end of the loop. ?>

			<div class="clearfix"></div>
			<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

			<?php endif; ?>

				</div><!-- .entry-content -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="clearfix"></div>

<?php get_footer(); ?>
