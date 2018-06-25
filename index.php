<?php get_header(); ?>

<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section">
    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                    
                        <?php the_content(); ?>

                    <?php endwhile; else: ?>

                        <h2>Woops...</h2>
                        <p>Sorry, no posts we're found.</p>
                        
                    <?php endif; ?>
            
                    <!-- <p align="center"><?php posts_nav_link(); ?></p> -->
                </div>
            </div>                
        </div>
    </div>
</div>
 
<?php get_footer(); ?>