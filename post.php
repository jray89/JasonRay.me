<?php get_header(); ?>

<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
    
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                
                    <?php the_content(); ?>

                <?php endwhile; else: ?>

                    <div class="section">
                        <h2>Woops...</h2>
                        <p>Sorry, no posts we're found.</p>
                    </div>
                    
                <?php endif; ?>
        
            </div>
        </div>
    </div>
</div>
 
<?php get_footer(); ?>