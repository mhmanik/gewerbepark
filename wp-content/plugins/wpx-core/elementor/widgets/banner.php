<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */

namespace wpx\wpx_elements;

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use Elementor\Icons_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class wpx_banner extends Widget_Base {  
 
    public function get_name() {
        return 'wpx-banner';
    }    
    public function get_title() {
        return esc_html__( 'Section: Banner', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-banner';
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
            'section_title',
            [
                'label' => esc_html__('Content', 'wpx-elements'),
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
                ],
            ] 
        );             
		$this->add_control(
		    'title',
		    [
		        'label' => esc_html__( 'Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'HR software does not have to be complicated', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
		    ]
		);
        $this->add_control(
            'title_tag',
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
               'default' => 'h1', 
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
		    'description',
		    [
		        'label' => esc_html__( 'Description', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Take your business to next level with revolutionary product that aims to humanize HRTech.', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Description is here', 'wpx-elements' ),
                'separator' => 'before',
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
        $repeater = new Repeater();      
        $repeater->add_control(
            'info_title',
            [
                'label' => esc_html__('Title', 'wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('No Cridit Card', 'wpx-elements'),                
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icons', 'wpx-elements'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-check',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'animation_show_hide',
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
                'condition' => array( 'animation_show_hide' => array( 'yes' ) ),
            ]
        );     
        $repeater->add_control(
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
                'condition' => array( 'animation_show_hide' => array( 'yes' ) ),
            ]
        );         
        $repeater->add_control(
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
                'condition' => array( 'animation_show_hide' => array( 'yes' ) ),
            ]
        ); 
        $this->add_control(
            'sc_option_list',
            [
                'label' => esc_html__('Info List', 'wpx-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'info_title' => esc_html__('Get real time updates anywhere', 'wpx-elements'),
                        'icon' => [
                            'value' => 'fa fa-check',
                        ],
                    ],
                    [
                        'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'info_title' => esc_html__('Brainstorm with colleagues', 'wpx-elements'),
                        'icon' => [
                            'value' => 'fa fa-check',
                        ],
                    ],
                    [
                        'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'info_title' => esc_html__('Align teams quickly', 'wpx-elements'),
                        'icon' => [
                            'value' => 'fa fa-check',
                        ],
                    ],
                ],
                'title_field' => '{{{ info_title }}}',
                'condition' => array( 'layout' => array( '2' ) ),
                'separator' => 'before',
            ]
        );              
        $this->end_controls_section();          
         
        $this->start_controls_section(
	        'axil-button',
	        [
	            'label' => esc_html__('Button','wpx-elements'),
	            
	        ]
	    );
        $this->add_control(
            'button_show_hide',
            [
                'label' => esc_html__('Default Button Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'banner_button_link_text',
            [
                'label' => esc_html__('Default Button Text','wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Get Started',
                'title' => esc_html__('Enter button text','wpx-elements'),
                'condition' => array( 'button_show_hide' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'banner_button_link_type',
            [
                'label' => esc_html__('Default Button Link Type','wpx-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => array( 'button_show_hide' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'banner_button_link',
            [
                'label' => esc_html__('Default Button Link','wpx-elements'),
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
                    'banner_button_link_type' => '1',
                    'button_show_hide' =>  'yes'
                ]
            ]
        );
        $this->add_control(
            'banner_button_page_link',
            [
                'label' => esc_html__('Select Link Page','wpx-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> wpx_get_all_pages(),
                'condition' => [
                    'banner_button_link_type' => '2',
                    'button_show_hide' =>  'yes'
                ]
            ]
        ); 
        $this->add_control(
            'shape_banner_button_icon',
            [
                'label' => __( 'Default Button Icon', 'wpx-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => __( 'On', 'wpx-elements' ),
                'label_off'   => __( 'Off', 'wpx-elements' ),
                'default'     => 'no',
                'condition' => array( 'button_show_hide' => array( 'yes' ) ),               
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
                'condition' => array( 'button_show_hide' => array( 'yes' ) ),
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
                'condition' => array( 'button_show_hide' => array( 'yes' ), 'animation_show_hide_btn' => array( 'yes' ) ),
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
                'condition' => array( 'button_show_hide' => array( 'yes' ), 'animation_show_hide_btn' => array( 'yes' ) ),
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
                'condition' => array( 'button_show_hide' => array( 'yes' ), 'animation_show_hide_btn' => array( 'yes' ) ),
            ]
        );  
        $this->add_control(
            'btntxt',
            [
                'label' => __( 'Video Button Text', 'wpx-elements' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Watch Testimonial Video', 'wpx-elements' ),
                'placeholder' => __( 'Watch Testimonial Video', 'wpx-elements' ),
                'separator' => 'before',
            ]
        ); 
		$this->add_control(
			'videourl',
			[
			    'label'   => esc_html__( 'YouTube Popup URL', 'wpx-elements' ),
			    'type'    => Controls_Manager::URL,
			    'placeholder' => 'https://your-link.com',
			]
		); 
        $this->add_control(
            'animation_show_hide_video',
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
            'sal_animation_video',
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
                'condition' => array( 'animation_show_hide_video' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_video',
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
                'condition' => array( 'animation_show_hide_video' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_video',
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
                'condition' => array( 'animation_show_hide_video' => array( 'yes' ) ),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'axil_image1',
	        [
                'label' => esc_html__('Image','wpx-elements'),
	            'condition' => array( 'layout' => array( '1' ) ),
            ]
        );
        $this->add_control(
            'image1',
            [
                'label' => __('Image','wpx-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->wpx_get_img( 'banner/1.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],      
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size1',
                'default' => 'full',
                'separator' => 'none',
            ]
        ); 
        $this->add_control(
            'animation_show_hide_img_1',
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
            'sal_animation_img_1',
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
                'condition' => array( 'animation_show_hide_img_1' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_img_1',
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
                'condition' => array( 'animation_show_hide_img_1' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_img_1',
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
                'condition' => array( 'animation_show_hide_img_1' => array( 'yes' ) ),
            ]
        ); 
        $this->end_controls_section(); 

        $this->start_controls_section(
            'axil_image2',
	        [
                'label' => esc_html__('Image','wpx-elements'),
	            'condition' => array( 'layout' => array( '2' ) ),
            ]
        );
            $this->add_control(
                'image2',
                [
                    'label' => __('Image','wpx-elements'),
                    'type'=>Controls_Manager::MEDIA,
                    'default' => [
                        'url' => $this->wpx_get_img( 'banner/9.png' ),
                    ],
                    'dynamic' => [
                        'active' => true,
                    ],      
                ]
            );
            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'image_size2',
                    'default' => 'full',
                    'separator' => 'none',
                ]
            ); 
            $this->add_control(
                'animation_show_hide_img_2',
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
                'sal_animation_img_2',
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
                    'condition' => array( 'animation_show_hide_img_2' => array( 'yes' ) ),
                ]
            );     
            $this->add_control(
                'sal_duration_img_2',
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
                    'condition' => array( 'animation_show_hide_img_2' => array( 'yes' ) ),
                ]
            );         
            $this->add_control(
                'sal_delay_img_2',
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
                    'condition' => array( 'animation_show_hide_img_2' => array( 'yes' ) ),
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
                    '{{WRAPPER}} .banner-content .title' => 'color: {{VALUE}}',
                ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Typography', 'wpx-elements' ),                
                 
                'selector' => '{{WRAPPER}} .banner-content .title',
            ]
        );       
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __( 'Margin', 'wpx-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 
                'selectors' => [
                    '{{WRAPPER}} .banner-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );       
        $this->end_controls_section();

        $this->start_controls_section(
            'description_style_section',
            [
                'label' => __( 'Description', 'wpx-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
        $this->add_control(
            'description_color',
            [
                'label' => __( 'Color', 'wpx-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                
                'selectors' => array(
                    '{{WRAPPER}} .banner-content .description' => 'color: {{VALUE}}',
                ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Typography', 'wpx-elements' ),                
                 
                'selector' => '{{WRAPPER}} .banner-content .description',
            ]
        );       
        $this->add_responsive_control(
            'description_margin',
            [
                'label' => __( 'Margin', 'wpx-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 
                'selectors' => [
                    '{{WRAPPER}} .banner-content .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );       
        $this->end_controls_section();

        $this->start_controls_section(
            'list_style_section',
            [
                'label' => __( 'List', 'wpx-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
        $this->add_control(
            'list_text_color',
            [
                'label' => __( 'Text Color', 'wpx-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                
                'selectors' => array(
                    '{{WRAPPER}} .banner-content .info li' => 'color: {{VALUE}}',
                ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_text_typography',
                'label' => __( 'Text Typography', 'wpx-elements' ),                
                 
                'selector' => '{{WRAPPER}} .banner-content .info li',
            ]
        ); 
        $this->add_responsive_control(
            'text_margin',
            [
                'label' => __( 'Text Margin', 'wpx-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 
                'selectors' => [
                    '{{WRAPPER}} .banner-content .info li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );  
        $this->add_responsive_control(
            'text_padding',
            [
                'label' => __( 'Text Padding', 'wpx-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 
                'selectors' => [
                    '{{WRAPPER}} .banner-content .info li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );  
        $this->add_control(
            'list_icon_color',
            [
                'label' => __( 'Icon Color', 'wpx-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                
                'selectors' => array(
                    '{{WRAPPER}} .banner-content .info li i' => 'color: {{VALUE}}',
                ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'list_icon_bg_color',
            [
                'label' => __( 'Icon Background Color', 'wpx-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                
                'selectors' => array(
                    '{{WRAPPER}} .banner-content .info li i' => 'background-color: {{VALUE}}',
                ),
            ]
        );  
        $this->add_responsive_control(
            'icon_margin',
            [
                'label' => __( 'Icon Margin', 'wpx-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 
                'selectors' => [
                    '{{WRAPPER}} .banner-content .info li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );           
        $this->end_controls_section();
  } 


    protected function render() {
        $settings = $this->get_settings();
        $simagev =  $settings['videourl']['url'];  
        $attr = '';
        $btn = '';
        $allowed_tags = wp_kses_allowed_html( 'post' );

        if ('yes' == $settings['shape_banner_button_icon']) {
            $icon        = '<i class="fas fa-long-arrow-alt-right"></i>';
        } else  {
            $icon = '';
        }

        if ('1' == $settings['banner_button_link_type']) {

            if ( !empty( $settings['banner_button_link']['url'] ) ) {
                $attr  = 'href="' . $settings['banner_button_link']['url'] . '"';
                $attr .= !empty( $settings['banner_button_link']['is_external'] ) ? ' target="_blank"' : '';
                $attr .= !empty( $settings['banner_button_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                
            }
            if ( !empty( $settings['banner_button_link_text'] ) ) {
                $btn = '<a class="axil-btn btn-fill" ' . $attr . '>' . $settings['banner_button_link_text'] . $icon . '</a>';
            }

        } else {
            $attr  = 'href="' . get_permalink($settings['banner_button_page_link']) . '"';
            $attr .= ' target="_blank"';
            $attr .= ' rel="nofollow"';                        
            $btn = '<a class="axil-btn btn-fill" ' . $attr . '>' . $settings['banner_button_link_text'] . $icon . '</a>';
        }

        ?>
        <?php  if ( $settings['layout'] == 1) {  ?>     
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col">
                        <div class="banner-style-1">
                            <div class="banner-content">
                                <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                                    <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                                <?php } ?> 
                                <?php if ($settings['title_tag']) : ?>
                                    <?php  if($settings['title']){ ?>
                                        <<?php echo esc_html( $settings['title_tag'] );?> class="title">
                                            <?php echo wpx_kses_intermediate( $settings['title'] );?>
                                        </<?php echo esc_html( $settings['title_tag'] );?>> 
                                    <?php  } ?>             
                                <?php endif; ?> 
                                <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                                    </div>
                                <?php } ?>
                                <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                                    <div data-sal="<?php echo esc_html($settings['sal_animation_description']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_description']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_description']); ?>">
                                <?php } ?>
                                <?php if ( !empty( $settings['description'] ) ) { ?> 
                                    <p class="description"><?php echo wpx_kses_intermediate( $settings['description'] );?></p>
                                <?php } ?>
                                <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                                    </div>
                                <?php } ?>
                                <?php if ( ( $settings['button_show_hide'] == 'yes') || ( !empty( $settings['videourl']['url'] ) ) ) { ?>
                                    <div class="d-flex align-items-center flex-wrap gap-3 mt-4 mt-md-5">
                                        <?php if ( $settings['button_show_hide'] == 'yes') { ?>
                                            <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                                                <div data-sal="<?php echo esc_html($settings['sal_animation_btn']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_btn']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_btn']); ?>">
                                            <?php } ?>
                                                <?php echo wp_kses( $btn, $allowed_tags ); ?>  
                                            <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                                                </div>
                                            <?php } ?> 
                                        <?php } ?>      
                                        <?php if ( !empty( $settings['videourl']['url'] ) ): ?>  
                                            <?php if ( $settings['animation_show_hide_video'] == 'yes') { ?>
                                                <div data-sal="<?php echo esc_html($settings['sal_animation_video']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_video']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_video']); ?>">
                                            <?php } ?>                     
                                                <div class="popup-video">
                                                    <a href="<?php echo esc_url( $simagev );?>" class="play-btn popup-youtube"><i class="fas fa-play"></i><?php echo esc_html( $settings['btntxt'] );?></a>
                                                </div>  
                                            <?php if ( $settings['animation_show_hide_video'] == 'yes') { ?>
                                                </div>
                                            <?php } ?>     
                                        <?php endif; ?>                           
                                    </div>
                                <?php } ?>                                                      
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="banner-style-1">
                            <?php if ( $settings['animation_show_hide_img_1'] == 'yes') { ?>
                                <div data-sal="<?php echo esc_html($settings['sal_animation_img_1']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img_1']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img_1']); ?>">
                            <?php } ?> 
                            <div class="banner-thumbnail">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size1', 'image1' );?> 
                            </div> 
                            <?php if ( $settings['animation_show_hide_img_1'] == 'yes') { ?>
                                </div>
                            <?php } ?> 
                        </div>
                    </div>
                </div>
            </div>       
        <?php } elseif ( $settings['layout'] == 2) {  ?>
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col">
                        <div class="banner-style-2">
                            <div class="banner-content">
                                <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                                    <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                                <?php } ?> 
                                <?php if ($settings['title_tag']) : ?>
                                    <?php  if($settings['title']){ ?>
                                        <<?php echo esc_html( $settings['title_tag'] );?> class="title">
                                            <?php echo wpx_kses_intermediate( $settings['title'] );?>
                                        </<?php echo esc_html( $settings['title_tag'] );?>> 
                                    <?php  } ?>             
                                <?php endif; ?> 
                                <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                                    </div>
                                <?php } ?>
                                <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                                    <div data-sal="<?php echo esc_html($settings['sal_animation_description']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_description']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_description']); ?>">
                                <?php } ?>
                                <?php if ( !empty( $settings['description'] ) ) { ?> 
                                    <p class="description"><?php echo wpx_kses_intermediate( $settings['description'] );?></p>
                                <?php } ?>
                                <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                                    </div>
                                <?php } ?>
                                <ul class="info">
                                    <?php foreach ($settings['sc_option_list'] as $sc_option_list):?>
                                        <?php if ( $sc_option_list['animation_show_hide'] == 'yes') { ?>
                                            <li data-sal="<?php echo esc_html($sc_option_list['sal_animation']); ?>" data-sal-duration="<?php echo esc_html($sc_option_list['sal_duration']); ?>" data-sal-delay="<?php echo esc_html($sc_option_list['sal_delay']); ?>">
                                        <?php } else { ?>
                                            <li> 
                                        <?php } ?>
                                        <i class="<?php echo esc_attr($sc_option_list['icon']['value']); ?>"></i>
                                        <?php echo esc_html($sc_option_list['info_title']); ?>
                                        </li>                                       
                                    <?php endforeach; ?>
                                </ul>
                                <?php if ( ( $settings['button_show_hide'] == 'yes') || ( !empty( $settings['videourl']['url'] ) ) ) { ?>
                                    <div class="d-flex align-items-center flex-wrap gap-3 mt-4 mt-md-5">
                                        <?php if ( $settings['button_show_hide'] == 'yes') { ?>
                                            <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                                                <div data-sal="<?php echo esc_html($settings['sal_animation_btn']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_btn']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_btn']); ?>">
                                            <?php } ?> 
                                            <?php echo wp_kses( $btn, $allowed_tags ); ?>      
                                            <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                                                </div>
                                            <?php } ?>                                           
                                        <?php } ?>   
                                        <?php if ( !empty( $settings['videourl']['url'] ) ): ?>    
                                            <?php if ( $settings['animation_show_hide_video'] == 'yes') { ?>
                                                <div data-sal="<?php echo esc_html($settings['sal_animation_video']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_video']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_video']); ?>">
                                            <?php } ?>                   
                                                <div class="popup-video">
                                                    <a href="<?php echo esc_url( $simagev );?>" class="play-btn popup-youtube"><i class="fas fa-play"></i><?php echo esc_html( $settings['btntxt'] );?></a>
                                                </div>     
                                            <?php if ( $settings['animation_show_hide_video'] == 'yes') { ?>
                                                </div>
                                            <?php } ?>   
                                        <?php endif; ?>                           
                                    </div>
                                <?php } ?>   
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="banner-style-2">
                            <?php if ( $settings['animation_show_hide_img_2'] == 'yes') { ?>
                                <div data-sal="<?php echo esc_html($settings['sal_animation_img_2']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img_2']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img_2']); ?>">
                            <?php } ?> 
                            <div class="banner-thumbnail">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size2', 'image2' );?> 
                            </div>
                            <?php if ( $settings['animation_show_hide_img_2'] == 'yes') { ?>
                                </div>
                            <?php } ?> 
                        </div>
                    </div>
                </div>
            </div>
        <?php }  
    } 
} 
