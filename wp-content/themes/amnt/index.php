<?php get_header(); ?>

			<div class="container">
				<div class="content">

					<?php
						if ( have_posts() ) :
							// Start the Loop.
							while ( have_posts() ) : the_post();
								/*
								 * Include the post format-specific template for the content. If you want to
								 * use this in a child theme, then include a file called called content-___.php
								 * (where ___ is the post format) and that will be used instead.
								 */

								the_content();

							endwhile;
							// Previous/next post navigation.
						else :
							// If no content, include the "No posts found" template.
						endif;
						wp_reset_query();
					?>
					
				</div>
			</div>
		
<?php get_footer(); ?>