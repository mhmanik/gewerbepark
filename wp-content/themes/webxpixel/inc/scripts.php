<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
 */
use Elementor\Plugin;

add_action('wp_enqueue_scripts', 'webxpixel_enqueue_scripts', 15);
if (!function_exists('webxpixel_enqueue_scripts')) {
    function webxpixel_enqueue_scripts()
    {
        $dep = array('jquery');
    
        wp_enqueue_style('webxpixel-landing', WPX_CSS_URL . 'landing.min.css', array(), WPX_VERSION);
        wp_enqueue_style('webxpixel-webfont', WPX_CSS_URL . 'webfonts.css', array(), WPX_VERSION);
        wp_enqueue_style('bootstrap', WPX_CSS_URL . 'bootstrap.min.css', array(), WPX_VERSION);
        wp_enqueue_style('awesome', WPX_CSS_URL . 'font-awesome.css', array(), WPX_VERSION);
        wp_enqueue_script('bootstrap', WPX_JS_URL . 'bootstrap.bundle.min.js', $dep, WPX_VERSION, true); 
        wp_enqueue_script('webxpixel-main', WPX_JS_URL . 'main.js', $dep, time(), true);
        localized_scripts();
        elementor_scripts();

    }
}



  function elementor_scripts()
    {
        if (!did_action('elementor/loaded')) {
            return;
        }
        if (Plugin::$instance->preview->is_preview_mode()) {
           
            $dep = array('jquery');
            wp_enqueue_script('bootstrap', WPX_JS_URL . 'bootstrap.bundle.min.js', 'jquery', WPX_VERSION, true);
           

        }
    }


function localized_scripts()
{

    $ref_source1 = (isset($_GET['ref']) && !empty($_GET['ref'])) ? $_GET['ref'] : "";
    $ref_source2 = (isset($_COOKIE['ref']) && !empty($_COOKIE['ref'])) ? $_COOKIE['ref'] : "";

  
    if (!empty($ref_source1)) {
    setcookie('ref', $ref_source1, time() + (86400 * 30), "/"); // 30 day
        $ref_source = $ref_source1;
    } else {
        $ref_source = $ref_source2;
    }

    $ref_source = !empty($ref_source1) ? $ref_source1 : 'Organic'; 
     
    $http_referer = isset($_SERVER['HTTP_REFERER']);

 
    $current_page = sprintf(
    '%s://%s%s',
    isset($_SERVER['HTTPS']) ? 'https' : 'http',
    $_SERVER['HTTP_HOST'],
    $_SERVER['REQUEST_URI']
    ); 
    $user_remote_ip = $_SERVER["REMOTE_ADDR"];

    $baseSiteUrl = get_site_url();

    $localize_data = array(
        

        'ajaxurl' => admin_url('admin-ajax.php'),
        'hasAdminBar'  => is_admin_bar_showing() ? 1 : 0,
        'rtl'          => is_rtl() ? 'yes' : 'no',
        'user_remote_ip'    => $user_remote_ip ? $user_remote_ip : '',
        'current_page'      => $current_page ? $current_page : '',
        'http_referer'      => $http_referer ? $http_referer : '',
        'ref_source'        => $ref_source ? $ref_source : '', 
        'baseSiteUrl'       => $baseSiteUrl,
        'ref_source1'       => $ref_source1 ? $ref_source1 : '',
         

    );
    wp_localize_script('webxpixel-main', 'wpxObj', $localize_data);
}


function webxpixel_scripts()
    {
        wp_enqueue_style('webxpixel-style', get_stylesheet_uri(), array(), WPX_VERSION);
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

add_action('wp_enqueue_scripts', 'webxpixel_scripts');
 


/**
 * @param $classes
 * @return array
 */
function webxpixel_body_classes( $classes ) {
  
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
 
    // Adds a class of no-sidebar when there is no sidebar present.
    if ( is_page() ) {

        $post_id   = get_the_id();
        $webxpixel_programs_select       = get_post_meta( $post_id, "webxpixel_programs_select", true );
        $classes[] = $webxpixel_programs_select;
 
    }
 

	return $classes;
}
add_filter( 'body_class', 'webxpixel_body_classes' );

