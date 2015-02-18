<?php
/**
 * Template Name: Testimonials Page
 *
 * @package tim
 */

get_header(); ?>

	<?php get_template_part( 'content', 'header' ); ?>
	<div id="primary" class="content-area testimonials clearfix">
		<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
		<?php 
			$numPosts = get_field('num_posts');
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$posts = array(
				'post_type' => 'testimonial',
				'meta_key' => 'order',
				'orderby' => 'meta_value_num',
				'order' => 'ASC',
				'posts_per_page' => $numPosts,
				'paged' => $paged
			);

			$postsQuery = new WP_Query($posts);

			if($postsQuery->have_posts()) : ?> 

				<?php while($postsQuery->have_posts()) : $postsQuery->the_post(); 

				$face = get_field('person_image');
				$company = get_field('company');
				$testimonial = get_field('testimonial');

				$titleBG = get_field('title_bg');
				// thumbnail
				$faceSize = 'thumbnail';
				$faceThumb = $face['sizes'][ $faceSize ];

				?>

					<div class="testimonial-entry">
						<div class="titleHead">
							<img class="face" src="<?php echo $faceThumb; ?>" />
							<h3><?php the_title(); ?><?php echo ' | ' . $company; ?></h3>
						</div>
						<?php echo $testimonial; ?>
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
