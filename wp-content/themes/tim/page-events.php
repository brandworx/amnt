<?php
/**
 * Template Name: Events Page
 *
 * @package tim
 */

get_header(); ?>

	<?php get_template_part( 'content', 'header' ); ?>
	<div id="primary" class="content-area full">
		<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="event-content">
		<?php 
			$numEvents = get_field('num_events_sidebar','option');
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$events = array(
				'post_type' => 'event',
				'posts_per_page' => $numEvents,
				'paged' => $paged
			);

			$eventsQuery = new WP_Query($events);
			if($eventsQuery->have_posts()) : ?> 

				<?php while($eventsQuery->have_posts()) : $eventsQuery->the_post(); ?>
				<?php
					$date = get_field('event_date');
					$location = get_field('event_location');
					$city = get_field('event_city');
					$state = get_field('event_state');
				?>

					<div class="event-entry">
						<?php the_post_thumbnail('event'); ?>
						<div class="event-sum">
							<div id="slash"></div>
							<h4><?php the_title(); ?></h4>
							<span class="event-meta"><?php echo $date; ?> | <?php echo $location; ?> | <?php echo $city . ', ' . $state; ?></span>
						</div>
					</div>

				<?php endwhile; // end of the loop. ?>

			<div class="clearfix"></div>
			<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

			<?php endif; ?>

				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php tim_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="clearfix"></div>

<?php get_footer(); ?>
