<?php get_header(); ?>

<?php get_template_part('content', 'before'); ?>

<div class="container-wide no-pad">
    <div class="container no-pad">
        <div class="content-wrap">
            <?php get_template_part( 'content', 'single' ); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>