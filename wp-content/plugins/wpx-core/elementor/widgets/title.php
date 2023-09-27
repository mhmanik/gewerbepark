<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */

namespace wpx\wpx_elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class wpx_title extends Widget_Base {  
 
 public function get_name() {
        return 'wpx-title';
    }    
    public function get_title() {
        return esc_html__( 'Section Title', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-post-title';
    }
    public function get_categories() {
        return [ WPX_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
    public function wpx_get_img($img)
    {
        $img = WPX_ELEMENTS_BASE_URL . 'assets/media/' . $img;
        return $img;
    }

    
  protected function register_controls() { 
    

        $this->start_controls_section(
            'wpx_section_title_section_title',
            [
                'label' => esc_html__('Section Title', 'wpx-elements'),
            ]
        );  
        $this->add_control(
            'layout',
            [
                'label' => esc_html__( 'Layout', 'wpx-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                   '1' => esc_html__( 'Layout 1', 'wpx-elements' ),
				   '2' => esc_html__( 'Layout 2', 'wpx-elements' ),		                 
				   '3' => esc_html__( 'Layout 3', 'wpx-elements' ),		                 
                ],
            ] 
        ); 
        $this->add_responsive_control(
            'wpx_title_align',
            [
                'label' => esc_html__( 'Filter Alignment', 'wpx-elements' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'wpx-elements' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'wpx-elements' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__( 'Right', 'wpx-elements' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                    
                'default' => 'left',                
                'toggle' => true,
                'selectors' => array(
                    '{{WRAPPER}} .section-heading' => 'text-align: {{VALUE}}',
                ),
            ]
        );
        $this->add_control(
            'wpx_section_sub_title',
            [
                'label' => esc_html__('Sub Title', 'wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Coming Soon',
                'placeholder' => esc_html__('Type Heading Text', 'wpx-elements'),
                'label_block' => true,   
                'condition' => array( 'layout' => array( '2' ) ), 
            ]
            ); 
            $this->add_control(
                'animation_show_hide_sub_title',
                [
                    'label' => esc_html__('Animation Show Hide', 'wpx-elements'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Show', 'wpx-elements'),
                    'label_off' => esc_html__('Hide', 'wpx-elements'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => array( 'layout' => array( '2' ) ),             
            ]
        );       
        $this->add_control(
            'sal_animation_sub_title',
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
                'condition' => array( 'animation_show_hide_sub_title' => array( 'yes' ), 'layout' => array( '2' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_sub_title',
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
                'condition' => array( 'animation_show_hide_sub_title' => array( 'yes' ), 'layout' => array( '2' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_sub_title',
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
                'condition' => array( 'animation_show_hide_sub_title' => array( 'yes' ), 'layout' => array( '2' ) ),                
            ]
        );         
        $this->add_control(
            'wpx_section_title',
            [
                'label' => esc_html__('Title', 'wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Section Title',
                'placeholder' => esc_html__('Type Heading Text', 'wpx-elements'),
                'label_block' => true,  
                'separator' => 'before',               
            ]
        );
        $this->add_control(
            'wpx_section_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'wpx-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'wpx-elements'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'wpx-elements'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'wpx-elements'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'wpx-elements'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'wpx-elements'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'wpx-elements'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
               'default' => 'h2',
                
                'toggle' => false,
                 
            ]
        ); 
        $this->add_control(
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
        $this->add_control(
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
        $this->add_control(
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
        $this->add_control(
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
        $this->add_control(
            'image',
            [
                'label' => __('Image','wpx-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->wpx_get_img( 'icon/hand.svg' ),
                ],
                'dynamic' => [
                    'active' => true,
                ], 
                'condition' => array( 'layout' => array( '3' ) ),     
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size',
                'default' => 'full',
                'separator' => 'none',
                'condition' => array( 'layout' => array( '3' ) ), 
            ]
        );        
        $this->add_control(
            'wpx_section_description',
            [
                'label'         => __( 'Description', 'wpx-elements' ),
                'type'          => Controls_Manager::TEXTAREA, 
                'placeholder'   => __( 'Type your Description here.', 'wpx-elements' ),    
                'default'       => 'Graduate In As Little As 18 Months!',   
                'separator'     => 'before',         
            ]
        ); 
        $this->add_control(
            'animation_show_hide_description',
            [
                'label' => esc_html__('Animation Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );       
        $this->add_control(
            'sal_animation_description',
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
                'condition' => array( 'animation_show_hide_description' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_description',
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
                'condition' => array( 'animation_show_hide_description' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_description',
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
                'condition' => array( 'animation_show_hide_description' => array( 'yes' ) ),
            ]
        );  
        $this->end_controls_section();  

        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __( 'Title', 'wpx-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Color', 'wpx-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                
                'selectors' => array(
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __( 'Typography', 'wpx-elements' ),                
                 
                'selector' => '{{WRAPPER}} .title',
            ]
        );       
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __( 'Margin', 'wpx-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );       
        $this->end_controls_section();

        $this->start_controls_section(
            'wpx_sub_title_style_section',
            [
                'label' => __( 'Sub Title', 'wpx-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
        $this->add_control(
            'sub_title_color',
            [
                'label' => __( 'Color', 'wpx-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                
                'selectors' => array(
                    '{{WRAPPER}} .description' => 'color: {{VALUE}}',
                     
                ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_font_size',
                'label' => __( 'Typography', 'wpx-elements' ),                
                 
                'selector' => '{{WRAPPER}} .description',
            ]
        );       
        $this->add_responsive_control(
            'sub_title_margin',
            [
                'label' => __( 'Margin', 'wpx-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 
                'selectors' => [
                    '{{WRAPPER}} .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        $this->end_controls_section();     

  } 

    protected function render() {
        $settings = $this->get_settings(); ?>  
        <?php  if ( $settings['layout'] == 1 ) {  ?>
            <div class="section-heading heading-center"> 
                <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                    <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                <?php } ?>
                <?php if ($settings['wpx_section_title_tag']) : ?>
                    <?php  if($settings['wpx_section_title']){ ?>
                        <<?php echo esc_html( $settings['wpx_section_title_tag'] );?> class="title title-default">
                            <?php echo wpx_kses_intermediate( $settings['wpx_section_title'] );?>
                        </<?php echo esc_html( $settings['wpx_section_title_tag'] );?>> 
                    <?php  } ?>             
                <?php endif; ?> 
                <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                    </div>
                <?php } ?> 
                <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                    <div data-sal="<?php echo esc_html($settings['sal_animation_description']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_description']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_description']); ?>">
                <?php } ?>
                <p class="description"><?php echo wpx_kses_intermediate( $settings['wpx_section_description'] );?></p> 
                <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                    </div>
                <?php } ?> 
            </div>  
        <?php } elseif ( $settings['layout'] == 2 ) { ?>
            <div class="section-heading heading-center"> 
                <?php if ( $settings['animation_show_hide_sub_title'] == 'yes') { ?>
                    <div data-sal="<?php echo esc_html($settings['sal_animation_sub_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_sub_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_sub_title']); ?>">
                <?php } ?>
                <div class="sub-title"><?php echo wpx_kses_intermediate( $settings['wpx_section_sub_title'] );?></div>
                <?php if ( $settings['animation_show_hide_sub_title'] == 'yes') { ?>
                    </div>
                <?php } ?> 
                <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                    <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                <?php } ?>
                <?php if ($settings['wpx_section_title_tag']) : ?>
                    <?php  if($settings['wpx_section_title']){ ?>
                        <<?php echo esc_html( $settings['wpx_section_title_tag'] );?> class="title title-default">
                            <?php echo wpx_kses_intermediate( $settings['wpx_section_title'] );?>
                        </<?php echo esc_html( $settings['wpx_section_title_tag'] );?>> 
                    <?php  } ?>             
                <?php endif; ?>  
                <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                    </div>
                <?php } ?> 
                <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                    <div data-sal="<?php echo esc_html($settings['sal_animation_description']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_description']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_description']); ?>">
                <?php } ?>
                <p class="description"><?php echo wpx_kses_intermediate( $settings['wpx_section_description'] );?></p> 
                <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                    </div>
                <?php } ?>                     
            </div>  
        <?php } elseif ( $settings['layout'] == 3 ) { ?>
            <div class="section-heading heading-center"> 
                <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                    <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                <?php } ?>
                <?php if ($settings['wpx_section_title_tag']) : ?>
                    <?php  if($settings['wpx_section_title']){ ?>
                        <<?php echo esc_html( $settings['wpx_section_title_tag'] );?> class="title title-default">
                            <?php echo wpx_kses_intermediate( $settings['wpx_section_title'] );?>
                            <span class="title-image"><?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?></span>
                        </<?php echo esc_html( $settings['wpx_section_title_tag'] );?>> 
                    <?php  } ?>             
                <?php endif; ?> 
                <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                    </div>
                <?php } ?>
                <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                    <div data-sal="<?php echo esc_html($settings['sal_animation_description']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_description']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_description']); ?>">
                <?php } ?> 
                <p class="description"><?php echo wpx_kses_intermediate( $settings['wpx_section_description'] );?></p>   
                <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                    </div>
                <?php } ?>                   
            </div>          
        <?php
        }
    }
}
