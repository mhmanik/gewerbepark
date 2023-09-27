<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
*/
	$webxpixel_theme_data = wp_get_theme();
	$action  		= 'wpx_theme_init';

	do_action( $action );
	define( 'WPX_VERSION', ( WP_DEBUG ) ? time() : $webxpixel_theme_data->get( 'Version' ) );
	define( 'WPX_AUTHOR_URI', $webxpixel_theme_data->get( 'AuthorURI' ) );
	define( 'WPX_CPT_CONST', 'wpx' );
	define( 'WIDGET_PREFIX', 'wpx' );
	defined('WPX_CORE_USER_LOGGED') or define('WPX_CORE_USER_LOGGED', is_user_logged_in());

	if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
		// DIR
		define( 'WPX_BASE_DIR',    get_template_directory(). '/' );
		define( 'WPX_INC_DIR',     WPX_BASE_DIR . 'inc/' );
		// URL
		define( 'WPX_BASE_URL',    get_template_directory_uri(). '/' );
		define( 'WPX_ASSETS_URL',  WPX_BASE_URL . 'assets/' );
		define( 'WPX_CSS_URL',     WPX_ASSETS_URL . 'css/' );
		define( 'WPX_JS_URL',      WPX_ASSETS_URL . 'js/' );

        require_once WPX_INC_DIR . 'general.php';
        require_once WPX_INC_DIR . 'helper.php';
        require_once WPX_INC_DIR . 'scripts.php';
		require_once WPX_INC_DIR . 'general-widget.php';
		 

	}else{ 
		add_filter( 'template_include', 'webxpixel_fail_php_template', 99 );
		add_action( 'admin_notices', 'webxpixel_fail_php_version' ); 
		function webxpixel_fail_php_template( $backtemplate ) {
			$backtemplate = locate_template( array( 'fallback.php' ) );
			return $backtemplate;
		} 
		function webxpixel_fail_php_version() {
			$msg = sprintf( esc_html__( 'Error: Your current PHP version is %s. You need at least PHP version 5.3+ to make this theme to work. Please ask your hosting provider to upgrade your PHP version into 5.3+', 'webxpixel' ), PHP_VERSION );
			echo '<div class="error">' . $msg . '</div>';
		}
	} 
	// REMOVE WP EMOJI
	// remove_action('wp_head', 'print_emoji_detection_script', 7);
	// remove_action('wp_print_styles', 'print_emoji_styles');

	// remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	// remove_action( 'admin_print_styles', 'print_emoji_styles' );
	// add_editor_style( 'style-editor.css' ); 
 
  