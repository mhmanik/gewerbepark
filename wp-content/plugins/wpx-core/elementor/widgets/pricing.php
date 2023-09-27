<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */

namespace wpx\wpx_elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class wpx_pricing extends Widget_Base {  
 
    public function get_name() {
        return 'wpx-pricing';
    }    
    public function get_title() {
        return esc_html__( 'Section: Pricing', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-pricing';
    }
    public function get_categories() {
        return [ WPX_ELEMENTS_THEME_PREFIX . '-widgets' ];
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
            'section_title_content1',
            [
                'label' => esc_html__('Pricing Table 1', 'wpx-elements'),
            ]
        );
        $this->add_control(
		    'title1',
		    [
		        'label' => esc_html__( 'Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'WpX startup', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
		    ]
		);
        $this->add_control(
            'title_tag1',
            [
                'label' => esc_html__('Title HTML Tag', 'wpx-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title1' => esc_html__('H1', 'wpx-elements'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title1' => esc_html__('H2', 'wpx-elements'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title1' => esc_html__('H3', 'wpx-elements'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title1' => esc_html__('H4', 'wpx-elements'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title1' => esc_html__('H5', 'wpx-elements'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title1' => esc_html__('H6', 'wpx-elements'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
               'default' => 'h2', 
                'toggle' => false,                 
            ]
        );    
        $this->add_control(
		    'sub_title1',
		    [
		        'label' => esc_html__( 'Sub Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Up to 10 users', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
		    ]
		);         
        $this->add_control(
		    'price1',
		    [
		        'label' => esc_html__( 'Price', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( '$0', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
		    ]
		); 
        $this->add_control(
            'button_show_hide1',
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
            'button_link_text1',
            [
                'label' => esc_html__('Default Button Text','wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Start Lifetime FREE Access',
                'title' => esc_html__('Enter button text','wpx-elements'),
                'condition' => array( 'button_show_hide1' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'button_link_type1',
            [
                'label' => esc_html__('Default Button Link Type','wpx-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => array( 'button_show_hide1' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'button_link1',
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
                    'button_link_type1' => '1',
                    'button_show_hide1' =>  'yes'
                ]
            ]
        );
        $this->add_control(
            'button_page_link1',
            [
                'label' => esc_html__('Select Link Page','wpx-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> wpx_get_all_pages(),
                'condition' => [
                    'button_link_type1' => '2',
                    'button_show_hide1' =>  'yes'
                ]
            ]
        ); 
        $repeater = new Repeater();
        $repeater->add_control(
            'info_title1',
            [
                'label' => esc_html__('Title', 'wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('No Cridit Card', 'wpx-elements'),
            ]
        );
        $repeater->add_control(
            'icon1',
            [
                'label' => esc_html__('Icons', 'wpx-elements'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-university',
                    'library' => 'fa-solid',
                ],
            ]
        );      
        $this->add_control(
            'sc_option_list1',
            [
                'label' => esc_html__('List', 'wpx-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'info_title1' => esc_html__('Employee management', 'wpx-elements'),
                        'icon1' => [
                            'value' => 'fas fa-user-friends',
                        ],
                    ],
                    [
                        'info_title1' => esc_html__('Time & attendance', 'wpx-elements'),
                        'icon1' => [
                            'value' => 'far fa-clock',
                        ],
                    ],
                    [
                        'info_title1' => esc_html__('Leave management', 'wpx-elements'),
                        'icon1' => [
                            'value' => 'far fa-calendar-times',
                        ],
                    ],
                    [
                        'info_title1' => esc_html__('Engagement/Posting', 'wpx-elements'),
                        'icon1' => [
                            'value' => 'fas fa-grip-horizontal',
                        ],
                    ],
                    [
                        'info_title1' => esc_html__('Employee onboarding', 'wpx-elements'),
                        'icon1' => [
                            'value' => 'fas fa-rocket',
                        ],
                    ],
                    [
                        'info_title1' => esc_html__('Office calendar', 'wpx-elements'),
                        'icon1' => [
                            'value' => 'far fa-calendar-alt',
                        ],
                    ],
                    [
                        'info_title1' => esc_html__('Smart reporting', 'wpx-elements'),
                        'icon1' => [
                            'value' => 'fas fa-chart-bar',
                        ],
                    ],
                ],
                'title_field' => '{{{ info_title1 }}}',
            ]
        );
        $this->add_control(
            'animation_show_hide_1',
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
                'default' => 'fade',
                'condition' => array( 'animation_show_hide_1' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
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
                'default' => '500',
                'condition' => array( 'animation_show_hide_1' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
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
                'default' => '100',
                'condition' => array( 'animation_show_hide_1' => array( 'yes' ) ),
            ]
        );
        $this->end_controls_section(); 

        $this->start_controls_section(
            'section_title_content2',
            [
                'label' => esc_html__('Pricing Table 2', 'wpx-elements'),
            ]
        );
        $this->add_control(
		    'title2',
		    [
		        'label' => esc_html__( 'Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'WpX team', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
		    ]
		);
        $this->add_control(
            'title_tag2',
            [
                'label' => esc_html__('Title HTML Tag', 'wpx-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title2' => esc_html__('H1', 'wpx-elements'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title2' => esc_html__('H2', 'wpx-elements'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title2' => esc_html__('H3', 'wpx-elements'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title2' => esc_html__('H4', 'wpx-elements'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title2' => esc_html__('H5', 'wpx-elements'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title2' => esc_html__('H6', 'wpx-elements'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
               'default' => 'h2', 
                'toggle' => false,                 
            ]
        );    
        $this->add_control(
		    'sub_title2',
		    [
		        'label' => esc_html__( 'Sub Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Up to 50 users', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
		    ]
		);         
        $this->add_control(
		    'price2',
		    [
		        'label' => esc_html__( 'Price', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( '$25', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
		    ]
		); 
        $this->add_control(
            'button_show_hide2',
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
            'button_link_text2',
            [
                'label' => esc_html__('Default Button Text','wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Get Started',
                'title' => esc_html__('Enter button text','wpx-elements'),
                'condition' => array( 'button_show_hide2' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'button_link_type2',
            [
                'label' => esc_html__('Default Button Link Type','wpx-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => array( 'button_show_hide2' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'button_link2',
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
                    'button_link_type2' => '1',
                    'button_show_hide2' =>  'yes'
                ]
            ]
        );
        $this->add_control(
            'button_page_link2',
            [
                'label' => esc_html__('Select Link Page','wpx-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> wpx_get_all_pages(),
                'condition' => [
                    'button_link_type2' => '2',
                    'button_show_hide2' =>  'yes'
                ]
            ]
        ); 
        $repeater = new Repeater();
        $repeater->add_control(
            'info_title2',
            [
                'label' => esc_html__('Title', 'wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('No Cridit Card', 'wpx-elements'),
            ]
        );
        $repeater->add_control(
            'icon2',
            [
                'label' => esc_html__('Icons', 'wpx-elements'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-university',
                    'library' => 'fa-solid',
                ],
            ]
        );
      
        $this->add_control(
            'sc_option_list2',
            [
                'label' => esc_html__('List', 'wpx-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'info_title2' => esc_html__('Employee management', 'wpx-elements'),
                        'icon2' => [
                            'value' => 'fas fa-user-friends',
                        ],
                    ],
                    [
                        'info_title2' => esc_html__('Time & attendance', 'wpx-elements'),
                        'icon2' => [
                            'value' => 'far fa-clock',
                        ],
                    ],
                    [
                        'info_title2' => esc_html__('Leave management', 'wpx-elements'),
                        'icon2' => [
                            'value' => 'far fa-calendar-times',
                        ],
                    ],
                    [
                        'info_title2' => esc_html__('Engagement/Posting', 'wpx-elements'),
                        'icon2' => [
                            'value' => 'fas fa-grip-horizontal',
                        ],
                    ],
                    [
                        'info_title2' => esc_html__('Employee onboarding', 'wpx-elements'),
                        'icon2' => [
                            'value' => 'fas fa-rocket',
                        ],
                    ],
                    [
                        'info_title2' => esc_html__('Office calendar', 'wpx-elements'),
                        'icon2' => [
                            'value' => 'far fa-calendar-alt',
                        ],
                    ],
                    [
                        'info_title2' => esc_html__('Smart reporting', 'wpx-elements'),
                        'icon2' => [
                            'value' => 'fas fa-chart-bar',
                        ],
                    ],
                ],
                'title_field' => '{{{ info_title2 }}}',
            ]
        );
        $this->add_control(
            'animation_show_hide_2',
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
                'default' => 'fade',
                'condition' => array( 'animation_show_hide_2' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
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
                'default' => '500',
                'condition' => array( 'animation_show_hide_2' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
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
                'default' => '100',
                'condition' => array( 'animation_show_hide_2' => array( 'yes' ) ),
            ]
        );
        $this->end_controls_section(); 

        $this->start_controls_section(
            'section_title_content3',
            [
                'label' => esc_html__('Pricing Table 3', 'wpx-elements'),
            ]
        );
        $this->add_control(
		    'title3',
		    [
		        'label' => esc_html__( 'Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'WpX team', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
		    ]
		);
        $this->add_control(
            'title_tag3',
            [
                'label' => esc_html__('Title HTML Tag', 'wpx-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title3' => esc_html__('H1', 'wpx-elements'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title3' => esc_html__('H2', 'wpx-elements'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title3' => esc_html__('H3', 'wpx-elements'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title3' => esc_html__('H4', 'wpx-elements'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title3' => esc_html__('H5', 'wpx-elements'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title3' => esc_html__('H6', 'wpx-elements'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
               'default' => 'h2', 
                'toggle' => false,                 
            ]
        );    
        $this->add_control(
		    'sub_title3',
		    [
		        'label' => esc_html__( 'Sub Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Up to 50 users', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
		    ]
		);         
        $this->add_control(
		    'price3',
		    [
		        'label' => esc_html__( 'Price', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( '$35', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
		    ]
		); 
        $this->add_control(
            'button_show_hide3',
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
            'button_link_text3',
            [
                'label' => esc_html__('Default Button Text','wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Get Started',
                'title' => esc_html__('Enter button text','wpx-elements'),
                'condition' => array( 'button_show_hide3' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'button_link_type3',
            [
                'label' => esc_html__('Default Button Link Type','wpx-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => array( 'button_show_hide3' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'button_link3',
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
                    'button_link_type3' => '1',
                    'button_show_hide3' =>  'yes'
                ]
            ]
        );
        $this->add_control(
            'button_page_link3',
            [
                'label' => esc_html__('Select Link Page','wpx-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> wpx_get_all_pages(),
                'condition' => [
                    'button_link_type3' => '2',
                    'button_show_hide3' =>  'yes'
                ]
            ]
        ); 
        $repeater = new Repeater();
        $repeater->add_control(
            'info_title3',
            [
                'label' => esc_html__('Title', 'wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('No Cridit Card', 'wpx-elements'),
            ]
        );
        $repeater->add_control(
            'icon3',
            [
                'label' => esc_html__('Icons', 'wpx-elements'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-university',
                    'library' => 'fa-solid',
                ],
            ]
        );
      
        $this->add_control(
            'sc_option_list3',
            [
                'label' => esc_html__('List', 'wpx-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'info_title3' => esc_html__('Employee management', 'wpx-elements'),
                        'icon3' => [
                            'value' => 'fas fa-user-friends',
                        ],
                    ],
                    [
                        'info_title3' => esc_html__('Time & attendance', 'wpx-elements'),
                        'icon3' => [
                            'value' => 'far fa-clock',
                        ],
                    ],
                    [
                        'info_title3' => esc_html__('Leave management', 'wpx-elements'),
                        'icon3' => [
                            'value' => 'far fa-calendar-times',
                        ],
                    ],
                    [
                        'info_title3' => esc_html__('Engagement/Posting', 'wpx-elements'),
                        'icon3' => [
                            'value' => 'fas fa-grip-horizontal',
                        ],
                    ],
                    [
                        'info_title3' => esc_html__('Employee onboarding', 'wpx-elements'),
                        'icon3' => [
                            'value' => 'fas fa-rocket',
                        ],
                    ],
                    [
                        'info_title3' => esc_html__('Office calendar', 'wpx-elements'),
                        'icon3' => [
                            'value' => 'far fa-calendar-alt',
                        ],
                    ],
                    [
                        'info_title3' => esc_html__('Smart reporting', 'wpx-elements'),
                        'icon3' => [
                            'value' => 'fas fa-chart-bar',
                        ],
                    ],
                ],
                'title_field' => '{{{ info_title3 }}}',
            ]
        );
        $this->add_control(
            'animation_show_hide_3',
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
                'default' => 'fade',
                'condition' => array( 'animation_show_hide_3' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
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
                'default' => '500',
                'condition' => array( 'animation_show_hide_3' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
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
                'default' => '100',
                'condition' => array( 'animation_show_hide_3' => array( 'yes' ) ),
            ]
        );
        $this->end_controls_section(); 
    } 

    protected function render() {
        $settings = $this->get_settings();
        $allowed_tags = wp_kses_allowed_html( 'post' );
        $attr1 = '';    
        $attr2 = '';    
        $btn1 = '';
        $btn2 = '';
        if ('1' == $settings['button_link_type1']) {

            if ( !empty( $settings['button_link1']['url'] ) ) {
                $attr1  = 'href="' . $settings['button_link1']['url'] . '"';
                $attr1 .= !empty( $settings['button_link1']['is_external'] ) ? ' target="_blank"' : '';
                $attr1 .= !empty( $settings['button_link1']['nofollow'] ) ? ' rel="nofollow"' : '';

            }
            if ( !empty( $settings['button_link_text1'] ) ) {
                $btn1 = '<a class="axil-btn btn-ghost" ' . $attr1 . '>' . $settings['button_link_text1'] . '</a>';
            }

        } else {
            $attr1  = 'href="' . get_permalink($settings['button_page_link1']) . '"';
            $attr1 .= ' target="_self"';
            $attr1 .= ' rel="nofollow"';                        
            $btn1 = '<a class="axil-btn btn-ghost" ' . $attr1 . '>' . $settings['button_link_text1'] . '</a>';
        }         
        if ('1' == $settings['button_link_type2']) {

            if ( !empty( $settings['button_link2']['url'] ) ) {
                $attr2  = 'href="' . $settings['button_link2']['url'] . '"';
                $attr2 .= !empty( $settings['button_link2']['is_external'] ) ? ' target="_blank"' : '';
                $attr2 .= !empty( $settings['button_link2']['nofollow'] ) ? ' rel="nofollow"' : '';

            }
            if ( !empty( $settings['button_link_text2'] ) ) {
                $btn2 = '<a class="axil-btn btn-ghost" ' . $attr2 . '>' . $settings['button_link_text2'] . '</a>';
            }

        } else {
            $attr2  = 'href="' . get_permalink($settings['button_page_link2']) . '"';
            $attr2 .= ' target="_self"';
            $attr2 .= ' rel="nofollow"';                        
            $btn2 = '<a class="axil-btn btn-ghost" ' . $attr2 . '>' . $settings['button_link_text2'] . '</a>';
        } 
        if ('1' == $settings['button_link_type3']) {

            if ( !empty( $settings['button_link3']['url'] ) ) {
                $attr3  = 'href="' . $settings['button_link3']['url'] . '"';
                $attr3 .= !empty( $settings['button_link3']['is_external'] ) ? ' target="_blank"' : '';
                $attr3 .= !empty( $settings['button_link3']['nofollow'] ) ? ' rel="nofollow"' : '';

            }
            if ( !empty( $settings['button_link_text3'] ) ) {
                $btn3 = '<a class="axil-btn btn-ghost" ' . $attr3 . '>' . $settings['button_link_text3'] . '</a>';
            }

        } else {
            $attr3  = 'href="' . get_permalink($settings['button_page_link3']) . '"';
            $attr3 .= ' target="_self"';
            $attr3 .= ' rel="nofollow"';                        
            $btn3 = '<a class="axil-btn btn-ghost" ' . $attr3 . '>' . $settings['button_link_text3'] . '</a>';
        } 
        ?>
        <section class="pricing pricing-wrap">
            <div class="container">
                <div class="row g-4 justify-content-center">
                    <?php if ( $settings['animation_show_hide_1'] == 'yes') { ?>
                        <div class="col-12 col-md-6 col-lg-4" data-sal="<?php echo esc_html($settings['sal_animation_1']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_1']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_1']); ?>">
                    <?php } else { ?>
                        <div class="col-12 col-md-6 col-lg-4">
                    <?php } ?>
                        <div class="pricing-style-1">                            
                            <?php if ($settings['title_tag1']) : ?>
                                <?php  if($settings['title1']){ ?>
                                    <<?php echo esc_html( $settings['title_tag1'] );?> class="title">
                                        <?php echo wpx_kses_intermediate( $settings['title1'] );?>
                                    </<?php echo esc_html( $settings['title_tag1'] );?>> 
                                <?php  } ?>             
                            <?php endif; ?>
                            <div class="sub-title"><?php echo wpx_kses_intermediate( $settings['sub_title1'] );?></div>
                            <div class="price"><?php echo wpx_kses_intermediate( $settings['price1'] );?> <span>/mo</span></div>
                            <?php if ( $settings['button_show_hide1'] == 'yes') { ?>
                                <div class="pricing-btn">
                                    <?php echo wp_kses($btn1, $allowed_tags); ?>
                                </div>
                            <?php } ?> 
                            <?php foreach ($settings['sc_option_list1'] as $sc_option_list1): ?> 
                                <div class="pricing-list-box">
                                    <i class="<?php echo esc_attr($sc_option_list1['icon1']['value']); ?>"></i>
                                    <?php echo esc_html($sc_option_list1['info_title1']); ?>                      
                                </div>
                            <?php endforeach; ?> 
                        </div>
                    </div>
                    <?php if ( $settings['animation_show_hide_2'] == 'yes') { ?>
                        <div class="col-12 col-md-6 col-lg-4" data-sal="<?php echo esc_html($settings['sal_animation_2']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_2']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_2']); ?>">
                    <?php } else { ?>
                        <div class="col-12 col-md-6 col-lg-4">
                    <?php } ?>
                        <div class="pricing-style-1">
                            <span class="recommended">Chosen by 57% of businesses</span>
                            <?php if ($settings['title_tag2']) : ?>
                                <?php  if($settings['title2']){ ?>
                                    <<?php echo esc_html( $settings['title_tag2'] );?> class="title">
                                        <?php echo wpx_kses_intermediate( $settings['title2'] );?>
                                    </<?php echo esc_html( $settings['title_tag2'] );?>> 
                                <?php  } ?>             
                            <?php endif; ?>
                            <div class="sub-title"><?php echo wpx_kses_intermediate( $settings['sub_title2'] );?></div>
                            <div class="price"><?php echo wpx_kses_intermediate( $settings['price2'] );?> <span>/mo</span></div>
                            <?php if ( $settings['button_show_hide2'] == 'yes') { ?>
                                <div class="pricing-btn">
                                    <?php echo wp_kses($btn2, $allowed_tags); ?>
                                </div>
                            <?php } ?> 
                            <?php foreach ($settings['sc_option_list2'] as $sc_option_list2): ?> 
                                <div class="pricing-list-box">
                                    <i class="<?php echo esc_attr($sc_option_list2['icon2']['value']); ?>"></i>
                                    <?php echo esc_html($sc_option_list2['info_title2']); ?>                      
                                </div>
                            <?php endforeach; ?> 
                        </div>
                    </div>
                    <?php if ( $settings['animation_show_hide_3'] == 'yes') { ?>
                        <div class="col-12 col-md-6 col-lg-4" data-sal="<?php echo esc_html($settings['sal_animation_3']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_3']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_3']); ?>">
                    <?php } else { ?>
                        <div class="col-12 col-md-6 col-lg-4">
                    <?php } ?>
                        <div class="pricing-style-1">                            
                            <?php if ($settings['title_tag3']) : ?>
                                <?php  if($settings['title3']){ ?>
                                    <<?php echo esc_html( $settings['title_tag3'] );?> class="title">
                                        <?php echo wpx_kses_intermediate( $settings['title3'] );?>
                                    </<?php echo esc_html( $settings['title_tag3'] );?>> 
                                <?php  } ?>             
                            <?php endif; ?>
                            <div class="sub-title"><?php echo wpx_kses_intermediate( $settings['sub_title3'] );?></div>
                            <div class="price"><?php echo wpx_kses_intermediate( $settings['price3'] );?> <span>/mo</span></div>
                            <?php if ( $settings['button_show_hide3'] == 'yes') { ?>
                                <div class="pricing-btn">
                                    <?php echo wp_kses($btn3, $allowed_tags); ?>
                                </div>
                            <?php } ?> 
                            <?php foreach ($settings['sc_option_list3'] as $sc_option_list3): ?> 
                                <div class="pricing-list-box">
                                    <i class="<?php echo esc_attr($sc_option_list3['icon3']['value']); ?>"></i>
                                    <?php echo esc_html($sc_option_list3['info_title3']); ?>                      
                                </div>
                            <?php endforeach; ?> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    } 
} 
