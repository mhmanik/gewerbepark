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

class wpx_services_repeater extends Widget_Base {

public function get_name() {
        return 'wpx-services-repeater';
    }    
    public function get_title() {
        return __( 'Section: Services', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-posts-grid';
    }
    public function get_categories() {
        return [ WPX_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
   
    protected function register_controls() { 

       $this->start_controls_section(
            'wpx_content',
            [
                'label' => esc_html__( 'Services List', 'wpx-elements' ),
                  
            ]
        );

        $repeater = new Repeater();         
        
        $repeater->add_control(
            'service_title',
            [
                'label'   => esc_html__('Title', 'wpx-elements' ),
                'type'    => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'animation_show_hide_title',
            [
                'label' => esc_html__('Animation Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );       
        $repeater->add_control(
            'sal_animation_title',
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
                'condition' => array( 'animation_show_hide_title' => array( 'yes' ) ),
            ]
        );     
        $repeater->add_control(
            'sal_duration_title',
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
                'condition' => array( 'animation_show_hide_title' => array( 'yes' ) ),
            ]
        );         
        $repeater->add_control(
            'sal_delay_title',
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
                'condition' => array( 'animation_show_hide_title' => array( 'yes' ) ),
            ]
        ); 
        $repeater->add_control(
            'service_description',
            [
                'label'   => esc_html__('Description', 'wpx-elements' ),
                'type'    => Controls_Manager::WYSIWYG,
            ]
        );
        $repeater->add_control(
            'animation_show_hide_content',
            [
                'label' => esc_html__('Animation Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );       
        $repeater->add_control(
            'sal_animation_content',
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
                'condition' => array( 'animation_show_hide_content' => array( 'yes' ) ),
            ]
        );     
        $repeater->add_control(
            'sal_duration_content',
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
                'condition' => array( 'animation_show_hide_content' => array( 'yes' ) ),
            ]
        );         
        $repeater->add_control(
            'sal_delay_content',
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
                'condition' => array( 'animation_show_hide_content' => array( 'yes' ) ),
            ]
        ); 
        $this->add_control(
            'list_services',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                 'default' => [
                [  
                    'sal_animation_title' => esc_html__('Fade', 'wpx-elements'),
                    'sal_duration_title' => esc_html__('500', 'wpx-elements'),
                    'sal_delay_title' => esc_html__('100', 'wpx-elements'),   
                    'sal_animation_content' => esc_html__('Fade', 'wpx-elements'),
                    'sal_duration_content' => esc_html__('500', 'wpx-elements'),
                    'sal_delay_content' => esc_html__('100', 'wpx-elements'),   
                    'service_title' => esc_html__( '1. Introduction', 'wpx-elements' ),
                    'service_description' => esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 'wpx-elements' ),
                ],
                ],
                'title_field' => '{{{ service_title }}}',
            ]
        );

    $this->end_controls_section();
}
	protected function render() {
        $settings = $this->get_settings();
        $i = "";
        $j = "";
        $i == 1;
        ?> 
        <div class="container">   
            <div class="services-wrap">   
                <div class="row sticky-coloum-wrap">
                    <div class="col-lg-3 sticky-coloum-item">
                        <?php foreach ($settings['list_services'] as $option_list) { 
                            $i++;
                            ?> 
                            <?php if ( $option_list['animation_show_hide_title'] == 'yes') { ?>
                                <div data-sal="<?php echo esc_html($option_list['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($option_list['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($option_list['sal_delay_title']); ?>">
                            <?php } ?>
                            <h3 class="service-title"><a href="#tab_link_<?php echo esc_attr($i); ?>"><?php echo wpx_kses_intermediate( $option_list['service_title'] );?></a></h3>   
                            <?php if ( $option_list['animation_show_hide_title'] == 'yes') { ?>
                                </div>
                            <?php } ?>                    
                        <?php } ?>        
                    </div>
                    <div class="col-lg-9 sticky-coloum-item service-content-column">
                        <div>
                            <?php $j == 1; ?>
                            <?php foreach ($settings['list_services'] as $option_list) { 
                                $j++;
                                ?> 
                                <?php if ( $option_list['animation_show_hide_content'] == 'yes') { ?>
                                    <div data-sal="<?php echo esc_html($option_list['sal_animation_content']); ?>" data-sal-duration="<?php echo esc_html($option_list['sal_duration_content']); ?>" data-sal-delay="<?php echo esc_html($option_list['sal_delay_content']); ?>">
                                <?php } ?>
                                <div class="service-content" id="tab_link_<?php echo esc_attr($j); ?>"><?php echo  $option_list['service_description'];?></div>   
                                <?php if ( $option_list['animation_show_hide_content'] == 'yes') { ?>
                                    </div>
                                <?php } ?>                    
                            <?php } ?>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
  
	}
}