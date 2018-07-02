<?php get_header(); ?>

<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section">
    
                    <?php if ( have_posts() ) : echo '<h1>Posts</h1>'; while ( have_posts() ) : the_post(); ?>
                        <a href="<?php echo the_permalink(); ?>" class="card">
                            <?php
                                $hero_img = get_field( 'hero_image', $post->ID ); 
                                $thumbnail_src = wp_get_attachment_image_src( $hero_img, 'medium' );
                                $img = esc_attr( $thumbnail_src[0] );
                            ?>
                            <?php if($img): ?>
                                <img src="<?php echo $img; ?>" />
                            <?php endif; ?>
                            <div class="margin-right-md margin-left-md">
                                <h2 class="no-margin-bottom padding-top-md"><?php the_title(); ?></h2>
                                <span class="u-textSm u-grey"><?php the_date(); ?></span>
                                <?php strip_tags(the_excerpt()); ?>
                            </div>
                        </a>
                    <?php endwhile; else: ?>

                        <h2>Woops...</h2>
                        <p>Sorry, no posts we're found.</p>
                        
                    <?php endif; ?>
            
                    <!-- <p align="center"><?php //posts_nav_link(); ?></p> -->
                </div>
            </div>                
        </div>
    </div>
</div>
 
<?php get_footer(); ?>