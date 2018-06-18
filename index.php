<?php get_header(); ?>

<div id="content">
 
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
        <?php $hero = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

        <div class="hero-background-image" style="background: url('<?php echo $hero['0'];?>') center top no-repeat;">
        <!-- Put your loop <header> in here. -->
        </div>
<?php echo $post->ID ?><br />
<?php echo get_post_meta($post->ID, '_thumbnail_id', true) ?><br />
<?php echo wp_get_attachment_image_src(get_post_meta($post->ID, '_thumbnail_id', true), 'full') ?><br />
        <?php the_content(); ?>

    <?php endwhile; else: ?>

        <h2>Woops...</h2>

        <p>Sorry, no posts we're found.</p>

    <?php endif; ?>

    <p align="center"><?php posts_nav_link(); ?></p>
        
</div>
 
<?php get_footer(); ?>