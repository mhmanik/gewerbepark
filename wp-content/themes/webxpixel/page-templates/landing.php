<?php
/**
 * Template Name: Landing
 *
 */
get_header();
?>
<div class="main-section inner-page section-padding">
	<?php
		while (have_posts()): the_post();
			the_content();
		endwhile; // End of the loop.
		?>	
</div>	 
<?php get_footer(); ?>