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
class wpx_work_resource extends Widget_Base {  
 
    public function get_name() {
        return 'wpx-work-resource';
    }    
    public function get_title() {
        return esc_html__( 'Section: Work Resource', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-work-resource';
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
		        'default' => esc_html__( 'Remote work resources', 'wpx-elements' ),
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
		        'default' => esc_html__( 'We have curated a handful of remote work guides from industry experts to improve your work-life balance. Stay connected for more productivity hacks.', 'wpx-elements' ),
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
            'section_process_list',
	        [
                'label' => esc_html__('Process List','wpx-elements'),            
            ]
        );
            $repeater = new Repeater();         
            $repeater->add_control(
                'list_title',
                [
                    'label'   => esc_html__('Title', 'wpx-elements' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'How ASU powers the modern learning experience with WpX',
                ]
            );         
            $repeater->add_control(
                'list_sub_title',
                [
                    'label'   => esc_html__('Sub Title', 'wpx-elements' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'Tips & Tricks',
                ]
            );         
            $repeater->add_control(
                'box_image',
                [
                    'label' => esc_html__( 'Image', 'wpx-elements' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => $this->wpx_get_img( 'work-resources/1.jpg' ),
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
                    'default' => 'yes',
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
                    'label' => esc_html__('List', 'wpx-elements'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [

                        [
                            'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                            'sal_duration' => esc_html__('500', 'wpx-elements'),
                            'sal_delay' => esc_html__('100', 'wpx-elements'),
                            'list_title' => esc_html__('How ASU powers the modern learning experience with WpX', 'wpx-elements'),
                            'list_sub_title' => esc_html__('Tips & Tricks', 'wpx-elements'),
                            'box_image' => [
                                'url' => $this->wpx_get_img( 'work-resources/1.jpg' ),
                            ],
                        ],
                        [
                            'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                            'sal_duration' => esc_html__('500', 'wpx-elements'),
                            'sal_delay' => esc_html__('100', 'wpx-elements'),
                            'list_title' => esc_html__('Why a design system is the key to scaling accessibility', 'wpx-elements'),
                            'list_sub_title' => esc_html__('Updates', 'wpx-elements'),
                            'box_image' => [
                                'url' => $this->wpx_get_img( 'work-resources/2.jpg' ),
                            ],
                        ],
                        [
                            'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                            'sal_duration' => esc_html__('500', 'wpx-elements'),
                            'sal_delay' => esc_html__('100', 'wpx-elements'),
                            'list_title' => esc_html__('Remote work diary: Spanish startup Jeff adopts remote work for good', 'wpx-elements'),
                            'list_sub_title' => esc_html__('Guide', 'wpx-elements'),
                            'box_image' => [
                                'url' => $this->wpx_get_img( 'work-resources/3.jpg' ),
                            ],
                        ],

                    ],
                    'title_field' => '{{{ list_title }}}',             
                ]
            ); 
        $this->end_controls_section(); 
    } 

    protected function render() {
        $settings = $this->get_settings();
        ?>
         <div class="work-resource work-resource-wrap-1">
            <div class="container">
                <div class="section-heading heading-center heading-dark">
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
                </div>
                <div class="row g-4 row-cols-1 row-cols-md-3">
                    <?php foreach ($settings['sc_option_list'] as $sc_option_list): ?>
                        <div class="col">
                            <?php if ( $sc_option_list['animation_show_hide'] == 'yes') { ?>
                                <div data-sal="<?php echo esc_html($sc_option_list['sal_animation']); ?>" data-sal-duration="<?php echo esc_html($sc_option_list['sal_duration']); ?>" data-sal-delay="<?php echo esc_html($sc_option_list['sal_delay']); ?>">
                            <?php } ?>
                            <div class="work-resource-style-1">
                                <div class="work-resource-thumbnail">
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $sc_option_list, 'full', 'box_image' );?>
                                </div>
                                <div class="work-resource-content">
                                    <div class="meta-tag"><?php echo esc_html($sc_option_list['list_sub_title']); ?></div>
                                    <h3 class="title"><?php echo esc_html($sc_option_list['list_title']); ?></h3> 
                                </div>
                            </div>
                            <?php if ( $sc_option_list['animation_show_hide'] == 'yes') { ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endforeach; ?>                      
                </div>
            </div>
        </div>
        <?php
    } 
} 
