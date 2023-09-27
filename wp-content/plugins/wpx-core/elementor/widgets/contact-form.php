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
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class wpx_contact_form extends Widget_Base {  
 
    public function get_name() {
        return 'wpx-contact-form';
    }    
    public function get_title() {
        return esc_html__( 'Section: Contact Form', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-contact-form';
    }
    public function get_categories() {
        return [ WPX_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
    public function wpx_get_img( $img )
    {
        $img = WPX_ELEMENTS_BASE_URL . 'assets/media/' . $img;
        return $img;
    } 
    public function get_wpx_contact_form(){
        if ( ! class_exists( 'WPCF7' ) ) {
            return;
        }
        $wpx_cfa         = array();
        $wpx_cf_args     = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $wpx_forms       = get_posts( $wpx_cf_args );
        $wpx_cfa         = ['0' => esc_html__( 'Select Form', 'wpx-elements' ) ];
        if( $wpx_forms ){
            foreach ( $wpx_forms as $wpx_form ){
                $wpx_cfa[$wpx_form->ID] = $wpx_form->post_title;
            }
        }else{
            $wpx_cfa[ esc_html__( 'No contact form found', 'wpx-elements' ) ] = 0;
        }
        return $wpx_cfa;
    }

    protected function register_controls() { 
    
        $this->start_controls_section(
            'wpx_content_shortcode',
            [
                'label' => esc_html__( 'Contact Form', 'wpx-elements' ),
            ]
        );

        $this->add_control(
            'wpx_content_form_title',
            [
                'label' => esc_html__('Form Title', 'wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Anything else on your mind?',
                'placeholder' => esc_html__('Type Heading Text', 'wpx-elements'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'wpx_contact_form_tag',
            [
                'label' => esc_html__('Form Title HTML Tag', 'wpx-elements'),
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
            'wpx_content_form_description',
            [
                'label' => esc_html__('Form Description', 'wpx-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Providing a smooth experience to you is all we care about.',
                'placeholder' => esc_html__('Type Description Text', 'wpx-elements'),
                'label_block' => true,
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
        $this->add_control(
            'select_contact_form',
            [
                'label'   => esc_html__( 'Select Form', 'wpx-elements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '0',
                'options' => $this->get_wpx_contact_form(),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'animation_show_hide_form',
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
            'sal_animation_form',
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
                'condition' => array( 'animation_show_hide_form' => array( 'yes' ) ),
            ]
        );     
        $this->add_control(
            'sal_duration_form',
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
                'condition' => array( 'animation_show_hide_form' => array( 'yes' ) ),
            ]
        );         
        $this->add_control(
            'sal_delay_form',
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
                'condition' => array( 'animation_show_hide_form' => array( 'yes' ) ),
            ]
        ); 
     $this->end_controls_section(); 
     
    } 

    protected function render() {
        $settings = $this->get_settings();
        ?>
        <div class="contact-form-wrap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-10 col-md-9">
                        <div class="contact-form-box">
                            <div class="contact-form-heading">
                                <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                                    <div data-sal="<?php echo esc_html($settings['sal_animation_title']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_title']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_title']); ?>">
                                <?php } ?>
                                <?php if ($settings['wpx_contact_form_tag']) : ?>
                                <<?php echo tag_escape( $settings['wpx_contact_form_tag'] ); ?> 
                                class="title">
                                <?php echo wp_kses_post( $settings['wpx_content_form_title']); ?>
                                </<?php echo tag_escape( $settings['wpx_contact_form_tag'] ) ?>>
                                <?php endif; ?>
                                <?php if ( $settings['animation_show_hide_title'] == 'yes') { ?>
                                    </div>
                                <?php } ?>
                                <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                                    <div data-sal="<?php echo esc_html($settings['sal_animation_description']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_description']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_description']); ?>">
                                <?php } ?>
                                <p class="description"><?php echo wp_kses_post( $settings['wpx_content_form_description']); ?></p>
                                <?php if ( $settings['animation_show_hide_description'] == 'yes') { ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php if ( $settings['animation_show_hide_form'] == 'yes') { ?>
                                <div data-sal="<?php echo esc_html($settings['sal_animation_form']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_form']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_form']); ?>">
                            <?php } ?>
                            <?php if( !empty($settings['select_contact_form']) ){ 
                                echo do_shortcode( '[contact-form-7  id="'.$settings['select_contact_form'].'"]' );                               
                            } else {
                                echo '<div class="alert alert-info"><p>' . __('Please Select contact form.', 'wpx-elements' ). '</p></div>';
                            }
                            ?> 
                            <?php if ( $settings['animation_show_hide_form'] == 'yes') { ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } 
} 


