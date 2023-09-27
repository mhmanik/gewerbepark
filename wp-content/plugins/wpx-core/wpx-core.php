<?php
/*
Plugin Name: WpX Elements
Plugin URI: https://www.WpX.com
Description: WpX Elements Plugin for wpx Theme
Version: 1.0
Author: WpX
Author URI: https://www.WpX.com
*/

if (!defined('ABSPATH')) exit;

if (!defined('WPX_ELEMENTS')) {
    $plugin_data = get_file_data(__FILE__, array('version' => 'Version'));
    define('WPX_ELEMENTS', $plugin_data['version']);
    define('WPX_ELEMENTS_SCRIPT_VER', (WP_DEBUG) ? time() : WPX_ELEMENTS);
    define('WPX_ELEMENTS_THEME_PREFIX', 'wpx-elements');
    define('WPX_PT_PREFIX', 'wpx');
        define( 'WPX_CORE_THEME_PREFIX_VAR',  'wpx' );
    define('WPX_ELEMENTS_BASE_DIR', plugin_dir_path(__FILE__)); 
    defined('WPX_ELEMENTS_ACTIVED') or define('WPX_ELEMENTS_ACTIVED', (bool) function_exists('WC'));
    define('WPX_ELEMENTS_BASE_URL', plugins_url('/', __FILE__));
    define( 'WPX_FRAMEWORK_VERSION', ( WP_DEBUG ) ? time() : '1.14' );
}

class wpx_core
{

    public $plugin = 'wpx-elements';
    public $action = 'wpx_theme_init';
    protected static $instance;

    public function __construct()
    {
        add_action('plugins_loaded', array($this, 'load_textdomain'), 20);
        add_action( $this->action, array($this, 'after_theme_loaded')); 
          add_action( 'after_setup_theme',    array( $this, 'post_types' ), 15 );
        add_action( 'widgets_init',         array( $this, 'custom_widgets' )) ;
       
    }

    public static function instance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    } 
  public function post_types(){
        
      
    require_once 'wpx-framework/inc/wpx-widget-fields.php';
     
        
    }  

    public function after_theme_loaded()
    {
          
        if (did_action('elementor/loaded')) {
            require_once WPX_ELEMENTS_BASE_DIR . 'elementor/init.php';       
        }
         require_once 'widgets/about-widget.php';    
        
    }
    public function custom_widgets() {
        register_widget( 'About_Widget' );       
                
    }
    public function load_textdomain()
    {
        load_plugin_textdomain($this->plugin, false, dirname(plugin_basename(__FILE__)) . '/languages');
    }
}

wpx_core::instance();


/**
 * Escapeing
 */

if ( !function_exists('wpx_escapeing')) {
    function wpx_escapeing($html){
        return $html;
    }
}
