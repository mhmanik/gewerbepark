<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package scanamerican
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-each post-search' ); ?>>
	<div class="entry-content-area search">
		<div class="entry-header">
			<h3><a href="<?php the_permalink();?>" class="entry-title" rel="bookmark"><?php the_title();?></a></h3>
		</div>
		<div class="entry-content">
			<?php the_excerpt();?>
			<a href="<?php the_permalink();?>" class="read-more-btn"><?php esc_html_e( 'READ MORE', 'webxpixel' );?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
		</div>
	</div>
</article>
