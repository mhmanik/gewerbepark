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
class wpx_results_driven extends Widget_Base {  
 
    public function get_name() {
        return 'wpx-results-driven';
    }    
    public function get_title() {
        return esc_html__( 'Section: Results Driven', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-results-driven';
    }
    public function get_categories() {
        return [ WPX_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
    public function wpx_get_img( $img )
    {
        $img = WPX_ELEMENTS_BASE_URL . 'assets/media/' . $img;
        return $img;
    } 

    protected function register_controls() { 
    
        $this->start_controls_section(
            'section_heading_content',
            [
                'label' => esc_html__('Heading Content', 'wpx-elements'),
            ]
        );
        $this->add_control(
		    'heading_title',
		    [
		        'label' => esc_html__( 'Section Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'We’re a results driven team.', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Title is here', 'wpx-elements' ),
		    ]
		);
        $this->add_control(
            'heading_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'wpx-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'heading_title' => esc_html__('H1', 'wpx-elements'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'heading_title' => esc_html__('H2', 'wpx-elements'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'heading_title' => esc_html__('H3', 'wpx-elements'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'heading_title' => esc_html__('H4', 'wpx-elements'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'heading_title' => esc_html__('H5', 'wpx-elements'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'heading_title' => esc_html__('H6', 'wpx-elements'),
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
		    'heading_description',
		    [
		        'label' => esc_html__( 'Section Description', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'A successful business starts with a successful team and WpX helps you in the process. ', 'wpx-elements' ),
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
            'section_main_content',
	        [
                'label' => esc_html__('Main Content','wpx-elements'),	          
            ]
        );
        $this->add_control(
		    'title',
		    [
		        'label' => esc_html__( 'Section Title', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'It all started when we, as a small and mid-size enterprise (SME) company, faced a challenge.', 'wpx-elements' ),
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
            'animation_show_hide_title_1',
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
            'sal_animation_title_1',
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
                'condition' => array( 'animation_show_hide_title_1' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_title_1',
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
                'condition' => array( 'animation_show_hide_title_1' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_title_1',
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
                'condition' => array( 'animation_show_hide_title_1' => array( 'yes' ) ),
            ]
        ); 
        $this->add_control(
		    'description',
		    [
		        'label' => esc_html__( 'Section Description', 'wpx-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'We needed an HR software. It shouldn’t come with tons of functionalities, just a few that a small business requires. We found some solutions, but none were affordable. Every penny counts during the early stage; therefore, we couldn’t afford to spend hundreds of dollars every month. That’s how WpX was born.', 'wpx-elements' ),
		        'placeholder' => esc_html__( 'Description is here', 'wpx-elements' ),
                'separator' => 'before',
		    ]
		);  
        $this->add_control(
            'animation_show_hide_description_1',
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
            'sal_animation_description_1',
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
                'condition' => array( 'animation_show_hide_description_1' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_description_1',
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
                'condition' => array( 'animation_show_hide_description_1' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_description_1',
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
                'condition' => array( 'animation_show_hide_description_1' => array( 'yes' ) ),
            ]
        ); 
        $this->add_control(
            'image',
            [
                'label' => __('Image','wpx-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->wpx_get_img( 'banner/17.png' ),
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
    } 

    protected function render() {
        $settings = $this->get_settings();
        ?>
        <div class="results-driven results-driven-wrap-1">
            <div class="container">
                <div class="section-heading heading-center heading-dark">
                    <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                        <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                    <?php } ?>
                    <?php if ($settings['heading_title_tag']) : ?>
                        <?php  if($settings['heading_title']){ ?>
                            <<?php echo esc_html( $settings['heading_title_tag'] );?> class="title title-default">
                                <?php echo wpx_kses_intermediate( $settings['heading_title'] );?>
                            </<?php echo esc_html( $settings['heading_title_tag'] );?>> 
                        <?php  } ?>             
                    <?php endif; ?>
                    <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                        </div>
                    <?php } ?>
                    <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                        <div data-sal="<?php echo esc_html($settings['sal_animation_description']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_description']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_description']); ?>">
                    <?php } ?>
                    <p class="description"><?php echo wpx_kses_intermediate( $settings['heading_description'] );?></p>
                    <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                        </div>
                    <?php } ?>
                </div>                
                <div class="results-driven-style-1">
                    <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                        <div data-sal="<?php echo esc_html($settings['sal_animation_img']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_img']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_img']); ?>">
                    <?php } ?>
                    <div class="results-driven-thumbnail">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?>
                    </div>
                    <?php if ( $settings['animation_show_hide_img'] == 'yes') { ?>
                        </div>
                    <?php } ?> 
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="results-driven-content">
                                <?php if ( $settings['animation_show_hide_title_1'] == 'yes') { ?>
                                    <div data-sal="<?php echo esc_html($settings['sal_animation_title_1']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title_1']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title_1']); ?>">
                                <?php } ?>
                                <?php if ($settings['title_tag']) : ?>
                                    <?php  if($settings['title']){ ?>
                                        <<?php echo esc_html( $settings['title_tag'] );?> class="title">
                                            <?php echo wpx_kses_intermediate( $settings['title'] );?>
                                        </<?php echo esc_html( $settings['title_tag'] );?>> 
                                    <?php  } ?>             
                                <?php endif; ?>
                                <?php if ( $settings['animation_show_hide_title_1'] == 'yes') { ?>
                                    </div>
                                <?php } ?>
                                <?php if ( $settings['animation_show_hide_description_1'] == 'yes') { ?>
                                    <div data-sal="<?php echo esc_html($settings['sal_animation_description_1']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_description_1']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_description_1']); ?>">
                                <?php } ?>
                                <p class="description"><?php echo wpx_kses_intermediate( $settings['description'] );?></p>
                                <?php if ( $settings['animation_show_hide_description_1'] == 'yes') { ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } 
} 
