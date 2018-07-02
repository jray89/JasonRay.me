<?php get_header(); ?>

<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
				<div class="section">

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						the_content();

						//get_template_part( 'template-parts/post/content', get_post_format() );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						// the_post_navigation(
						// 	array(
						// 		'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'jrwd' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'jrwd' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
						// 		'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'jrwd' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'jrwd' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
						// 	)
						// );

					endwhile; // End of the loop.
					?>

					<span class="u-textSm u-grey"><?php echo the_date() ?></span>
					<!-- <div class="u-floatRight">
						<i class="fa fa-facebook"></i>
					</div> -->
				</div>
            </div>
			<?php //get_sidebar(); ?>
        </div>
    </div>
</div>

<?php
get_footer();
