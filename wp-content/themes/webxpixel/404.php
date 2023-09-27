<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
 */ 
get_header();
$error_image       = Helper::get_img('404.png');
$error_text        = esc_html__( "Page Not Found", 'webxpixel' );
$error_sub_text    = esc_html__( "THE PAGE YOU REQUESTED COULD NOT BE FOUND", 'webxpixel' );
$error_button_text = esc_html__( 'Return to the home page.', 'webxpixel' );
?>
<section class="error-page-wrap-layout1">
  <div class="container">
      <div class="error-page-box-layout1">
           <h1>404</h1>
          <h2 class="item-title"><?php echo esc_html( $error_text ); ?></h2>
          <div class="item-subtitle"><?php echo esc_html( $error_sub_text ); ?></div>
          <!-- <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary-landing"><?php echo esc_html( $error_button_text ); ?></a> -->
          <button class="btn btn-primary-landing" type="button" onclick="history.back();"> <?php echo esc_html( $error_button_text ); ?> </button> 
      </div>
  </div>
</section>
<?php get_footer();?>