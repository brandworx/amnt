<?php
/**
 * Template Name: Events Page
 *
 * @package tim
 */

get_header(); ?>

	<?php get_template_part( 'content', 'header' ); ?>
	<div id="primary" class="content-area full clearfix">
		<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="event-content">
		<?php 
			$numEvents = get_field('num_posts','option');
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			query_posts( array( 'post_type' => 'event', 'meta_key' => 'event_date', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'posts_per_page' => $numEvents, 'paged' => $paged ) );

			if(have_posts()) : ?> 

				<?php while(have_posts()) : the_post(); ?>
				<?php
					$date = get_field('event_date');
					$location = get_field('event_location');
					$city = get_field('event_city');
					$state = get_field('event_state');
					$text = get_field('cta_text');
					$link = get_field('cta_link');
				?>

					<div class="event-entry">
						<?php the_post_thumbnail('event'); ?>
						<div class="event-sum">
							<div id="slash"></div>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<span class="event-meta"><span class="date"><?php echo $date; ?></span><span class="location"> | <?php echo $location; ?></span><span class="city"> | <?php echo $city . ', ' . $state; ?></span></span>
							<?php the_excerpt(); ?>
							<?php if($text && $link){ echo '<a class="button green" href="' . $link . '">' . $text . '</a>'; } ?>
							<a class="button blue" href="<?php the_permalink(); ?>">More Info</a>
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
