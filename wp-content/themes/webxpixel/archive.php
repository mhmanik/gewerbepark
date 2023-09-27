<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
 */ 

get_header();
$thumb_size = 'webxpixel-size-grid';

?>
<section class="blog-posts-section">
    <div class="container">
        <div class="row">
            <?php
            if (have_posts()) :
                /* Start the Loop */
                while (have_posts()) :
                    the_post();
                    ?>
                    <article class="col-lg-12 featured-post">
                        <div class="row">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="col">
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail($thumb_size, array('class' => 'img-fluid post-image')) ?>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col">
                                <h1 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h1>
                                <p class="text-b4 post-description">
                                    <?php the_excerpt(); ?>
                                </p>
                                <div class="post-author">
                                    <p class="mb-0 text-secondary text-b3"><?php printf('<a href="%1$s"><span data-text="%2$s">%2$s</span></a>', esc_url(get_author_posts_url(get_the_author_meta('ID', get_the_author_meta()))), get_the_author_meta('display_name', get_the_author_meta('ID'))); ?>
                                    </p>
                                    <p class="mb-0 text-b5">
                                        <?php echo get_the_author_meta('user_description', get_the_author_meta('ID')); ?>
                                    </p>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn app-btn-sm btn-action">
                                    <?php esc_html_e('Read Full Article', 'webxpixel'); ?>
                                </a>
                            </div>
                        </div>
                    </article>

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