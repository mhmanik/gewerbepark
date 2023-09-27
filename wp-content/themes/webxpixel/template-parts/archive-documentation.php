<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
 */
get_header();
$thumb_size = 'webxpixel-size-grid';
?>

<section class="category category-wrap">
    <div class="container">
        <div class="row g-4">      
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    ?>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="category-box">
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="category-thumble">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail($thumb_size, array('class' => 'img-fluid post-image')) ?>
                            </a>
                        </div>
                    <?php } ?>                        
                    <div class="category-content">
                        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="category-date"><?php echo get_the_date(); ?></div>
                        <!-- <div class="category-date"><?php //echo get_the_time(get_option('date_format')); ?></div> -->
                    </div>
                </div>
            </div>
            <?php
            endwhile;
            else :
            get_template_part('template-parts/entry', 'none');
            endif;
            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>