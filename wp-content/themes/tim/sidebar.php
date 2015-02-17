<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package tim
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<aside id="recentPosts" class="widget">
		<h1 class="widget-title">Upcoming Events</h1>
		<?php 
		$events = array(
			'post_type' => 'event',
			'posts_per_page' => 5
		);

		$eventsQuery = new WP_Query($events);
		if($eventsQuery->have_posts()) : while($eventsQuery->have_posts()) : $eventsQuery->the_post();
		?>
			<div class="event-small">
				<?php the_post_thumbnail('eventSmall', array('class' => 'alignleft')); ?>
				<h5 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<span><?php the_field('event_city'); ?>, <?php the_field('event_state'); ?> - <?php the_field('event_date'); ?></span>
			</div>
		<?php 
		endwhile; endif;
		?>
	</aside>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
