<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */

namespace wpx\wpx_elements;

use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WpX_Custom_Widget_Init {

	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', 	array( $this, 'elementor_widgets_control' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'widget_categoty' ) );
		add_action( 'elementor/editor/after_enqueue_styles',    array( $this, 'editor_style' ) );
	}
 
	public function editor_style() {
		$img = plugins_url( 'icon.png', __FILE__ );
		wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .wpx-el-custom{content: url('.$img.');width: 28px;}' );
		wp_add_inline_style( 'elementor-editor', '.select2-container--default .select2-selection--single {min-width: 126px !important; min-height: 30px !important;}' );
	}	

	public function elementor_widgets_control(){
		if ( did_action( 'elementor/loaded' ) ) {			
			require_once 'base.php';
		}
	}

	public function widget_categoty( $class ) {
		$id         = WPX_ELEMENTS_THEME_PREFIX . '-widgets'; // Category /@dev
		$properties = array(
			'title' => __( 'WpX Addons', 'wpx-elements' ),
		);

		Plugin::$instance->elements_manager->add_category( $id, $properties );
	}
}
new WpX_Custom_Widget_Init();