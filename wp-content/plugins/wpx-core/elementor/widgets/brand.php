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

class wpx_brand extends Widget_Base {

 public function get_name() {
        return 'wpx-brand';
    }    
    public function get_title() {
        return __( 'Section: Brand', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-posts-grid';
    }
    public function get_categories() {
        return [ WPX_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }

     public function wpx_get_img( $img )
    {
        $img = WPX_ELEMENTS_BASE_URL . 'assets/media/' . $img;
        return $img;
    }
    private function wpx_get_all_pages()
    {

        $page_list = get_posts(array(
            'post_type' => 'page',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => -1,
        ));

        $pages = array();

        if (!empty($page_list) && !is_wp_error($page_list)) {
            foreach ($page_list as $page) {
                $pages[$page->ID] = $page->post_title;
            }
        }

        return $pages;
    } 
    protected function register_controls() { 
 
        $this->start_controls_section(
            'wpx_section_title_section_title',
            [
                'label' => esc_html__('Section Title', 'wpx-elements'),                 
            ]
        );   
            $this->add_control(
                'section_title_on',
                [
                    'label'         => esc_html__( 'Section Title', 'axil-elements' ),
                    'type'          => Controls_Manager::SWITCHER,              
                    'label_on'      => esc_html__( 'On', 'axil-elements' ),
                    'label_off'     => esc_html__( 'Off', 'axil-elements' ),
                    'default'       => 'yes',
                    'separator'     => 'after',               
                ]
            ); 
            $this->add_control(
                'wpx_section_title',
                [
                    'label' => esc_html__('Title', 'wpx-elements'),
                    'type' => Controls_Manager::TEXTAREA,
                    'default'       => 'Trusted by businesses all over the world ',
                    'placeholder' => esc_html__('Type Heading Text', 'wpx-elements'),
                    'label_block' => true,
                    'condition' => array( 'section_title_on' => array( 'yes' ) ),                
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
                    'condition' => array( 'section_title_on' => array( 'yes' ) ),
                    'toggle' => false,                 
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
                        
                    'default' => 'center',
                    'condition' => array( 'section_title_on' => array( 'yes' ) ),
                    'toggle' => true,
                    'selectors' => array(
                        '{{WRAPPER}} .section-heading' => 'text-align: {{VALUE}}',
                    ),
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
        $this->end_controls_section(); 

        $this->start_controls_section(
            'brand_section_bg',
            [
                'label' => esc_html__( 'Section Background', 'wpx-elements' ),
                  
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'textdomain' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .brand-wrap-1',
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'wpx_content',
            [
                'label' => esc_html__( 'Brand List', 'wpx-elements' ),
                  
            ]
        );
            $repeater = new Repeater(); 

            $repeater->add_control(
                'box_image',
                [
                    'label' => esc_html__( 'Image', 'wpx-elements' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => $this->wpx_get_img( 'brand/1.png' ),
                    ],
                ]
            );
            $repeater->add_control(
                'brand_link',
                [
                    'label' => esc_html__('Image link','wpx-elements'),
                    'type' => Controls_Manager::URL,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'placeholder' => esc_html__('https://your-link.com','wpx-elements'),
                    'show_external' => true,
                ]
            );
            $repeater->add_control(
                'animation_show_hide_brand',
                [
                    'label' => esc_html__('Animation Show Hide', 'wpx-elements'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Show', 'wpx-elements'),
                    'label_off' => esc_html__('Hide', 'wpx-elements'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );       
            $repeater->add_control(
                'sal_animation_brand',
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
                    'condition' => array( 'animation_show_hide_brand' => array( 'yes' ) ),
                ]
            );     
            $repeater->add_control(
                'sal_duration_brand',
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
                    'condition' => array( 'animation_show_hide_brand' => array( 'yes' ) ),
                ]
            );         
            $repeater->add_control(
                'sal_delay_brand',
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
                    'condition' => array( 'animation_show_hide_brand' => array( 'yes' ) ),
                ]
            );     
            $this->add_control(
                'list_features',
                [
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'show_label' => false,
                    'default' => [
                        [
                            'sal_animation_brand' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_brand' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_brand' => esc_html__('100', 'wpx-elements'),
                            'box_title' => esc_html__( 'Brand Image', 'wpx-elements' ),  
                            'box_image' => [
                                'url' => $this->wpx_get_img( 'brand/1.png' ),
                            ], 
                        ],                         
                        [
                            'sal_animation_brand' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_brand' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_brand' => esc_html__('100', 'wpx-elements'),
                            'box_title' => esc_html__( 'Brand Image', 'wpx-elements' ),  
                            'box_image' => [
                                'url' => $this->wpx_get_img( 'brand/2.png' ),
                                ],
                        ], 
                        [
                            'sal_animation_brand' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_brand' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_brand' => esc_html__('100', 'wpx-elements'),
                            'box_title' => esc_html__( 'Brand Image', 'wpx-elements' ),  
                            'box_image' => [
                                'url' => $this->wpx_get_img( 'brand/3.png' ),
                                ],
                        ], 
                        [
                            'sal_animation_brand' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_brand' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_brand' => esc_html__('100', 'wpx-elements'),
                            'box_title' => esc_html__( 'Brand Image', 'wpx-elements' ),  
                            'box_image' => [
                                'url' => $this->wpx_get_img( 'brand/4.png' ),
                                ],
                        ], 
                        [
                            'sal_animation_brand' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_brand' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_brand' => esc_html__('100', 'wpx-elements'),
                            'box_title' => esc_html__( 'Brand Image', 'wpx-elements' ),  
                            'box_image' => [
                                'url' => $this->wpx_get_img( 'brand/5.png' ),
                                ],
                        ], 
                        [
                            'sal_animation_brand' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_brand' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_brand' => esc_html__('100', 'wpx-elements'),
                            'box_title' => esc_html__( 'Brand Image', 'wpx-elements' ),  
                            'box_image' => [
                                'url' => $this->wpx_get_img( 'brand/6.png' ),
                                ],
                        ],   

                    ],

                    'title_field' => '{{{ box_title }}}',
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
            'wpx_btn',
            [
                'label' => esc_html__( 'Brand Button', 'wpx-elements' ),
                  
            ]
        );
        $this->add_control(
            'btn_show_hide',
            [
                'label' => esc_html__('Button Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'btn_link_text',
            [
                'label' => esc_html__('Button Text','wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Find out what features we offer',
                'title' => esc_html__('Enter button text','wpx-elements'),
                'condition' => array( 'btn_show_hide' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'btn_link_type',
            [
                'label' => esc_html__('Button Link Type','wpx-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => array( 'btn_show_hide' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__('Button Link','wpx-elements'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com','wpx-elements'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [
                    'btn_link_type' => '1',
                    'btn_show_hide' =>  'yes'
                ]
            ]
        );
        $this->add_control(
            'btn_page_link',
            [
                'label' => esc_html__('Select Link Page','wpx-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> wpx_get_all_pages(),
                'condition' => [
                    'btn_link_type' => '2',
                    'btn_show_hide' =>  'yes'
                ]
            ]
        ); 
        $this->add_control(
            'animation_show_hide_btn',
            [
                'label' => esc_html__('Animation Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => array( 'btn_show_hide' => array( 'yes' ) ),
            ]
        );       
        $this->add_control(
            'sal_animation_btn',
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
                'condition' => array( 'animation_show_hide_btn' => array( 'yes' ), 'btn_show_hide' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_btn',
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
                'condition' => array( 'animation_show_hide_btn' => array( 'yes' ), 'btn_show_hide' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_btn',
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
                'condition' => array( 'animation_show_hide_btn' => array( 'yes' ), 'btn_show_hide' => array( 'yes' ) ),
            ]
        ); 
        $this->end_controls_section();
  }
	protected function render() {
	    $settings = $this->get_settings();
        $attr = '';
        $attr2 = '';
        $btn = '';
        $icon = '<div class="icon-holder"><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.328125 5.32812V4.67188C0.328125 4.57812 0.359375 4.5 0.421875 4.4375C0.494792 4.36458 0.578125 4.32812 0.671875 4.32812H11.4531L8.48438 1.375C8.45312 1.34375 8.42708 1.30729 8.40625 1.26562C8.38542 1.22396 8.375 1.18229 8.375 1.14062C8.375 1.08854 8.38542 1.04167 8.40625 1C8.42708 0.958333 8.45312 0.927083 8.48438 0.90625L8.95312 0.4375C8.98438 0.40625 9.02083 0.380208 9.0625 0.359375C9.10417 0.338542 9.14583 0.328125 9.1875 0.328125C9.23958 0.328125 9.28125 0.338542 9.3125 0.359375C9.35417 0.380208 9.39062 0.40625 9.42188 0.4375L13.5156 4.51562C13.5677 4.56771 13.6042 4.625 13.625 4.6875C13.6562 4.73958 13.6719 4.80208 13.6719 4.875V5.125C13.6719 5.19792 13.6562 5.26562 13.625 5.32812C13.6042 5.38021 13.5677 5.43229 13.5156 5.48438L9.42188 9.5625C9.39062 9.59375 9.35417 9.61979 9.3125 9.64062C9.28125 9.66146 9.23958 9.67188 9.1875 9.67188C9.14583 9.67188 9.10417 9.66146 9.0625 9.64062C9.02083 9.61979 8.98438 9.59375 8.95312 9.5625L8.48438 9.09375C8.45312 9.0625 8.42708 9.02604 8.40625 8.98438C8.38542 8.94271 8.375 8.90104 8.375 8.85938C8.375 8.81771 8.38542 8.77604 8.40625 8.73438C8.42708 8.69271 8.45312 8.65625 8.48438 8.625L11.4531 5.67188H0.671875C0.578125 5.67188 0.494792 5.64062 0.421875 5.57812C0.359375 5.50521 0.328125 5.42188 0.328125 5.32812Z" fill="white"/>
        </svg></div>';    
        if ('1' == $settings['btn_link_type']) {

            if ( !empty( $settings['btn_link']['url'] ) ) {
                $attr  = 'href="' . $settings['btn_link']['url'] . '"';
                $attr .= !empty( $settings['btn_link']['is_external'] ) ? ' target="_blank"' : '';
                $attr .= !empty( $settings['btn_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                
            }
            if ( !empty( $settings['btn_link_text'] ) ) {
                $btn = '<a class="axil-btn btn-text" ' . $attr . '>' . $settings['btn_link_text'] . $icon . '</a>';
            }

        } else {
            $attr  = 'href="' . get_permalink($settings['btn_page_link']) . '"';
            $attr .= ' target="_blank"';
            $attr .= ' rel="nofollow"';                        
            $btn = '<a class="axil-btn btn-text" ' . $attr . '>' . $settings['btn_link_text'] . $icon . '</a>';
        } 
        ?> 
        <section class="brand brand-wrap-1">
            <div class="container">
                <?php if( $settings['section_title_on'] =='yes' ): ?>
                    <div class="section-heading heading-center heading-dark">
                        <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                            <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                        <?php } ?>
                        <?php if ($settings['wpx_section_title_tag']) : ?>
                            <?php  if($settings['wpx_section_title']){ ?>
                                <<?php echo esc_html( $settings['wpx_section_title_tag'] );?> class="title title-small">
                                    <?php echo wpx_kses_intermediate( $settings['wpx_section_title'] );?>
                                </<?php echo esc_html( $settings['wpx_section_title_tag'] );?>> 
                            <?php  } ?>             
                        <?php endif; ?> 
                        <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                            </div>
                        <?php } ?> 
                    </div> 
                <?php endif; ?> 
                <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6">  
                    <?php foreach ($settings['list_features'] as $option_list) {                         
                        $wrapper_start = '<span>';
                        $wrapper_end   = '</span>';

                        if ( !empty( $option_list['brand_link']['url'] ) ) {
                            $attr2  = 'href="' . $option_list['brand_link']['url'] . '"';
                            $attr2 .= !empty( $option_list['brand_link']['is_external'] ) ? ' target="_blank"' : '';
                            $attr2 .= !empty( $option_list['brand_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                            
                            $wrapper_start = '<a ' . $attr2 . '>';
                            $wrapper_end   = '</a>';
                        } 
                        ?> 
                        
                            <?php if ( $option_list['animation_show_hide_brand'] == 'yes') { ?>
                                <div class="col" data-sal="<?php echo esc_html($option_list['sal_animation_brand']); ?>" data-sal-duration="<?php echo esc_html($option_list['sal_duration_brand']); ?>" data-sal-delay="<?php echo esc_html($option_list['sal_delay_brand']); ?>">
                            <?php } else { ?> 
                                <div class="col">
                            <?php } ?>
                            <div class="brand-style-1">
                                <div class="brand-thumbnail">
                                <?php echo $wrapper_start;?> 
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $option_list, 'full', 'box_image' );?>
                                <?php echo $wrapper_end;?>
                                </div>
                            </div>
                        </div>
                    <?php } ?> 
                </div>
                <?php if ( $settings['btn_show_hide'] == 'yes') { ?>
                    <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                        <div data-sal="<?php echo esc_html($settings['sal_animation_btn']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_btn']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_btn']); ?>">
                    <?php } ?> 
                    <div class="text-center mt-5">
                        <?php echo $btn; ?>        
                    </div>
                    <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                        </div>
                    <?php } ?> 
                <?php } ?> 
            </div>
        </section>
    <?php  
	}
}