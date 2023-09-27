<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */

namespace wpx\wpx_elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class wpx_contact extends Widget_Base {  
 
    public function get_name() {
        return 'wpx-contact';
    }    
    public function get_title() {
        return esc_html__( 'Section: Contact', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-contact';
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
            'section_title_1',
            [
                'label' => esc_html__('Contact Box 1', 'wpx-elements'),
            ]
        );
        $this->add_control(
		    'title_1',
		    [
		        'label' => esc_html__( 'Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXT,
		        'default' => esc_html__( 'California', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
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
                 
            ]
        );
        $this->add_control(
		    'address_1',
		    [
		        'label' => esc_html__( 'Address', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( '3891 Ranchview Dr. Richardson street, California 62639', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Address is here', 'wpx-elements' ),
                'separator' => 'before',
		    ]
		);
        $this->add_control(
		    'email_1',
		    [
		        'label' => esc_html__( 'Email', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXT,
		        'default' => esc_html__( 'contact_us@WpX.com', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Email is here', 'wpx-elements' ),
                'separator' => 'before',
		    ]
		);
        $this->add_control(
		    'phone_number_1',
		    [
		        'label' => esc_html__( 'Phone Number', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXT,
		        'default' => esc_html__( '+880 1730577220', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Phone Number is here', 'wpx-elements' ),
                'separator' => 'before',
		    ]
		);
        $this->add_control(
            'button_show_hide_1',
            [
                'label' => esc_html__('Default Button Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_link_text_1',
            [
                'label' => esc_html__('Default Button Text','wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Sign Up Today',
                'title' => esc_html__('Enter button text','wpx-elements'),
                'condition' => array( 'button_show_hide_1' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'btn_link_type_1',
            [
                'label' => esc_html__('Default Button Link Type','wpx-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => array( 'button_show_hide_1' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'btn_link_1',
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
                    'btn_link_type_1' => '1',
                    'button_show_hide_1' =>  'yes'
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
                    'button_show_hide_1' =>  'yes'
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
                'separator' => 'before',
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
                'condition' => array( 'animation_show_hide_box_1' => array( 'yes' ) ),
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
                'condition' => array( 'animation_show_hide_box_1' => array( 'yes' ) ),
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
                'condition' => array( 'animation_show_hide_box_1' => array( 'yes' ) ),
            ]
        );                    
        $this->end_controls_section();  

        $this->start_controls_section(
            'section_title_2',
            [
                'label' => esc_html__('Contact Box 2', 'wpx-elements'),
            ]
        );
        $this->add_control(
		    'title_2',
		    [
		        'label' => esc_html__( 'Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXT,
		        'default' => esc_html__( 'Dhaka', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
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
                 
            ]
        );
        $this->add_control(
		    'address_2',
		    [
		        'label' => esc_html__( 'Address', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( '3891 Ranchview Dr. Richardson street, California 62639', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Address is here', 'wpx-elements' ),
                'separator' => 'before',
		    ]
		);
        $this->add_control(
		    'email_2',
		    [
		        'label' => esc_html__( 'Email', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXT,
		        'default' => esc_html__( 'contact_us@WpX.com', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Email is here', 'wpx-elements' ),
                'separator' => 'before',
		    ]
		);
        $this->add_control(
		    'phone_number_2',
		    [
		        'label' => esc_html__( 'Phone Number', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXT,
		        'default' => esc_html__( '+880 1730577220', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Phone Number is here', 'wpx-elements' ),
                'separator' => 'before',
		    ]
		);
        $this->add_control(
            'button_show_hide_2',
            [
                'label' => esc_html__('Default Button Show Hide', 'wpx-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'wpx-elements'),
                'label_off' => esc_html__('Hide', 'wpx-elements'),
                'return_value' => 'yes',
                'default' => 'no',
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_link_text_2',
            [
                'label' => esc_html__('Default Button Text','wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Sign Up Today',
                'title' => esc_html__('Enter button text','wpx-elements'),
                'condition' => array( 'button_show_hide_2' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'btn_link_type_2',
            [
                'label' => esc_html__('Default Button Link Type','wpx-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => array( 'button_show_hide_2' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'btn_link_2',
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
                    'btn_link_type_2' => '1',
                    'button_show_hide_2' =>  'yes'
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
                    'button_show_hide_2' =>  'yes'
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
                'separator' => 'before',
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
                'condition' => array( 'animation_show_hide_box_2' => array( 'yes' ) ),
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
                'condition' => array( 'animation_show_hide_box_2' => array( 'yes' ) ),
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
                'condition' => array( 'animation_show_hide_box_2' => array( 'yes' ) ),
            ]
        );                   
        $this->end_controls_section();  
        
    } 


    protected function render() {
        $settings = $this->get_settings();
        $attr1 = '';
        $btn1 = '';
        $attr2 = '';
        $btn2 = '';
        $allowed_tags = wp_kses_allowed_html( 'post' );  
        $icon = '<div class="icon-holder"><svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.980469 6.66016V5.83984C0.980469 5.72266 1.01953 5.625 1.09766 5.54688C1.1888 5.45573 1.29297 5.41016 1.41016 5.41016H14.8867L11.1758 1.71875C11.1367 1.67969 11.1042 1.63411 11.0781 1.58203C11.0521 1.52995 11.0391 1.47786 11.0391 1.42578C11.0391 1.36068 11.0521 1.30208 11.0781 1.25C11.1042 1.19792 11.1367 1.15885 11.1758 1.13281L11.7617 0.546875C11.8008 0.507812 11.8464 0.47526 11.8984 0.449219C11.9505 0.423177 12.0026 0.410156 12.0547 0.410156C12.1198 0.410156 12.1719 0.423177 12.2109 0.449219C12.263 0.47526 12.3086 0.507812 12.3477 0.546875L17.4648 5.64453C17.5299 5.70964 17.5755 5.78125 17.6016 5.85938C17.6406 5.92448 17.6602 6.0026 17.6602 6.09375V6.40625C17.6602 6.4974 17.6406 6.58203 17.6016 6.66016C17.5755 6.72526 17.5299 6.79036 17.4648 6.85547L12.3477 11.9531C12.3086 11.9922 12.263 12.0247 12.2109 12.0508C12.1719 12.0768 12.1198 12.0898 12.0547 12.0898C12.0026 12.0898 11.9505 12.0768 11.8984 12.0508C11.8464 12.0247 11.8008 11.9922 11.7617 11.9531L11.1758 11.3672C11.1367 11.3281 11.1042 11.2826 11.0781 11.2305C11.0521 11.1784 11.0391 11.1263 11.0391 11.0742C11.0391 11.0221 11.0521 10.9701 11.0781 10.918C11.1042 10.8659 11.1367 10.8203 11.1758 10.7812L14.8867 7.08984H1.41016C1.29297 7.08984 1.1888 7.05078 1.09766 6.97266C1.01953 6.88151 0.980469 6.77734 0.980469 6.66016Z" fill="#FF7F5C"/></svg></div>';        
              

        if ('1' == $settings['btn_link_type_1']) {

            if ( !empty( $settings['btn_link_1']['url'] ) ) {
                $attr1  = 'href="' . $settings['btn_link_1']['url'] . '"';
                $attr1 .= !empty( $settings['btn_link_1']['is_external'] ) ? ' target="_blank"' : '';
                $attr1 .= !empty( $settings['btn_link_1']['nofollow'] ) ? ' rel="nofollow"' : '';
                
            }
            if ( !empty( $settings['btn_link_text_1'] ) ) {
                $btn1 = '<a class="map-btn" ' . $attr1 . '>' . $settings['btn_link_text_1'] .  $icon . '</a>';
            }

        } else {
            $attr1  = 'href="' . get_permalink($settings['btn_page_link_1']) . '"';
            $attr1 .= ' target="_blank"';
            $attr1 .= ' rel="nofollow"';                        
            $btn1 = '<a class="map-btn" ' . $attr1 . '>' . $settings['btn_link_text_1'] .  $icon . '</a>';
        }
        if ('1' == $settings['btn_link_type_2']) {

            if ( !empty( $settings['btn_link_2']['url'] ) ) {
                $attr2  = 'href="' . $settings['btn_link_2']['url'] . '"';
                $attr2 .= !empty( $settings['btn_link_2']['is_external'] ) ? ' target="_blank"' : '';
                $attr2 .= !empty( $settings['btn_link_2']['nofollow'] ) ? ' rel="nofollow"' : '';
                
            }
            if ( !empty( $settings['btn_link_text_2'] ) ) {
                $btn2 = '<a class="map-btn" ' . $attr2 . '>' . $settings['btn_link_text_2'] .  $icon . '</a>';
            }

        } else {
            $attr2  = 'href="' . get_permalink($settings['btn_page_link_2']) . '"';
            $attr2 .= ' target="_blank"';
            $attr2 .= ' rel="nofollow"';                        
            $btn2 = '<a class="map-btn" ' . $attr2 . '>' . $settings['btn_link_text_2'] .  $icon . '</a>';
        }
        ?> 
            <div class="contact contact-wrap-1">
                <div class="container-fluid">              
                    <div class="row g-4 justify-content-center">
                        <?php if ( $settings['animation_show_hide_box_1'] == 'yes') { ?>
                            <div class="col-lg-5" data-sal="<?php echo esc_html($settings['sal_animation_box_1']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_box_1']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_box_1']); ?>">
                        <?php } else { ?>
                            <div class="col-lg-5">
                        <?php } ?>
                            <div class="contact-style-1">
                                <?php if ($settings['title_tag_1']) : ?>
                                    <?php  if($settings['title_1']){ ?>
                                        <<?php echo esc_html( $settings['title_tag_1'] );?> class="title">
                                            <?php echo wpx_kses_intermediate( $settings['title_1'] );?>
                                        </<?php echo esc_html( $settings['title_tag_1'] );?>> 
                                    <?php  } ?>             
                                <?php endif; ?> 
                                <address class="contact-address"><?php echo wpx_kses_intermediate( $settings['address_1'] );?></address> 
                                <a class="contact-email" href="mailto:<?php echo wpx_kses_intermediate( $settings['email_1'] );?>"><?php echo wpx_kses_intermediate( $settings['email_1'] );?></a>  
                                <span class="contact-phone"><?php echo wpx_kses_intermediate( $settings['phone_number_1'] );?></span>                    
                                <?php if ( $settings['button_show_hide_1'] == 'yes') { ?>
                                    <?php echo $btn1; ?>       
                                <?php } ?>  
                            </div>
                        </div>
                        <?php if ( $settings['animation_show_hide_box_2'] == 'yes') { ?>
                            <div class="col-lg-5" data-sal="<?php echo esc_html($settings['sal_animation_box_2']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_box_2']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_box_2']); ?>">
                        <?php } else { ?>
                            <div class="col-lg-5">
                        <?php } ?>
                            <div class="contact-style-1">
                                <?php if ($settings['title_tag_2']) : ?>
                                    <?php  if($settings['title_2']){ ?>
                                        <<?php echo esc_html( $settings['title_tag_2'] );?> class="title">
                                            <?php echo wpx_kses_intermediate( $settings['title_2'] );?>
                                        </<?php echo esc_html( $settings['title_tag_2'] );?>> 
                                    <?php  } ?>             
                                <?php endif; ?> 
                                <address class="contact-address"><?php echo wpx_kses_intermediate( $settings['address_2'] );?></address> 
                                <a class="contact-email" href="mailto:<?php echo wpx_kses_intermediate( $settings['email_2'] );?>"><?php echo wpx_kses_intermediate( $settings['email_2'] );?></a>  
                                <span class="contact-phone"><?php echo wpx_kses_intermediate( $settings['phone_number_2'] );?></span>                    
                                <?php if ( $settings['button_show_hide_2'] == 'yes') { ?>
                                    <?php echo $btn2; ?>      
                                <?php } ?> 
                            </div>
                        </div>
                    </div>    
                </div>       
            </div> 
        <?php  
    } 
} 
