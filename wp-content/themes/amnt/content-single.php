            <div class="content up inline">
                <?php if(have_posts()) : while(have_posts()) : the_post() ?>
                <div class="entry"> 
                    <?php 
                    the_content(); 
                    comments_template();                    
                    ?>
                </div>
                <?php endwhile; endif; ?>
            </div>
        <?php get_template_part( 'sidebar' ); ?>