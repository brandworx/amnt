<?php
/**
 * Template Name: Blog Page
 *
 * The archives page template displays a conprehensive archive of the current
 * content of your website on a single page. 
 *
 */ 
?> 

<?php get_header(); ?>

<?php get_template_part('content', 'before'); ?>

<div class="container-wide no-pad">
    <div class="container no-pad">
        <div class="content-wrap">
            <?php 
            
            $blog_query = new WP_Query( $args );
            $args = array(
                'post_type' => 'post',
            );
            
            if($blog_query->have_posts()) : while($blog_query->have_posts()) : $blog_query->the_post(); ?>
            
                <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
                <?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
                <?php the_excerpt(); ?>
                    
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>