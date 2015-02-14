            <div class="content-full up inline">
                <?php if(have_posts()) : while(have_posts()) : the_post() ?>
                <div class="entry">
                    <?php the_content(); ?>
                </div>
                <?php endwhile; endif; ?>
            </div>