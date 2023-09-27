<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
 */
?>

<div class="main-section inner-page section-padding">
    <div class="container">
        <div class="row theiaStickySidebar">
            <div class="col-lg-8 col-md-8 inner-content list-blog-post-1 rt-content">
                <?php
                if ( have_posts() ) :

                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/post/content', get_post_format() );

                        endwhile;
                        WPX_blog_pagination();

                    else :
                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                ?> 
                </div>
            <div class="col-lg-4 col-md-4 rt-sidebar">
                <div id="sidebar" class="blog-sidebar-area">
                    <?php get_sidebar();?>
                </div>
            </div>
        </div>
    </div>
</div> 