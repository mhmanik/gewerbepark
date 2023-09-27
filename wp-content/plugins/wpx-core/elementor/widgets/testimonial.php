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
class wpx_testimonial extends Widget_Base {  
 
    public function get_name() {
        return 'wpx-testimonial';
    }    
    public function get_title() {
        return esc_html__( 'Section: Testimonial', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-testimonial';
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
                ],
            ] 
        );
        $this->add_control(
		    'title',
		    [
		        'label' => esc_html__( 'Section Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( '“Our HR team consists of just one executive and WpX. It takes care of our entire HR operations and everyone loves it for its simplicity.”', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
		    ]
		); 
        $this->add_control(
		    'sub_title',
		    [
		        'label' => esc_html__( 'Section Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Kevin Hudson, Chief Operations Officer', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
                'condition' => array( 'layout' => array( '1' ) ),
		    ]
		); 
        $this->add_control(
            'image',
            [
                'label' => __('Image','wpx-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->wpx_get_img( 'testimonial/1.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],  
                'condition' => array( 'layout' => array( '1' ) ),    
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size',
                'default' => 'full',
                'separator' => 'none',
                'condition' => array( 'layout' => array( '1' ) ),
            ]
        );  
        $this->add_control(
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
        $this->add_control(
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
        $this->add_control(
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
        $this->add_control(
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
        $this->end_controls_section();  

        $this->start_controls_section(
            'wpx_btn',
            [
                'label' => esc_html__( 'Testimonial Button', 'wpx-elements' ),
                'condition' => array( 'layout' => array( '2' ) ),
            ]
        );
        $this->add_control(
            'button_show_hide',
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
                'condition' => array( 'button_show_hide' => array( 'yes' ) ),
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
                'condition' => array( 'button_show_hide' => array( 'yes' ) ),
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
                    'button_show_hide' =>  'yes'
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
                    'button_show_hide' =>  'yes'
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
            'image1',
            [
                'label' => __('Image','wpx-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->wpx_get_img( 'testimonial/2.jpg' ),
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
            'animation_show_hide_img1',
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
            'sal_animation_img1',
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
                'condition' => array( 'animation_show_hide_img1' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_img1',
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
                'condition' => array( 'animation_show_hide_img1' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_img1',
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
                'condition' => array( 'animation_show_hide_img1' => array( 'yes' ) ),
            ]
        );  
        $this->add_control(
            'image2',
            [
                'label' => __('Image','wpx-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->wpx_get_img( 'testimonial/3.jpg' ),
                ],
                'dynamic' => [
                    'active' => true,
                ], 
                'separator' => 'before',     
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
            'animation_show_hide_img2',
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
            'sal_animation_img2',
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
                'condition' => array( 'animation_show_hide_img2' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_img2',
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
                'condition' => array( 'animation_show_hide_img2' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_img2',
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
                'condition' => array( 'animation_show_hide_img2' => array( 'yes' ) ),
            ]
        ); 
        $this->add_control(
            'image3',
            [
                'label' => __('Image','wpx-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->wpx_get_img( 'testimonial/4.jpg' ),
                ],
                'dynamic' => [
                    'active' => true,
                ], 
                'separator' => 'before',      
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size3',
                'default' => 'full',
                'separator' => 'none',
            ]
        ); 
        $this->add_control(
            'animation_show_hide_img3',
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
            'sal_animation_img3',
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
                'condition' => array( 'animation_show_hide_img3' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_img3',
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
                'condition' => array( 'animation_show_hide_img3' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_img3',
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
                'condition' => array( 'animation_show_hide_img3' => array( 'yes' ) ),
            ]
        ); 
        $this->add_control(
            'image4',
            [
                'label' => __('Image','wpx-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->wpx_get_img( 'testimonial/5.jpg' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],   
                'separator' => 'before',    
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size4',
                'default' => 'full',
                'separator' => 'none',
            ]
        ); 
        $this->add_control(
            'animation_show_hide_img4',
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
            'sal_animation_img4',
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
                'condition' => array( 'animation_show_hide_img4' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_img4',
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
                'condition' => array( 'animation_show_hide_img4' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_img4',
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
                'condition' => array( 'animation_show_hide_img4' => array( 'yes' ) ),
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
            'image5',
            [
                'label' => __('Image','wpx-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->wpx_get_img( 'testimonial/6.jpg' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],      
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size5',
                'default' => 'full',
                'separator' => 'none',
            ]
        ); 
        $this->add_control(
            'animation_show_hide_img5',
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
            'sal_animation_img5',
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
                'condition' => array( 'animation_show_hide_img5' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_img5',
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
                'condition' => array( 'animation_show_hide_img5' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_img5',
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
                'condition' => array( 'animation_show_hide_img5' => array( 'yes' ) ),
            ]
        );  
        $this->add_control(
            'image6',
            [
                'label' => __('Image','wpx-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->wpx_get_img( 'testimonial/7.jpg' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],      
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size6',
                'default' => 'full',
                'separator' => 'none',
            ]
        ); 
        $this->add_control(
            'animation_show_hide_img6',
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
            'sal_animation_img6',
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
                'condition' => array( 'animation_show_hide_img6' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_img6',
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
                'condition' => array( 'animation_show_hide_img6' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_img6',
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
                'condition' => array( 'animation_show_hide_img6' => array( 'yes' ) ),
            ]
        );  
        $this->add_control(
            'image7',
            [
                'label' => __('Image','wpx-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->wpx_get_img( 'testimonial/8.jpg' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],      
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size7',
                'default' => 'full',
                'separator' => 'none',
            ]
        ); 
        $this->add_control(
            'animation_show_hide_img7',
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
            'sal_animation_img7',
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
                'condition' => array( 'animation_show_hide_img7' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_img7',
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
                'condition' => array( 'animation_show_hide_img7' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_img7',
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
                'condition' => array( 'animation_show_hide_img7' => array( 'yes' ) ),
            ]
        );  
        $this->add_control(
            'image8',
            [
                'label' => __('Image','wpx-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->wpx_get_img( 'testimonial/9.jpg' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],      
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size8',
                'default' => 'full',
                'separator' => 'none',
            ]
        ); 
        $this->add_control(
            'animation_show_hide_img8',
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
            'sal_animation_img8',
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
                'condition' => array( 'animation_show_hide_img8' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_img8',
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
                'condition' => array( 'animation_show_hide_img8' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_img8',
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
                'condition' => array( 'animation_show_hide_img8' => array( 'yes' ) ),
            ]
        );  
        $this->end_controls_section(); 
    } 


    protected function render() {
        $settings = $this->get_settings();
        $attr = '';
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
        <?php  if ( $settings['layout'] == 1 ) {  ?>   
            <div class="testimonial testimonial-wrap-1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="testimonial-style-1 d-flex align-items-center h-100">
                                <?php if ( $settings['animation_show_hide_content'] == 'yes') { ?>
                                    <div data-sal="<?php echo esc_html($settings['sal_animation_content']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_content']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_content']); ?>">
                                <?php } ?>
                                <div class="testimonial-content">
                                    <blockquote><?php echo wpx_kses_intermediate( $settings['title'] );?></blockquote>
                                    <div class="designation"><?php echo wpx_kses_intermediate( $settings['sub_title'] );?></div>
                                    <div class="client-thumbnail">
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?> 
                                    </div>
                                </div>
                                <?php if ( $settings['animation_show_hide_content'] == 'yes') { ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testimonial-style-1">
                                <div class="testimonial-thumbnail">
                                    <div class="row g-4" data-masonry='{"percentPosition": true }'>
                                        <div class="col-6 mt-5">
                                        <?php if ( $settings['animation_show_hide_img1'] == 'yes') { ?>
                                            <div data-sal="<?php echo esc_html($settings['sal_animation_img1']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img1']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img1']); ?>">
                                        <?php } ?>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size1', 'image1' );?>
                                        <?php if ( $settings['animation_show_hide_img1'] == 'yes') { ?>
                                            </div>
                                        <?php } ?>
                                        </div>
                                        <div class="col-6">
                                        <?php if ( $settings['animation_show_hide_img2'] == 'yes') { ?>
                                            <div data-sal="<?php echo esc_html($settings['sal_animation_img2']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img2']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img2']); ?>">
                                        <?php } ?>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size2', 'image2' );?>
                                        <?php if ( $settings['animation_show_hide_img2'] == 'yes') { ?>
                                            </div>
                                        <?php } ?>
                                        </div>
                                        <div class="col-6">
                                        <?php if ( $settings['animation_show_hide_img3'] == 'yes') { ?>
                                            <div data-sal="<?php echo esc_html($settings['sal_animation_img3']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img3']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img3']); ?>">
                                        <?php } ?>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size3', 'image3' );?>
                                        <?php if ( $settings['animation_show_hide_img3'] == 'yes') { ?>
                                            </div>
                                        <?php } ?>
                                        </div>
                                        <div class="col-6">
                                        <?php if ( $settings['animation_show_hide_img4'] == 'yes') { ?>
                                            <div data-sal="<?php echo esc_html($settings['sal_animation_img4']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img4']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img4']); ?>">
                                        <?php } ?>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size4', 'image4' );?>
                                        <?php if ( $settings['animation_show_hide_img4'] == 'yes') { ?>
                                            </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>  
        <?php } elseif ( $settings['layout'] == 2 ) { ?>           
            <div class="testimonial testimonial-wrap-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="testimonial-style-2 d-flex align-items-center h-100">
                                <?php if ( $settings['animation_show_hide_content'] == 'yes') { ?>
                                    <div data-sal="<?php echo esc_html($settings['sal_animation_content']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_content']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_content']); ?>">
                                <?php } ?>
                                <div class="testimonial-content">
                                    <blockquote><?php echo wpx_kses_intermediate( $settings['title'] );?></blockquote>
                                    <?php if ( $settings['button_show_hide'] == 'yes') { ?>
                                        <?php echo $btn; ?>   
                                    <?php } ?>
                                </div>
                                <?php if ( $settings['animation_show_hide_content'] == 'yes') { ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testimonial-style-2">
                                <div class="testimonial-thumbnail">
                                    <div class="row g-4 mt-3" data-masonry='{"percentPosition": true }'>
                                    <div class="col-6 mt-5">
                                        <?php if ( $settings['animation_show_hide_img5'] == 'yes') { ?>
                                            <div data-sal="<?php echo esc_html($settings['sal_animation_img5']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img5']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img5']); ?>">
                                        <?php } ?>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size5', 'image5' );?>
                                        <?php if ( $settings['animation_show_hide_img5'] == 'yes') { ?>
                                            </div>
                                        <?php } ?>
                                        </div>
                                        <div class="col-6">
                                        <?php if ( $settings['animation_show_hide_img6'] == 'yes') { ?>
                                            <div data-sal="<?php echo esc_html($settings['sal_animation_img6']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img6']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img6']); ?>">
                                        <?php } ?>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size6', 'image6' );?>
                                        <?php if ( $settings['animation_show_hide_img6'] == 'yes') { ?>
                                            </div>
                                        <?php } ?>
                                        </div>
                                        <div class="col-6">
                                        <?php if ( $settings['animation_show_hide_img7'] == 'yes') { ?>
                                            <div data-sal="<?php echo esc_html($settings['sal_animation_img7']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img7']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img7']); ?>">
                                        <?php } ?>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size7', 'image7' );?>
                                        <?php if ( $settings['animation_show_hide_img7'] == 'yes') { ?>
                                            </div>
                                        <?php } ?>
                                        </div>
                                        <div class="col-6">
                                        <?php if ( $settings['animation_show_hide_img8'] == 'yes') { ?>
                                            <div data-sal="<?php echo esc_html($settings['sal_animation_img8']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img8']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img8']); ?>">
                                        <?php } ?>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size8', 'image8' );?>
                                        <?php if ( $settings['animation_show_hide_img8'] == 'yes') { ?>
                                            </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        <?php }  
    } 
} 
