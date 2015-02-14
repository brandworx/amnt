            <div class="content up inline">
				<div class="content-inner">
                
					<?php if(have_posts()) : while(have_posts()) : the_post() ?>
					<div class="entry">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php the_content(); ?> 
					</div>

					<?php endwhile; endif; wp_reset_query();?>
				</div>
            </div>
        <?php get_template_part( 'sidebar' ); ?>