<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
 */ 

get_header();
?>
<div class="main-section inner-page section-padding">
    
    <div class="blog-details-content">
		<div class="container"> 
			<main id="main" class="site-main">   
				<?php while ( have_posts() ) : the_post(); ?> 
					<div class="row justify-content-center"> 
						<div class="col-lg-9"> 
							<div class="post-info-top">    
								<span class="updated published"><i class="far fa-clock"></i> <?php echo get_the_date(); ?></span>
								<h2><a class="entry-title" href="<?php the_permalink();?>"><?php the_title()?></a></h2> 
							</div>
						</div>
						<div class="col-lg-12">
							<div class="blog-image">
								<?php if (has_post_thumbnail()): ?>
									<div class="entry-thumbnail"><?php the_post_thumbnail('full');?></div>
								<?php endif;?>
							</div>    
						</div>    
						<div class="col-lg-9"> 
							<div class="single-blog-post-content">        
								<div class="entry-content">
									<?php the_content();?>
								</div>
							</div>
						</div>
					</div>
					<?php
					if ( comments_open() || get_comments_number() ){ 
						comments_template(); 
					}
					?> 
				<?php endwhile; ?> 
			</main> 
		</div>
    </div>     
</div> 
<?php get_footer(); ?>