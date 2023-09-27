<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */

namespace wpx\wpx_elements;

use Elementor\Widget_Base;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
 


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class wpx_search extends Widget_Base {

 public function get_name() {
        return 'wpx-search';
    }    
    public function get_title() {
        return __( 'Section: Search', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-posts-grid';
    }
    public function get_categories() {
        return [ WPX_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
    
    protected function register_controls() { 
 
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Content', 'wpx-elements'),                 
            ]
        );  
            $this->add_control(
                'search_placeholder_text',
                [
                    'label' => esc_html__('Placeholder Text', 'wpx-elements'),
                    'type' => Controls_Manager::TEXT,
                    'default'       => 'Search for a topic',
                    'placeholder' => esc_html__('Type Placeholder Text', 'wpx-elements'),
                    'label_block' => true,             
                ]
            );            
            $this->add_control(
                'animation_show_hide',
                [
                    'label' => esc_html__('Animation Show Hide', 'wpx-elements'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Show', 'wpx-elements'),
                    'label_off' => esc_html__('Hide', 'wpx-elements'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );       
            $this->add_control(
                'sal_animation',
                [
                    'label'   => esc_html__('Animation Name', 'wpx-elements' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'fade' => esc_html__('Fade', 'wpx-elements'),
                        'slide-up' => esc_html__('Slide Up', 'wpx-elements'),
                        'slide-down' => esc_html__('Slide Down', 'wpx-elements'),
                        'slide-left' => esc_html__('Slide Left', 'wpx-elements'),
                        'slide-right' => esc_html__('Slide Right', 'wpx-elements'),
                        'zoom-in' => esc_html__('Zoom In', 'wpx-elements'),
                        'zoom-out' => esc_html__('Zoom Out', 'wpx-elements'),
                        'flip-up' => esc_html__('Flip Up', 'wpx-elements'),
                        'flip-down' => esc_html__('Flip Down', 'wpx-elements'),
                        'flip-left' => esc_html__('Flip Left', 'wpx-elements'),
                        'flip-right' => esc_html__('Flip Right', 'wpx-elements'),
                    ],
                    'default' => 'fade',
                    'condition' => array( 'animation_show_hide' => array( 'yes' ) ),
                ]
            );     
            $this->add_control(
                'sal_duration',
                [
                    'label'   => esc_html__('Animation Duration', 'wpx-elements' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        '100' => esc_html__('100', 'wpx-elements'),
                        '200' => esc_html__('200', 'wpx-elements'),
                        '300' => esc_html__('300', 'wpx-elements'),
                        '400' => esc_html__('400', 'wpx-elements'),
                        '500' => esc_html__('500', 'wpx-elements'),
                        '600' => esc_html__('600', 'wpx-elements'),
                        '700' => esc_html__('700', 'wpx-elements'),
                        '800' => esc_html__('800', 'wpx-elements'),
                        '900' => esc_html__('900', 'wpx-elements'),
                        '1000' => esc_html__('1000', 'wpx-elements'),
                    ],
                    'default' => '500',
                    'condition' => array( 'animation_show_hide' => array( 'yes' ) ),
                ]
            );         
            $this->add_control(
                'sal_delay',
                [
                    'label'   => esc_html__('Animation Delay', 'wpx-elements' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        '100' => esc_html__('100', 'wpx-elements'),
                        '200' => esc_html__('200', 'wpx-elements'),
                        '300' => esc_html__('300', 'wpx-elements'),
                        '400' => esc_html__('400', 'wpx-elements'),
                        '500' => esc_html__('500', 'wpx-elements'),
                        '600' => esc_html__('600', 'wpx-elements'),
                        '700' => esc_html__('700', 'wpx-elements'),
                        '800' => esc_html__('800', 'wpx-elements'),
                        '900' => esc_html__('900', 'wpx-elements'),
                        '1000' => esc_html__('1000', 'wpx-elements'),
                    ],
                    'default' => '100',
                    'condition' => array( 'animation_show_hide' => array( 'yes' ) ),
                ]
            ); 
            $this->end_controls_section();
  }
	protected function render() {
	    $settings = $this->get_settings();
        
        ?>
        <div class="search-wrap">
            <form action="" method="">
                <?php if ( $settings['animation_show_hide'] == 'yes') { ?>
                    <div data-sal="<?php echo esc_html($settings['sal_animation']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay']); ?>">
                <?php } ?> 
                <div class="form-group">
                    <input class="search-input" type="text" name="search" placeholder="<?php echo wpx_kses_intermediate( $settings['search_placeholder_text'] );?>" value="">
                    <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                </div>
                <?php if ( $settings['animation_show_hide'] == 'yes') { ?>
                    </div>
                <?php } ?> 
            </form>
        </div> 
    <?php  
	}
}