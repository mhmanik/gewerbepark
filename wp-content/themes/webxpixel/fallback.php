<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page" class="site">
		<div id="content" class="site-content">
			<div class="fallback-msg"><?php echo sprintf( esc_html__( 'Error: Your current PHP version is %s. You need at least PHP version 5.3+ to make this theme to work. Please ask your hosting provider to upgrade your PHP version into 5.3+', 'webxpixel' ), PHP_VERSION );?></div>
		</div>
	</div>
	<?php wp_footer();?>
</body>
</html>