<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */

namespace wpx\wpx_elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class wpx_call_to_action extends Widget_Base {  
 
    public function get_name() {
        return 'wpx-call-to-action';
    }    
    public function get_title() {
        return esc_html__( 'Section: Call To Action', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-call-to-action';
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
            'section_title_content',
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
				   '3' => esc_html__( 'Layout 3', 'wpx-elements' ),		                 
				   '4' => esc_html__( 'Layout 4', 'wpx-elements' ),		                 
				   '5' => esc_html__( 'Layout 5', 'wpx-elements' ),		                 
                ],
            ] 
        );    
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icons', 'wpx-elements'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-star',
                    'library' => 'fa-solid',
                ],
                'condition' => array( 'layout' => array( '5' ) ),
            ]
        );      
        $this->add_control(
		    'title_1',
		    [
		        'label' => esc_html__( 'Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Stay connected
                anytime, anywhere', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
                'condition' => array( 'layout' => array( '1', '2', '3', '5' ) ),
		    ]
		);
        $this->add_control(
            'title_tag_1',
            [
                'label' => esc_html__('Title HTML Tag', 'wpx-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title_1' => esc_html__('H1', 'wpx-elements'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title_1' => esc_html__('H2', 'wpx-elements'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title_1' => esc_html__('H3', 'wpx-elements'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title_1' => esc_html__('H4', 'wpx-elements'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title_1' => esc_html__('H5', 'wpx-elements'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title_1' => esc_html__('H6', 'wpx-elements'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
               'default' => 'h2', 
                'toggle' => false,
                'condition' => array( 'layout' => array( '1', '2', '3', '5' ) ),
                 
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
                'condition' => array( 'layout' => array( '1', '2', '3', '5' ) ),
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
                'condition' => array( 'animation_show_hide_title' => array( 'yes' ), 'layout' => array( '1', '2', '3', '5' ) ),
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
                'condition' => array( 'animation_show_hide_title' => array( 'yes' ), 'layout' => array( '1', '2', '3', '5' ) ),
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
                'condition' => array( 'animation_show_hide_title' => array( 'yes' ), 'layout' => array( '1', '2', '3', '5' ) ),
            ]
        );  
        $this->add_control(
		    'description_1',
		    [
		        'label' => esc_html__( 'Description', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Enjoy seamless experience in real time as
                our web and mobile app sync instantly
                across all devices.', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Description is here', 'wpx-elements' ),
                'condition' => array( 'layout' => array( '1', '3' ) ),
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
                'condition' => array( 'layout' => array( '1', '3' ) ),
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
                'condition' => array( 'animation_show_hide_description' => array( 'yes' ), 'layout' => array( '1', '3' ) ),
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
                'condition' => array( 'animation_show_hide_description' => array( 'yes' ), 'layout' => array( '1', '3' ) ),
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
                'condition' => array( 'animation_show_hide_description' => array( 'yes' ), 'layout' => array( '1', '3' ) ),
            ]
        ); 
        $this->add_control(
            'btn_show_hide_1',
            [
                'label' => esc_html__('Button Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => array( 'layout' => array( '1', '3' ) ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_link_text_1',
            [
                'label' => esc_html__('Button Text','wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Sign Up Today',
                'title' => esc_html__('Enter button text','wpx-elements'),
                'condition' => array( 'btn_show_hide_1' => array( 'yes' ), 'layout' => array( '1', '3' ) ),
            ]
        );
        $this->add_control(
            'btn_link_type_1',
            [
                'label' => esc_html__('Button Link Type','wpx-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => array( 'btn_show_hide_1' => array( 'yes' ), 'layout' => array( '1', '3' ) ),
            ]
        );
        $this->add_control(
            'btn_link_1',
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
                    'btn_link_type_1' => '1',
                    'btn_show_hide_1' =>  'yes',
                    'layout' => array( '1', '3' )
                ]
            ]
        );
        $this->add_control(
            'btn_page_link_1',
            [
                'label' => esc_html__('Select Link Page','wpx-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> wpx_get_all_pages(),
                'condition' => [
                    'btn_link_type_1' => '2',
                    'btn_show_hide_1' =>  'yes',
                    'layout' => array( '1', '3' )
                ]
            ]
        );       
        
        $this->add_control(
            'button_show_hide_2',
            [
                'label' => esc_html__('Button Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => array( 'layout' => array( '2' ) ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_link_text_2',
            [
                'label' => esc_html__('Button Text','wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Sign Up Today',
                'title' => esc_html__('Enter button text','wpx-elements'),
                'condition' => array( 'button_show_hide_2' => array( 'yes' ), 'layout' => array( '2' ) ),
            ]
        );
        $this->add_control(
            'btn_link_type_2',
            [
                'label' => esc_html__('Button Link Type','wpx-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => array( 'button_show_hide_2' => array( 'yes' ), 'layout' => array( '2' ) ),
            ]
        );
        $this->add_control(
            'btn_link_2',
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
                    'btn_link_type_2' => '1',
                    'button_show_hide_2' =>  'yes',
                    'layout' => '2'
                ]
            ]
        );
        $this->add_control(
            'btn_page_link_2',
            [
                'label' => esc_html__('Select Link Page','wpx-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> wpx_get_all_pages(),
                'condition' => [
                    'btn_link_type_2' => '2',
                    'button_show_hide_2' =>  'yes',
                    'layout' => '2'
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
                'condition' => array( 'layout' => array( '1', '2', '3' ) ),
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
                'condition' => array( 'animation_show_hide_btn' => array( 'yes' ), 'layout' => array( '1', '2', '3' ) ),
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
                'condition' => array( 'animation_show_hide_btn' => array( 'yes' ), 'layout' => array( '1', '2', '3' ) ),
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
                'condition' => array( 'animation_show_hide_btn' => array( 'yes' ), 'layout' => array( '1', '2', '3' ) ),
            ]
        ); 
        $this->add_control(
            'button_show_hide_5',
            [
                'label' => esc_html__('Button Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => array( 'layout' => array( '5' ) ),
            ]
        );
        $this->add_control(
            'btn_link_text_5',
            [
                'label' => esc_html__('Button Text','wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Learn More',
                'title' => esc_html__('Enter button text','wpx-elements'),
                'condition' => array( 'button_show_hide_5' => array( 'yes' ), 'layout' => array( '5' ) ),
            ]
        );
        $this->add_control(
            'btn_link_type_5',
            [
                'label' => esc_html__('Button Link Type','wpx-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => array( 'button_show_hide_5' => array( 'yes' ), 'layout' => array( '5' ) ),
            ]
        );
        $this->add_control(
            'btn_link_5',
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
                    'btn_link_type_5' => '1',
                    'button_show_hide_5' =>  'yes',
                    'layout' => '5'
                ]
            ]
        );
        $this->add_control(
            'btn_page_link_5',
            [
                'label' => esc_html__('Select Link Page','wpx-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> wpx_get_all_pages(),
                'condition' => [
                    'btn_link_type_5' => '2',
                    'button_show_hide_5' =>  'yes',
                    'layout' => '5'
                ]
            ]
        ); 

        $this->end_controls_section(); 

        $this->start_controls_section(
            'axil_image',
	        [
                'label' => esc_html__('Image','wpx-elements'),
	            'condition' => array( 'layout' => array( '1' ) ),
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __('Image','wpx-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->wpx_get_img( 'banner/8.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],      
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size',
                'default' => 'full',
                'separator' => 'none',
            ]
        ); 
        $this->add_control(
            'animation_show_hide_img',
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
            'sal_animation_img',
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
                'condition' => array( 'animation_show_hide_img' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_img',
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
                'condition' => array( 'animation_show_hide_img' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_img',
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
                'condition' => array( 'animation_show_hide_img' => array( 'yes' ) ),
            ]
        );
        $this->end_controls_section(); 
        
        $this->start_controls_section(
            'section_title_content4_1',
            [
                'label' => esc_html__('Box 1', 'wpx-elements'),
                'condition' => array( 'layout' => array( '4' ) ),
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background1',
				'label' => esc_html__( 'Background', 'textdomain' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .call-to-action-style-3 .left-box',
                'condition' => array( 'layout' => array( '4' ) ),
			]
		);
        $this->add_control(
		    'sub_title_1',
		    [
		        'label' => esc_html__( 'Sub Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'CREWLIX TEAM', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Sub Title is here', 'wpx-elements' ),
                'condition' => array( 'layout' => array( '4' ) ),
		    ]
		);
        $this->add_control(
		    'title_2',
		    [
		        'label' => esc_html__( 'Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Ready to increase productivity?', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
                'condition' => array( 'layout' => array( '4' ) ),
		    ]
		);
        $this->add_control(
            'title_tag_2',
            [
                'label' => esc_html__('Title HTML Tag', 'wpx-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title_2' => esc_html__('H1', 'wpx-elements'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title_2' => esc_html__('H2', 'wpx-elements'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title_2' => esc_html__('H3', 'wpx-elements'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title_2' => esc_html__('H4', 'wpx-elements'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title_2' => esc_html__('H5', 'wpx-elements'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title_2' => esc_html__('H6', 'wpx-elements'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
               'default' => 'h2', 
                'toggle' => false,
                'condition' => array( 'layout' => array( '4' ) ),
                 
            ]
        ); 
        $this->add_control(
		    'description_2',
		    [
		        'label' => esc_html__( 'Description', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Enjoy seamless experience in real time as
                our web and mobile app sync instantly
                across all devices.', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Description is here', 'wpx-elements' ),
                'condition' => array( 'layout' => array( '4' ) ),
		    ]
		);
        $this->add_control(
            'button_show_hide_3',
            [
                'label' => esc_html__('Button Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => array( 'layout' => array( '4' ) ),
            ]
        );
        $this->add_control(
            'btn_link_text_3',
            [
                'label' => esc_html__('Button Text','wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Sign Up Today',
                'title' => esc_html__('Enter button text','wpx-elements'),
                'condition' => array( 'button_show_hide_3' => array( 'yes' ), 'layout' => array( '4' ) ),
            ]
        );
        $this->add_control(
            'btn_link_type_3',
            [
                'label' => esc_html__('Button Link Type','wpx-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => array( 'button_show_hide_3' => array( 'yes' ), 'layout' => array( '4' ) ),
            ]
        );
        $this->add_control(
            'btn_link_3',
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
                    'btn_link_type_3' => '1',
                    'button_show_hide_3' =>  'yes',
                    'layout' => '4'
                ]
            ]
        );
        $this->add_control(
            'btn_page_link_3',
            [
                'label' => esc_html__('Select Link Page','wpx-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> wpx_get_all_pages(),
                'condition' => [
                    'btn_link_type_3' => '2',
                    'button_show_hide_3' =>  'yes',
                    'layout' => '4'
                ]
            ]
        ); 
        $this->add_control(
            'animation_show_hide_box_1',
            [
                'label' => esc_html__('Animation Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => array( 'layout' => array( '4' ) ),
            ]
        );       
        $this->add_control(
            'sal_animation_box_1',
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
                'condition' => array( 'animation_show_hide_box_1' => array( 'yes' ), 'layout' => array( '4' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_box_1',
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
                'condition' => array( 'animation_show_hide_box_1' => array( 'yes' ), 'layout' => array( '4' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_box_1',
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
                'condition' => array( 'animation_show_hide_box_1' => array( 'yes' ), 'layout' => array( '4' ) ),
            ]
        ); 
        $this->end_controls_section();  

        $this->start_controls_section(
            'section_title_content4_2',
            [
                'label' => esc_html__('Box 2', 'wpx-elements'),
                'condition' => array( 'layout' => array( '4' ) ),
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background2',
				'label' => esc_html__( 'Background', 'textdomain' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .call-to-action-style-3 .right-box',
                'condition' => array( 'layout' => array( '4' ) ),
			]
		);
        $this->add_control(
		    'sub_title_2',
		    [
		        'label' => esc_html__( 'Sub Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'CREWLIX TEAM', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Sub Title is here', 'wpx-elements' ),
                'condition' => array( 'layout' => array( '4' ) ),
		    ]
		);
        $this->add_control(
		    'title_3',
		    [
		        'label' => esc_html__( 'Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Work from anywhere and improve productivity with WpX Startup.', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
                'condition' => array( 'layout' => array( '4' ) ),
		    ]
		);
        $this->add_control(
		    'offer_text',
		    [
		        'label' => esc_html__( 'Offer Text', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'It’s free—forever.', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Offer Text is here', 'wpx-elements' ),
                'condition' => array( 'layout' => array( '4' ) ),
		    ]
		);
        $this->add_control(
            'title_tag_3',
            [
                'label' => esc_html__('Title HTML Tag', 'wpx-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title_3' => esc_html__('H1', 'wpx-elements'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title_3' => esc_html__('H2', 'wpx-elements'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title_3' => esc_html__('H3', 'wpx-elements'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title_3' => esc_html__('H4', 'wpx-elements'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title_3' => esc_html__('H5', 'wpx-elements'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title_3' => esc_html__('H6', 'wpx-elements'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
               'default' => 'h2', 
                'toggle' => false,
                'condition' => array( 'layout' => array( '4' ) ),
                 
            ]
        ); 
        $this->add_control(
            'button_show_hide_4',
            [
                'label' => esc_html__('Button Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => array( 'layout' => array( '4' ) ),
            ]
        );
        $this->add_control(
            'btn_link_text_4',
            [
                'label' => esc_html__('Button Text','wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Sign Up Today',
                'title' => esc_html__('Enter button text','wpx-elements'),
                'condition' => array( 'button_show_hide_4' => array( 'yes' ), 'layout' => array( '4' ) ),
            ]
        );
        $this->add_control(
            'btn_link_type_4',
            [
                'label' => esc_html__('Button Link Type','wpx-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => array( 'button_show_hide_4' => array( 'yes' ), 'layout' => array( '4' ) ),
            ]
        );
        $this->add_control(
            'btn_link_4',
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
                    'btn_link_type_4' => '1',
                    'button_show_hide_4' =>  'yes',
                    'layout' => '4'
                ]
            ]
        );
        $this->add_control(
            'btn_page_link_4',
            [
                'label' => esc_html__('Select Link Page','wpx-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> wpx_get_all_pages(),
                'condition' => [
                    'btn_link_type_4' => '2',
                    'button_show_hide_4' =>  'yes',
                    'layout' => '4'
                ]
            ]
        );  
        $this->add_control(
            'animation_show_hide_box_2',
            [
                'label' => esc_html__('Animation Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => array( 'layout' => array( '4' ) ),
            ]
        );       
        $this->add_control(
            'sal_animation_box_2',
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
                'condition' => array( 'animation_show_hide_box_2' => array( 'yes' ), 'layout' => array( '4' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_box_2',
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
                'condition' => array( 'animation_show_hide_box_2' => array( 'yes' ), 'layout' => array( '4' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_box_2',
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
                'condition' => array( 'animation_show_hide_box_2' => array( 'yes' ), 'layout' => array( '4' ) ),
            ]
        ); 
        $this->end_controls_section();  
    } 


    protected function render() {
        $settings = $this->get_settings();
        $allowed_tags = wp_kses_allowed_html( 'post' );  
        $attr1 = '';
        $attr2 = '';
        $attr3 = '';
        $attr4 = '';
        $attr5 = '';
        $btn1 = '';
        $btn2 = '';
        $btn3 = '';
        $btn4 = '';
        $btn5 = '';
        $icon = '<div class="icon-holder"><svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.328125 5.32812V4.67188C0.328125 4.57812 0.359375 4.5 0.421875 4.4375C0.494792 4.36458 0.578125 4.32812 0.671875 4.32812H11.4531L8.48438 1.375C8.45312 1.34375 8.42708 1.30729 8.40625 1.26562C8.38542 1.22396 8.375 1.18229 8.375 1.14062C8.375 1.08854 8.38542 1.04167 8.40625 1C8.42708 0.958333 8.45312 0.927083 8.48438 0.90625L8.95312 0.4375C8.98438 0.40625 9.02083 0.380208 9.0625 0.359375C9.10417 0.338542 9.14583 0.328125 9.1875 0.328125C9.23958 0.328125 9.28125 0.338542 9.3125 0.359375C9.35417 0.380208 9.39062 0.40625 9.42188 0.4375L13.5156 4.51562C13.5677 4.56771 13.6042 4.625 13.625 4.6875C13.6562 4.73958 13.6719 4.80208 13.6719 4.875V5.125C13.6719 5.19792 13.6562 5.26562 13.625 5.32812C13.6042 5.38021 13.5677 5.43229 13.5156 5.48438L9.42188 9.5625C9.39062 9.59375 9.35417 9.61979 9.3125 9.64062C9.28125 9.66146 9.23958 9.67188 9.1875 9.67188C9.14583 9.67188 9.10417 9.66146 9.0625 9.64062C9.02083 9.61979 8.98438 9.59375 8.95312 9.5625L8.48438 9.09375C8.45312 9.0625 8.42708 9.02604 8.40625 8.98438C8.38542 8.94271 8.375 8.90104 8.375 8.85938C8.375 8.81771 8.38542 8.77604 8.40625 8.73438C8.42708 8.69271 8.45312 8.65625 8.48438 8.625L11.4531 5.67188H0.671875C0.578125 5.67188 0.494792 5.64062 0.421875 5.57812C0.359375 5.50521 0.328125 5.42188 0.328125 5.32812Z" fill="white"/>
        </svg></div>';              
        
        if ('1' == $settings['btn_link_type_1']) {

            if ( !empty( $settings['btn_link_1']['url'] ) ) {
                $attr1  = 'href="' . $settings['btn_link_1']['url'] . '"';
                $attr1 .= !empty( $settings['btn_link_1']['is_external'] ) ? ' target="_blank"' : '';
                $attr1 .= !empty( $settings['btn_link_1']['nofollow'] ) ? ' rel="nofollow"' : '';
                
            }
            if ( !empty( $settings['btn_link_text_1'] ) ) {
                $btn1 = '<a class="axil-btn btn-fill mt-2" ' . $attr1 . '>' . $settings['btn_link_text_1'] . '</a>';
            }

        } else {
            $attr1  = 'href="' . get_permalink($settings['btn_page_link_1']) . '"';
            $attr1 .= ' target="_blank"';
            $attr1 .= ' rel="nofollow"';                        
            $btn1 = '<a class="axil-btn btn-fill mt-2" ' . $attr1 . '>' . $settings['btn_link_text_1'] . '</a>';
        } 

        if ('1' == $settings['btn_link_type_2']) {

            if ( !empty( $settings['btn_link_2']['url'] ) ) {
                $attr2  = 'href="' . $settings['btn_link_2']['url'] . '"';
                $attr2 .= !empty( $settings['btn_link_2']['is_external'] ) ? ' target="_blank"' : '';
                $attr2 .= !empty( $settings['btn_link_2']['nofollow'] ) ? ' rel="nofollow"' : '';
                
            }
            if ( !empty( $settings['btn_link_text_2'] ) ) {
                $btn2 = '<a class="axil-btn btn-fill-fixed" ' . $attr2 . '>' . $settings['btn_link_text_2'] . $icon . '</a>';
            }

        } else {
            $attr2  = 'href="' . get_permalink($settings['btn_page_link_2']) . '"';
            $attr2 .= ' target="_blank"';
            $attr2 .= ' rel="nofollow"';                        
            $btn2 = '<a class="axil-btn btn-fill-fixed" ' . $attr2 . '>' . $settings['btn_link_text_2'] . $icon . '</a>';
        }

        if ('1' == $settings['btn_link_type_3']) {

            if ( !empty( $settings['btn_link_3']['url'] ) ) {
                $attr3  = 'href="' . $settings['btn_link_3']['url'] . '"';
                $attr3 .= !empty( $settings['btn_link_3']['is_external'] ) ? ' target="_blank"' : '';
                $attr3 .= !empty( $settings['btn_link_3']['nofollow'] ) ? ' rel="nofollow"' : '';
                
            }
            if ( !empty( $settings['btn_link_text_3'] ) ) {
                $btn3 = '<a class="axil-btn btn-fill-fixed" ' . $attr3 . '>' . $settings['btn_link_text_3'] . $icon . '</a>';
            }

        } else {
            $attr3  = 'href="' . get_permalink($settings['btn_page_link_3']) . '"';
            $attr3 .= ' target="_blank"';
            $attr3 .= ' rel="nofollow"';                        
            $btn3 = '<a class="axil-btn btn-fill-fixed" ' . $attr3 . '>' . $settings['btn_link_text_3'] . $icon . '</a>';
        }

        if ('1' == $settings['btn_link_type_4']) {

            if ( !empty( $settings['btn_link_4']['url'] ) ) {
                $attr4  = 'href="' . $settings['btn_link_4']['url'] . '"';
                $attr4 .= !empty( $settings['btn_link_4']['is_external'] ) ? ' target="_blank"' : '';
                $attr4 .= !empty( $settings['btn_link_4']['nofollow'] ) ? ' rel="nofollow"' : '';
                
            }
            if ( !empty( $settings['btn_link_text_4'] ) ) {
                $btn4 = '<a class="axil-btn btn-fill mt-2" ' . $attr4 . '>' . $settings['btn_link_text_4'] . '</a>';
            }

        } else {
            $attr4  = 'href="' . get_permalink($settings['btn_page_link_4']) . '"';
            $attr4 .= ' target="_blank"';
            $attr4 .= ' rel="nofollow"';                        
            $btn4 = '<a class="axil-btn btn-fill mt-2" ' . $attr4 . '>' . $settings['btn_link_text_4'] . '</a>';
        } 

        if ('1' == $settings['btn_link_type_5']) {

            if ( !empty( $settings['btn_link_5']['url'] ) ) {
                $attr5  = 'href="' . $settings['btn_link_5']['url'] . '"';
                $attr5 .= !empty( $settings['btn_link_5']['is_external'] ) ? ' target="_blank"' : '';
                $attr5 .= !empty( $settings['btn_link_5']['nofollow'] ) ? ' rel="nofollow"' : '';
                
            }
            if ( !empty( $settings['btn_link_text_5'] ) ) {
                $btn5 = '<a class="axil-btn btn-text" ' . $attr5 . '>' . $settings['btn_link_text_5'] . $icon . '</a>';
            }

        } else {
            $attr5  = 'href="' . get_permalink($settings['btn_page_link_5']) . '"';
            $attr5 .= ' target="_blank"';
            $attr5 .= ' rel="nofollow"';                        
            $btn5 = '<a class="axil-btn btn-text" ' . $attr5 . '>' . $settings['btn_link_text_5'] . $icon . '</a>';
        }
        ?>
        <?php  if ( $settings['layout'] == 1 ) {  ?>   
            <div class="call-to-action call-to-action-wrap-1">
                <div class="container-fluid">              
                    <div class="row row-cols-1 row-cols-lg-2">
                        <div class="col">
                            <div class="call-to-action-style-1">
                                <div class="call-to-action-content">
                                    <div class="section-heading heading-left heading-light">
                                        <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                                            <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                                        <?php } ?> 
                                        <?php if ($settings['title_tag_1']) : ?>
                                            <?php  if($settings['title_1']){ ?>
                                                <<?php echo esc_html( $settings['title_tag_1'] );?> class="title">
                                                    <?php echo wpx_kses_intermediate( $settings['title_1'] );?>
                                                </<?php echo esc_html( $settings['title_tag_1'] );?>> 
                                            <?php  } ?>             
                                        <?php endif; ?> 
                                        <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                                            <div data-sal="<?php echo esc_html($settings['sal_animation_description']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_description']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_description']); ?>">
                                        <?php } ?>
                                            <p class="description"><?php echo wpx_kses_intermediate( $settings['description_1'] );?></p>
                                        <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                                        </div>
                                    <?php } ?>
                                    </div>                            
                                    <?php if ( $settings['btn_show_hide_1'] == 'yes') { ?>
                                        <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                                            <div data-sal="<?php echo esc_html($settings['sal_animation_btn']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_btn']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_btn']); ?>">
                                        <?php } ?> 
                                        <?php echo wp_kses( $btn1, $allowed_tags ); ?> 
                                        <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                                            </div>
                                        <?php } ?>      
                                    <?php } ?>  
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="call-to-action-style-1">
                                <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                                    <div data-sal="<?php echo esc_html($settings['sal_animation_img']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img']); ?>">
                                <?php } ?>
                                <div class="call-to-action-thumbnail">
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?>
                                </div>
                                <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>    
                </div>       
            </div>       
        <?php } elseif ( $settings['layout'] == 2 ) { ?>
            <div class="call-to-action call-to-action-wrap-2">
                <div class="container-fluid">
                    <div class="call-to-action-style-2">
                        <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                            <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                        <?php } ?>
                        <?php if ($settings['title_tag_1']) : ?>
                            <?php  if($settings['title_1']){ ?>
                                <<?php echo esc_html( $settings['title_tag_1'] );?> class="title">
                                    <?php echo wpx_kses_intermediate( $settings['title_1'] );?>
                                </<?php echo esc_html( $settings['title_tag_1'] );?>> 
                            <?php  } ?>             
                        <?php endif; ?> 
                        <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                            </div>
                        <?php } ?>
                        <?php if ( $settings['button_show_hide_2'] == 'yes') { ?>
                            <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                                <div data-sal="<?php echo esc_html($settings['sal_animation_btn']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_btn']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_btn']); ?>">
                            <?php } ?>
                                <?php echo $btn2; ?>  
                            <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                                </div>
                            <?php } ?>      
                        <?php } ?> 
                    </div>
                </div>
            </div>
        <?php } elseif ( $settings['layout'] == 3 ) { ?>
            <div class="call-to-action call-to-action-wrap-3">
                <div class="container">
                    <div class="call-to-action-style-3">
                        <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                            <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                        <?php } ?>
                            <?php if ($settings['title_tag_1']) : ?>
                                <?php  if($settings['title_1']){ ?>
                                    <<?php echo esc_html( $settings['title_tag_1'] );?> class="title">
                                        <?php echo wpx_kses_intermediate( $settings['title_1'] );?>
                                    </<?php echo esc_html( $settings['title_tag_1'] );?>> 
                                <?php  } ?>             
                            <?php endif; ?> 
                        <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                            </div>
                        <?php } ?>
                        <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                            <div data-sal="<?php echo esc_html($settings['sal_animation_description']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_description']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_description']); ?>">
                        <?php } ?>
                            <p class="description"><?php echo wpx_kses_intermediate( $settings['description_1'] );?></p>
                        <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                            </div>
                        <?php } ?>
                        <?php if ( $settings['btn_show_hide_1'] == 'yes') { ?>
                            <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                                <div data-sal="<?php echo esc_html($settings['sal_animation_btn']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_btn']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_btn']); ?>">
                            <?php } ?>
                                <?php echo wp_kses( $btn1, $allowed_tags ); ?>    
                            <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                                </div>
                            <?php } ?>    
                        <?php } ?>                              
                    </div>
                </div>
            </div>
        <?php } elseif ( $settings['layout'] == 4 ) { ?>  
            <div class="call-to-action call-to-action-wrap-4">
                <div class="container-fluid">              
                    <div class="row g-4 justify-content-center align-items-center">
                        <?php if ( $settings['animation_show_hide_box_1'] == 'yes') { ?>
                            <div class="col-lg-6" data-sal="<?php echo esc_html($settings['sal_animation_box_1']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_box_1']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_box_1']); ?>">
                        <?php } else { ?>
                            <div class="col-lg-6">
                        <?php } ?>
                            <div class="call-to-action-style-3">
                                <div class="left-box">
                                    <span class="sub-title"><?php echo wpx_kses_intermediate( $settings['sub_title_1'] );?></span>
                                    <?php if ($settings['title_tag_2']) : ?>
                                        <?php  if($settings['title_2']){ ?>
                                            <<?php echo esc_html( $settings['title_tag_2'] );?> class="title">
                                                <?php echo wpx_kses_intermediate( $settings['title_2'] );?>
                                            </<?php echo esc_html( $settings['title_tag_2'] );?>> 
                                        <?php  } ?>             
                                    <?php endif; ?> 
                                    <p class="description"><?php echo wpx_kses_intermediate( $settings['description_2'] );?></p>
                                    <?php if ( $settings['button_show_hide_3'] == 'yes') { ?>
                                        <?php echo $btn3; ?>        
                                    <?php } ?> 
                                </div>
                            </div>
                        </div>
                        <?php if ( $settings['animation_show_hide_box_2'] == 'yes') { ?>
                            <div class="col-lg-6" data-sal="<?php echo esc_html($settings['sal_animation_box_2']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_box_2']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_box_2']); ?>">
                        <?php } else { ?>
                            <div class="col-lg-6">
                        <?php } ?>
                            <div class="call-to-action-style-3">
                                <div class="right-box">
                                    <span class="sub-title"><?php echo wpx_kses_intermediate( $settings['sub_title_2'] );?></span>
                                    <?php if ($settings['title_tag_3']) : ?>
                                        <?php  if($settings['title_3']){ ?>
                                            <<?php echo esc_html( $settings['title_tag_3'] );?> class="title">
                                                <?php echo wpx_kses_intermediate( $settings['title_3'] );?>
                                            </<?php echo esc_html( $settings['title_tag_3'] );?>> 
                                        <?php  } ?>             
                                    <?php endif; ?> 
                                    <?php if ( $settings['button_show_hide_4'] == 'yes') { ?>
                                        <?php echo wp_kses( $btn4, $allowed_tags ); ?>        
                                    <?php } ?> 
                                    <p class="offer-text"><?php echo wpx_kses_intermediate( $settings['offer_text'] );?></p>
                                </div> 
                            </div>
                        </div>
                    </div>    
                </div>       
            </div> 
        <?php } elseif ( $settings['layout'] == 5 ) { ?>
            <div class="call-to-action call-to-action-wrap-5">
                <div class="container">                    
                    <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                        <div class="call-to-action-style-4" data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                    <?php } else { ?>
                        <div class="call-to-action-style-4">
                    <?php } ?>
                        <div class="content">
                            <i class="<?php echo esc_attr( $settings['icon']['value'] ); ?>"></i>
                            <?php if ($settings['title_tag_1']) : ?>
                                <?php  if($settings['title_1']){ ?>
                                    <<?php echo esc_html( $settings['title_tag_1'] );?> class="title">
                                        <?php echo wpx_kses_intermediate( $settings['title_1'] );?>
                                    </<?php echo esc_html( $settings['title_tag_1'] );?>> 
                                <?php  } ?>             
                            <?php endif; ?> 
                        </div>
                        <?php if ( $settings['button_show_hide_5'] == 'yes') { ?>
                            <?php echo $btn5; ?>        
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php }  
    } 
} 
