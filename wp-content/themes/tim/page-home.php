<?php
/**
 * Template Name: Home Page
 *
 * @package tim
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div id="featured">
				<?php
					$video = get_field('video','option');
					$videoBG = get_field('video_bg','option');
					// thumbnail
					$videoSize = 'slide-thumb';
					$videoThumb = $videoBG['sizes'][ $videoSize ];
				
					if(!$video){
						echo '<div id="play"></div>';
						echo '<img src="' . $videoThumb . '" />';
					} else {
						echo '<div class="videoWrapper">';
						echo $video;
						echo '</div>';
						echo '<div id="play"></div>';
					}
				?>
			</div>

			<div id="hireTim">
				<?php
					$hireTitle = get_field('hire_tim_title','option');
					$hireCta1 = get_field('cta_1_text','option');
					$hireCta2 = get_field('cta_2_text','option');
					$hireLink1 = get_field('cta_1_link','option');
					$hireLink2 = get_field('cta_2_link','option');

					if($hireTitle){
						echo '<h2>' . $hireTitle . '</h2>';
					}  
					if($hireCta1 && $hireLink1){
						echo '<a class="button green" href="' . $hireLink1 . '">' . $hireCta1 . '</a>';
					}
					if($hireCta2 && $hireLink2){
						echo '<a class="button blue" href="' . $hireLink2 . '">' . $hireCta2 . '</a>';
					}
				?>
			</div>

			<!-- START PARALLAX SECTION -->
			<?php
				$pLax1 = get_field('parallax_1','option');
				$pLax1Y = get_field('parallax_1_y','option');

				if($pLax1){
					echo '<section id="parallax-1" class="movement" data-speed="4" data-offsety="' . $pLax1Y . '" data-type="background"></section>';
				} 
			?>
			<!-- END PARALLAX SECTION -->

			<div id="testimonials">
				<div id="tesimonials-inner">
					<?php 
						$testOneImage = get_field('testimonial_1_image','option');
						$testTwoImage = get_field('testimonial_2_image','option');
						$testThreeImage = get_field('testimonial_3_image','option');

						// thumbnail
						$testimonialThumbSize = 'testimonial-thumb';
						$testOneThumb = $testOneImage['sizes'][ $testimonialThumbSize ];
						$testTwoThumb = $testTwoImage['sizes'][ $testimonialThumbSize ];
						$testThreeThumb = $testThreeImage['sizes'][ $testimonialThumbSize ];

					?>
					<div class="testimonial">
						<div class="headshot">
							<img src="<?php echo $testOneThumb; ?>" />
							<div class="headshot-text">
								<h4><?php the_field('testimonial_1_name','option'); ?></h4>
								<h6><?php the_field('testimonial_1_title','option'); ?></h6>
							</div>
						</div>
						<p>"<?php the_field('testimonial_1_text','option'); ?>"</p>
					</div>
					<div class="testimonial">
						<div class="headshot">
							<img src="<?php echo $testTwoThumb; ?>" />
							<div class="headshot-text">
								<h4><?php the_field('testimonial_2_name','option'); ?></h4>
								<h6><?php the_field('testimonial_2_title','option'); ?></h6>
							</div>
						</div>
						<p>"<?php the_field('testimonial_2_text','option'); ?>"</p>
					</div>
					<div class="testimonial">
						<div class="headshot">
							<img src="<?php echo $testThreeThumb; ?>" />
							<div class="headshot-text">
								<h4><?php the_field('testimonial_3_name','option'); ?></h4>
								<h6><?php the_field('testimonial_3_title','option'); ?></h6>
							</div>
						</div>
						<p>"<?php the_field('testimonial_3_text','option'); ?>"</p>
					</div>
				</div>
			</div>

			<div id="eventCall">
				<?php
					$eventCta1 = get_field('event_cta_1','option');
					$eventLink1 = get_field('event_cta_1_link','option');
					$eventCta2 = get_field('event_cta_2','option');
					$eventLink2 = get_field('event_cta_2_link','option');
					$eventLogo = get_field('event_logo','option');
					$eventImg = get_field('event_photo','option');

					// thumbnail
					$eventThumbSize = 'event-thumb';
					$eventThumb = $eventImg['sizes'][$eventThumbSize];
				?>
				<div id="eventLeft" class="left">
					<img class="eventBG" src="<?php echo $eventThumb; ?>" />
					<img class="logo" src="<?php echo $eventLogo; ?>" />
				</div>
				<div id="eventRight" class="left">
					<h2><?php the_field('event_title','option'); ?></h2>
					<h4><?php the_field('event_sub_title','option'); ?></h4>
					<p><?php the_field('event_desc','option'); ?></p>
					<?php 
						if($eventCta1 && $eventLink1){
							echo '<a class="button green" target="_blank" href="' . $eventLink1 . '">' . $eventCta1 . '</a>';
						}
						if($eventCta2 && $eventLink2){
							echo '<a class="button blue" target="_blank" href="' . $eventLink2 . '">' . $eventCta2 . '</a>';
						}
					?>
					<div id="eventSocial">
						<a class="social facebook left" target="_blank" href="<?php the_field('facebook_url','option'); ?>"></a>
						<a class="social twitter left" target="_blank" href="<?php the_field('twitter_url','option'); ?>"></a>
					</div>
				</div>
			</div>

			<!-- START PARALLAX SECTION -->
			<?php
				$pLax2 = get_field('parallax_2','option');
				$pLax2Y = get_field('parallax_2_y','option');

				if($pLax1){
					echo '<section id="parallax-2" class="movement" data-speed="4" data-offsety="' . $pLax2Y . '" data-type="background"></section>';
				} 
			?>
			<!-- END PARALLAX SECTION -->

			<div id="callCTA">
				<div id="callText" class="left">
					<h2><?php the_field('phone_cta_title','option'); ?></h2>
				</div>
				<img class="arrow" src="<?php echo bloginfo('template_url'); ?>/images/call-border.png" />
				<a class="button green small" href="tel:<?php the_field('phone_number','option'); ?>"><?php the_field('phone_cta','option'); ?></a>
			</div>

			<div id="about">
				<?php
					$aboutCTA = get_field('bio_cta','option');
					$aboutLink = get_field('bio_cta_link','option');
				?>
				<img class="left" src="<?php the_field('bio_photo','option'); ?>" />
				<div class="left">
					<h2><?php the_field('bio_title','option'); ?></h2>
					<p><?php the_field('bio_desc','option'); ?></p>
					<?php if($aboutCTA && $aboutLink) { echo '<a class="button blue" href="' . $aboutLink . '">' . $aboutCTA . '</a>'; } ?>
					<div id="aboutSocial">
						<a class="social facebook left" target="_blank" href="<?php the_field('facebook_url','option'); ?>"></a>
						<a class="social twitter left" target="_blank" href="<?php the_field('twitter_url','option'); ?>"></a>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
