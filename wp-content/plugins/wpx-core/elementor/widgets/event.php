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
class wpx_event extends Widget_Base {  
 
    public function get_name() {
        return 'wpx-event';
    }    
    public function get_title() {
        return esc_html__( 'Section: Event', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-event';
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
		    'title',
		    [
		        'label' => esc_html__( 'Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Everything Starts With the Culture', 'wpx-elements' ),
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
		    'description',
		    [
		        'label' => esc_html__( 'Description', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'When there’s room for everyone to share their thoughts, participate, and get involved freely with each other, a creative culture evolves.', 'wpx-elements' ),
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
        $this->end_controls_section();   

        $this->start_controls_section(
            'wpx_btn',
            [
                'label' => esc_html__( 'Button', 'wpx-elements' ),
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
        $this->add_control(
            'animation_show_hide_btn',
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
                'condition' => array( 'animation_show_hide_btn' => array( 'yes' ) ),
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
                'condition' => array( 'animation_show_hide_btn' => array( 'yes' ) ),
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
                'condition' => array( 'animation_show_hide_btn' => array( 'yes' ) ),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_image',
	        [
                'label' => esc_html__('Image','wpx-elements'),	          
            ]
        );
            $this->add_control(
                'image',
                [
                    'label' => __('Image','wpx-elements'),
                    'type'=>Controls_Manager::MEDIA,
                    'default' => [
                        'url' => $this->wpx_get_img( 'banner/14.png' ),
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
                    'default' => 'yes',
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
                $btn = '<a class="axil-btn btn-fill-fixed" ' . $attr . '>' . $settings['btn_link_text'] . $icon . '</a>';
            }

        } else {
            $attr  = 'href="' . get_permalink($settings['btn_page_link']) . '"';
            $attr .= ' target="_blank"';
            $attr .= ' rel="nofollow"';                        
            $btn = '<a class="axil-btn btn-fill-fixed" ' . $attr . '>' . $settings['btn_link_text'] . $icon . '</a>';
        }  
        ?>
        <div class="event event-wrap-1">
            <div class="container">
                <div class="section-heading heading-center heading-light">
                    <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                        <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                    <?php } ?> 
                    <?php if ($settings['title_tag']) : ?>
                        <?php  if($settings['title']){ ?>
                            <<?php echo esc_html( $settings['title_tag'] );?> class="title title-default">
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
                    <p class="description"><?php echo wpx_kses_intermediate( $settings['description'] );?></p>
                    <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                        </div>
                    <?php } ?>
                    <?php if ( $settings['button_show_hide'] == 'yes') { ?>
                        <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                            <div data-sal="<?php echo esc_html($settings['sal_animation_btn']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_btn']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_btn']); ?>">
                        <?php } ?>
                        <div class="mt-4">
                            <?php echo $btn; ?>   
                        </div>
                        <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                            </div>
                        <?php } ?> 
                    <?php } ?>
                </div>
                <div class="event-style-1">
                    <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                        <div data-sal="<?php echo esc_html($settings['sal_animation_img']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img']); ?>">
                    <?php } ?>
                    <div class="event-thumbnail">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?>
                    </div>
                    <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                        </div>
                    <?php } ?> 
                </div>
            </div>
        </div>
    <?php
    } 
} 
