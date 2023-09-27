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
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class wpx_feature extends Widget_Base {  
 
    public function get_name() {
        return 'wpx-feature';
    }    
    public function get_title() {
        return esc_html__( 'Section: Feature', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-feature';
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
                   '6' => esc_html__( 'Layout 6', 'wpx-elements' ),			                 
                ],
                'separator' => 'after',
            ] 
        );
        $this->add_control(
		    'title',
		    [
		        'label' => esc_html__( 'Section Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Discover how your business can
                work smarter!', 'wpx-elements' ),
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
		        'label' => esc_html__( 'Section Description', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'See who’s present, who’s not, even who’s taking a break.', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Description is here', 'wpx-elements' ),
                'condition' => array( 'layout' => array( '5', '6' ) ), 
                'separator' => 'before',
		    ]
		);
		$this->add_control(
			'videourl',
			[
			    'label'   => esc_html__( 'YouTube Popup URL', 'wpx-elements' ),
			    'type'    => Controls_Manager::URL,
			    'placeholder' => 'https://your-link.com',
                'condition' => array( 'layout' => array( '1' ) ),   
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
                'condition' => array( 'layout' => array( '5', '6' ) ),
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
                'condition' => array( 'animation_show_hide_description' => array( 'yes' ), 'layout' => array( '5', '6' ) ),
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
                'condition' => array( 'animation_show_hide_description' => array( 'yes' ), 'layout' => array( '5', '6' ) ),
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
                'condition' => array( 'animation_show_hide_description' => array( 'yes' ), 'layout' => array( '5', '6' ) ),
            ]
        );              
        $this->end_controls_section();   

        $this->start_controls_section(
            'section_feature_list1',
	        [
                'label' => esc_html__('Feature List','wpx-elements'),
                'condition' => array( 'layout' => array( '2' ) ), 	            
            ]
        );
            $repeater = new Repeater();         
            $repeater->add_control(
                'list_title',
                [
                    'label'   => esc_html__('List Title', 'wpx-elements' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => 'Make announcements',
                ]
            );         
            $repeater->add_control(
                'list_description',
                [
                    'label'   => esc_html__('List Description', 'wpx-elements' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => 'Replace emails for announcements and make sure no one misses the latest updates.',
                ]
            );         
            $repeater->add_control(
                'box_image',
                [
                    'label' => esc_html__( 'Image', 'wpx-elements' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => $this->wpx_get_img( 'icon/bullhorn.svg' ),
                    ],
                ]
            );  
            $repeater->add_control(
                'animation_show_hide_1',
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
                'sal_animation_1',
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
                    'condition' => array( 'animation_show_hide_1' => array( 'yes' ) ),
                ]
            );     
            $repeater->add_control(
                'sal_duration_1',
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
                    'condition' => array( 'animation_show_hide_1' => array( 'yes' ) ),
                ]
            );         
            $repeater->add_control(
                'sal_delay_1',
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
                    'condition' => array( 'animation_show_hide_1' => array( 'yes' ) ),
                ]
            );         
            $this->add_control(
                'sc_option_list_1',
                [
                    'label' => esc_html__('List', 'wpx-elements'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [

                        [
                            'sal_animation_1' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_1' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_1' => esc_html__('100', 'wpx-elements'),
                            'list_title' => esc_html__('Make announcements', 'wpx-elements'),
                            'list_description' => esc_html__('Replace emails for announcements and make sure no one misses the latest updates.', 'wpx-elements'),
                            'box_image' => [
                                'url' => $this->wpx_get_img( 'icon/bullhorn.svg' ),
                            ],
                        ],
                        [
                            'sal_animation_1' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_1' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_1' => esc_html__('100', 'wpx-elements'),
                            'list_title' => esc_html__('Brainstorm with everyone', 'wpx-elements'),
                            'list_description' => esc_html__('Let everyone participate while solving problems, you never know who has the craziest solution.', 'wpx-elements'),
                            'box_image' => [
                                'url' => $this->wpx_get_img( 'icon/clock.svg' ),
                            ],
                        ],
                        [
                            'sal_animation_1' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_1' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_1' => esc_html__('100', 'wpx-elements'),
                            'list_title' => esc_html__('Smart mini cards', 'wpx-elements'),
                            'list_description' => esc_html__('Display upcoming events, birthdays and anniversaries so that nobody misses an important day.', 'wpx-elements'),
                            'box_image' => [
                                'url' => $this->wpx_get_img( 'icon/party.svg' ),
                            ],
                        ],

                    ],
                    'title_field' => '{{{ list_title }}}',
                    'description_field' => '{{{ list_description }}}',              
                ]
            ); 
        $this->end_controls_section(); 

        $this->start_controls_section(
            'section_feature_list2',
	        [
                'label' => esc_html__('Feature List','wpx-elements'),
                'condition' => array( 'layout' => array( '3' ) ), 	            
            ]
        );
            $repeater = new Repeater();         
            $repeater->add_control(
                'list_title2',
                [
                    'label'   => esc_html__('List Title', 'wpx-elements' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => 'Make announcements',
                ]
            );         
            $repeater->add_control(
                'list_description2',
                [
                    'label'   => esc_html__('List Description', 'wpx-elements' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => 'Replace emails for announcements and make sure no one misses the latest updates.',
                ]
            );         
            $repeater->add_control(
                'box_image2',
                [
                    'label' => esc_html__( 'Image', 'wpx-elements' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => $this->wpx_get_img( 'icon/bullhorn.svg' ),
                    ],
                ]
            );  
            $repeater->add_control(
                'animation_show_hide_2',
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
                'sal_animation_2',
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
                    'condition' => array( 'animation_show_hide_2' => array( 'yes' ) ),
                ]
            );     
            $repeater->add_control(
                'sal_duration_2',
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
                    'condition' => array( 'animation_show_hide_2' => array( 'yes' ) ),
                ]
            );         
            $repeater->add_control(
                'sal_delay_2',
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
                    'condition' => array( 'animation_show_hide_2' => array( 'yes' ) ),
                ]
            );        
            $this->add_control(
                'sc_option_list_2',
                [
                    'label' => esc_html__('List', 'wpx-elements'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [

                        [
                            'sal_animation_2' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_2' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_2' => esc_html__('100', 'wpx-elements'),
                            'list_title2' => esc_html__('Individual timesheet', 'wpx-elements'),
                            'list_description2' => esc_html__('Let everyone see their attendance history with a smart summary.', 'wpx-elements'),
                            'box_image2' => [
                                'url' => $this->wpx_get_img( 'icon/document.svg' ),
                            ],
                        ],
                        [
                            'sal_animation_2' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_2' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_2' => esc_html__('100', 'wpx-elements'),
                            'list_title2' => esc_html__('Attendance board', 'wpx-elements'),
                            'list_description2' => esc_html__('Leverage the power of positive competition and eliminate tardiness.', 'wpx-elements'),
                            'box_image2' => [
                                'url' => $this->wpx_get_img( 'icon/calendar.svg' ),
                            ],
                        ],
                        [
                            'sal_animation_2' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_2' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_2' => esc_html__('100', 'wpx-elements'),
                            'list_title2' => esc_html__('Advanced reporting', 'wpx-elements'),
                            'list_description2' => esc_html__('Employers get to export, analyze & review attendance individually.', 'wpx-elements'),
                            'box_image2' => [
                                'url' => $this->wpx_get_img( 'icon/xmlid.svg' ),
                            ],
                        ],

                    ],
                    'title_field2' => '{{{ list_title2 }}}',
                    'description_field2' => '{{{ list_description2 }}}',              
                ]
            ); 
        $this->end_controls_section(); 

        $this->start_controls_section(
            'section_feature_list3',
	        [
                'label' => esc_html__('Feature List','wpx-elements'),
                'condition' => array( 'layout' => array( '4' ) ), 	            
            ]
        );
            $repeater = new Repeater();         
            $repeater->add_control(
                'list_title3',
                [
                    'label'   => esc_html__('List Title', 'wpx-elements' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => 'Make announcements',
                ]
            );         
            $repeater->add_control(
                'list_description3',
                [
                    'label'   => esc_html__('List Description', 'wpx-elements' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => 'Replace emails for announcements and make sure no one misses the latest updates.',
                ]
            );         
            $repeater->add_control(
                'box_image3',
                [
                    'label' => esc_html__( 'Image', 'wpx-elements' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => $this->wpx_get_img( 'icon/bullhorn.svg' ),
                    ],
                ]
            );  
            $repeater->add_control(
                'animation_show_hide_3',
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
                'sal_animation_3',
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
                    'condition' => array( 'animation_show_hide_3' => array( 'yes' ) ),
                ]
            );     
            $repeater->add_control(
                'sal_duration_3',
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
                    'condition' => array( 'animation_show_hide_3' => array( 'yes' ) ),
                ]
            );         
            $repeater->add_control(
                'sal_delay_3',
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
                    'condition' => array( 'animation_show_hide_3' => array( 'yes' ) ),
                ]
            );           
            $this->add_control(
                'sc_option_list_3',
                [
                    'label' => esc_html__('List', 'wpx-elements'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [

                        [
                            'sal_animation_3' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_3' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_3' => esc_html__('100', 'wpx-elements'),
                            'list_title3' => esc_html__('Individual timesheet', 'wpx-elements'),
                            'list_description3' => esc_html__('Let everyone see their attendance history with a smart summary.', 'wpx-elements'),
                            'box_image3' => [
                                'url' => $this->wpx_get_img( 'icon/document.svg' ),
                            ],
                        ],
                        [
                            'sal_animation_3' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_3' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_3' => esc_html__('100', 'wpx-elements'),
                            'list_title3' => esc_html__('Attendance board', 'wpx-elements'),
                            'list_description3' => esc_html__('Leverage the power of positive competition and eliminate tardiness.', 'wpx-elements'),
                            'box_image3' => [
                                'url' => $this->wpx_get_img( 'icon/calendar.svg' ),
                            ],
                        ],
                        [
                            'sal_animation_3' => esc_html__('fade', 'wpx-elements'),
                            'sal_duration_3' => esc_html__('500', 'wpx-elements'),
                            'sal_delay_3' => esc_html__('100', 'wpx-elements'),
                            'list_title3' => esc_html__('Advanced reporting', 'wpx-elements'),
                            'list_description3' => esc_html__('Employers get to export, analyze & review attendance individually.', 'wpx-elements'),
                            'box_image3' => [
                                'url' => $this->wpx_get_img( 'icon/xmlid.svg' ),
                            ],
                        ],

                    ],
                    'title_field3' => '{{{ list_title3 }}}',
                    'description_field3' => '{{{ list_description3 }}}',              
                ]
            ); 
        $this->end_controls_section(); 

        $this->start_controls_section(
            'section_title_image1',
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
                        'url' => $this->wpx_get_img( 'banner/2.jpg' ),
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

        $this->start_controls_section(
            'section_button',
	        [
                'label' => esc_html__('Button','wpx-elements'),	  
                'condition' => array( 'layout' => array( '5', '6' ) ),        
            ]
        );
            $this->add_control(
                'btn_show_hide',
                [
                    'label' => esc_html__('Default Button Show Hide', 'wpx-elements'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Show', 'wpx-elements'),
                    'label_off' => esc_html__('Hide', 'wpx-elements'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'btn_link_text',
                [
                    'label' => esc_html__('Default Button Text','wpx-elements'),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Become a remote work guru',
                    'title' => esc_html__('Enter button text','wpx-elements'),
                    'condition' => array( 'btn_show_hide' => array( 'yes' ) ),
                ]
            );
            $this->add_control(
                'btn_link_type',
                [
                    'label' => esc_html__('Default Button Link Type','wpx-elements'),
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
                    'default' => 'yes',
                    'condition' => array( 'btn_show_hide' => array( 'yes' ), 'layout' => array( '5', '6' ) ),
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
                    'condition' => array( 'btn_show_hide' => array( 'yes' ), 'animation_show_hide_btn' => array( 'yes' ), 'layout' => array( '5', '6' ) ),
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
                    'condition' => array( 'btn_show_hide' => array( 'yes' ), 'animation_show_hide_btn' => array( 'yes' ), 'layout' => array( '5', '6' ) ),
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
                    'condition' => array( 'btn_show_hide' => array( 'yes' ), 'animation_show_hide_btn' => array( 'yes' ), 'layout' => array( '5', '6' ) ),
                ]
            );  
        $this->end_controls_section();
    } 


    protected function render() {
        $settings = $this->get_settings();
        $simagev        =  $settings['videourl']['url'];
        $attr = '';
        $btn = '';
        $allowed_tags = wp_kses_allowed_html( 'post' );   
        $icon = '<div class="icon-holder"><svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.980469 6.66016V5.83984C0.980469 5.72266 1.01953 5.625 1.09766 5.54688C1.1888 5.45573 1.29297 5.41016 1.41016 5.41016H14.8867L11.1758 1.71875C11.1367 1.67969 11.1042 1.63411 11.0781 1.58203C11.0521 1.52995 11.0391 1.47786 11.0391 1.42578C11.0391 1.36068 11.0521 1.30208 11.0781 1.25C11.1042 1.19792 11.1367 1.15885 11.1758 1.13281L11.7617 0.546875C11.8008 0.507812 11.8464 0.47526 11.8984 0.449219C11.9505 0.423177 12.0026 0.410156 12.0547 0.410156C12.1198 0.410156 12.1719 0.423177 12.2109 0.449219C12.263 0.47526 12.3086 0.507812 12.3477 0.546875L17.4648 5.64453C17.5299 5.70964 17.5755 5.78125 17.6016 5.85938C17.6406 5.92448 17.6602 6.0026 17.6602 6.09375V6.40625C17.6602 6.4974 17.6406 6.58203 17.6016 6.66016C17.5755 6.72526 17.5299 6.79036 17.4648 6.85547L12.3477 11.9531C12.3086 11.9922 12.263 12.0247 12.2109 12.0508C12.1719 12.0768 12.1198 12.0898 12.0547 12.0898C12.0026 12.0898 11.9505 12.0768 11.8984 12.0508C11.8464 12.0247 11.8008 11.9922 11.7617 11.9531L11.1758 11.3672C11.1367 11.3281 11.1042 11.2826 11.0781 11.2305C11.0521 11.1784 11.0391 11.1263 11.0391 11.0742C11.0391 11.0221 11.0521 10.9701 11.0781 10.918C11.1042 10.8659 11.1367 10.8203 11.1758 10.7812L14.8867 7.08984H1.41016C1.29297 7.08984 1.1888 7.05078 1.09766 6.97266C1.01953 6.88151 0.980469 6.77734 0.980469 6.66016Z" fill="#FF7F5C"/></svg></div>';        

        if ('1' == $settings['btn_link_type']) {

            if ( !empty( $settings['btn_link']['url'] ) ) {
                $attr  = 'href="' . $settings['btn_link']['url'] . '"';
                $attr .= !empty( $settings['btn_link']['is_external'] ) ? ' target="_blank"' : '';
                $attr .= !empty( $settings['btn_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                
            }
            if ( !empty( $settings['btn_link_text'] ) ) {
                $btn = '<a class="feature-btn" ' . $attr . '>' . $settings['btn_link_text'] . $icon . '</a>';
            }

        } else {
            $attr  = 'href="' . get_permalink($settings['btn_page_link']) . '"';
            $attr .= ' target="_blank"';
            $attr .= ' rel="nofollow"';                        
            $btn = '<a class="feature-btn" ' . $attr . '>' . $settings['btn_link_text'] . $icon . '</a>';
        }
        ?>
        <?php  if ( $settings['layout'] == 1 ) {  ?>       
            <div class="container">
                <div class="section-heading heading-center heading-dark">
                    <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                        <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                    <?php } ?> 
                    <?php if ($settings['title_tag']) : ?>
                        <?php if($settings['title']) { ?>                          
                            <<?php echo esc_html( $settings['title_tag'] );?> class="title title-default">                            
                            <?php echo wpx_kses_intermediate( $settings['title'] );?>
                            </<?php echo esc_html( $settings['title_tag'] );?>> 
                        <?php } ?>             
                    <?php endif; ?>
                    <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                        </div>
                    <?php } ?> 
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="feature-style-1">                        
                            <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                                <div data-sal="<?php echo esc_html($settings['sal_animation_img']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img']); ?>">
                            <?php } ?> 
                            <div class="thumbnail">                         
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?>
                                <?php if ( !empty( $settings['videourl']['url'] ) ): ?> 
                                    <div class="popup-video">
                                        <a href="<?php echo esc_url( $simagev );?>" class="play-btn popup-youtube"><i class="fas fa-play"></i></a>
                                    </div>
                                <?php endif; ?>  
                            </div>
                            <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                                </div>
                            <?php } ?> 
                        </div>
                    </div>
                </div>
            </div>      
        <?php } elseif ( $settings['layout'] == 2 ) { ?>           
            <div class="feature feature-wrap-2">   
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
                    </div>                 
                    <div class="row row-cols-1 row-cols-lg-2">
                        <div class="col">
                            <div class="feature-style-2 justify-content-center">
                            <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                                <div data-sal="<?php echo esc_html($settings['sal_animation_img']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img']); ?>">
                            <?php } ?> 
                                    <div class="feature-thumbnail">
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?>
                                    </div>
                                </div>
                            <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                            </div>
                            <?php } ?> 
                        </div>
                        <div class="col">
                            <div class="feature-style-2">
                                <div class="feature-content">
                                    <ul class="list-content">
                                        <?php foreach ($settings['sc_option_list_1'] as $sc_option_list_1):
                                        ?>                                            
                                        <?php if ( $sc_option_list_1['animation_show_hide_1'] == 'yes') { ?>
                                            <li data-sal="<?php echo esc_html($sc_option_list_1['sal_animation_1']); ?>" data-sal-duration="<?php echo esc_html($sc_option_list_1['sal_duration_1']); ?>" data-sal-delay="<?php echo esc_html($sc_option_list_1['sal_delay_1']); ?>">
                                        <?php } else { ?> 
                                            <li>
                                        <?php } ?> 
                                                <div class="icon-holder">
                                                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $sc_option_list_1, 'full', 'box_image' );?>
                                                </div>
                                                <div class="text-holder">
                                                    <h3 class="title"><?php echo esc_html($sc_option_list_1['list_title']); ?></h3>                                            
                                                    <p class="description"><?php echo esc_html($sc_option_list_1['list_description']); ?></p>
                                                </div> 
                                            </li>
                                        <?php endforeach; ?>                                
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>          
        <?php } elseif ( $settings['layout'] == 3 ) { ?>
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="feature-style-3">
                            <div class="feature-content">
                                <div class="section-heading heading-left heading-dark">
                                    <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                                        <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                                    <?php } ?> 
                                    <?php if ($settings['title_tag']) : ?>
                                        <?php  if($settings['title']){ ?>
                                            <<?php echo esc_html( $settings['title_tag'] );?> class="title title-medium mb-0">
                                                <?php echo wpx_kses_intermediate( $settings['title'] );?>
                                            </<?php echo esc_html( $settings['title_tag'] );?>> 
                                        <?php  } ?>             
                                    <?php endif; ?> 
                                    <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <ul class="list-content">
                                    <?php foreach ($settings['sc_option_list_2'] as $sc_option_list_2): ?>
                                        <?php if ( $sc_option_list_2['animation_show_hide_2'] == 'yes') { ?>
                                            <li data-sal="<?php echo esc_html($sc_option_list_2['sal_animation_2']); ?>" data-sal-duration="<?php echo esc_html($sc_option_list_2['sal_duration_2']); ?>" data-sal-delay="<?php echo esc_html($sc_option_list_2['sal_delay_2']); ?>">
                                        <?php } else { ?> 
                                            <li>
                                        <?php } ?> 
                                            <div class="icon-holder">
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $sc_option_list_2, 'full', 'box_image2' );?>
                                            </div>
                                            <div class="text-holder">
                                                <h3 class="title"><?php echo esc_html($sc_option_list_2['list_title2']); ?></h3>                                            
                                                <p class="description"><?php echo esc_html($sc_option_list_2['list_description2']); ?></p>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>                                
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="feature-style-3">
                            <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                                <div data-sal="<?php echo esc_html($settings['sal_animation_img']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img']); ?>">
                            <?php } ?> 
                            <div class="feature-thumbnail">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?>
                            </div>
                            <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } elseif ( $settings['layout'] == 4 ) { ?>
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="feature-style-3">
                            <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                                <div data-sal="<?php echo esc_html($settings['sal_animation_img']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img']); ?>">
                            <?php } ?>
                            <div class="feature-thumbnail">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?>
                            </div>
                            <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="feature-style-3">
                            <div class="feature-content">
                                <div class="section-heading heading-left heading-dark">
                                    <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                                        <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                                    <?php } ?> 
                                    <?php if ($settings['title_tag']) : ?>
                                        <?php  if($settings['title']){ ?>
                                            <<?php echo esc_html( $settings['title_tag'] );?> class="title title-medium mb-0">
                                                <?php echo wpx_kses_intermediate( $settings['title'] );?>
                                            </<?php echo esc_html( $settings['title_tag'] );?>> 
                                        <?php  } ?>             
                                    <?php endif; ?> 
                                    <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <ul class="list-content">
                                    <?php foreach ($settings['sc_option_list_3'] as $sc_option_list_3): ?>
                                        <?php if ( $sc_option_list_3['animation_show_hide_3'] == 'yes') { ?>
                                            <li data-sal="<?php echo esc_html($sc_option_list_3['sal_animation_3']); ?>" data-sal-duration="<?php echo esc_html($sc_option_list_3['sal_duration_3']); ?>" data-sal-delay="<?php echo esc_html($sc_option_list_3['sal_delay_3']); ?>">
                                        <?php } else { ?> 
                                            <li>
                                        <?php } ?>
                                            <div class="icon-holder">
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $sc_option_list_3, 'full', 'box_image3' );?>
                                            </div>
                                            <div class="text-holder">
                                                <h3 class="title"><?php echo esc_html($sc_option_list_3['list_title3']); ?></h3>                                            
                                                <p class="description"><?php echo esc_html($sc_option_list_3['list_description3']); ?></p>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>                                
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } elseif ( $settings['layout'] == 5 ) { ?>
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="feature-style-5">
                            <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                                <div data-sal="<?php echo esc_html($settings['sal_animation_img']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img']); ?>">
                            <?php } ?>
                            <div class="feature-thumbnail">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?>
                            </div>
                            <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-style-5">
                            <div class="feature-content">
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
                                <p class="description"><?php echo wpx_kses_intermediate( $settings['description'] );?></p>
                                <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                                    </div>
                                <?php } ?>
                                <?php if ( $settings['btn_show_hide'] == 'yes') { ?>
                                    <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                                        <div data-sal="<?php echo esc_html($settings['sal_animation_btn']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_btn']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_btn']); ?>">
                                    <?php } ?> 
                                        <?php echo $btn; ?> 
                                    <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                                        </div>
                                    <?php } ?>     
                                <?php } ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } elseif ( $settings['layout'] == 6 ) { ?>
            <div class="container">
                <div class="row g-4">                   
                    <div class="col-lg-6">
                        <div class="feature-style-5">
                            <div class="feature-content">
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
                                    <p class="description"><?php echo wpx_kses_intermediate( $settings['description'] );?></p>
                                <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                                    </div>
                                <?php } ?>
                                <?php if ( $settings['btn_show_hide'] == 'yes') { ?>
                                    <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                                        <div data-sal="<?php echo esc_html($settings['sal_animation_btn']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_btn']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_btn']); ?>">
                                    <?php } ?> 
                                        <?php echo $btn; ?> 
                                    <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                                        </div>
                                    <?php } ?>     
                                <?php } ?> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-style-5">
                            <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                                <div data-sal="<?php echo esc_html($settings['sal_animation_img']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img']); ?>">
                            <?php } ?>
                            <div class="feature-thumbnail">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?>
                            </div>
                            <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>      
        <?php }  
    } 
} 
