<?php
/**
 * Template Name: Full Width Page
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
            <?php get_template_part( 'content', 'full' ); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>