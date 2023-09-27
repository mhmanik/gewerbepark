<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
 */ 
get_header();
?>
<div class="main-section inner-page section-padding">
    <div class="container">
        <div class="row theiaStickySidebar">
           <div class="col-lg-8 col-md-8 inner-content list-blog-post-1 rt-content">
				<main id="main" class="site-main"> 
					<?php while ( have_posts() ) : the_post(); ?> 
					<?php get_template_part( 'template-parts/content', 'page' ); ?> 
					<?php
						if ( comments_open() || get_comments_number() ){ 
							comments_template(); 
						} 
					?> 
					<?php endwhile; ?> 
				</main> 
            </div>
            <div class="col-lg-4 col-md-4 rt-sidebar">
                <div id="sidebar" class="blog-sidebar-area">
                    <?php get_sidebar();?>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php get_footer(); ?>