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
class wpx_faq extends Widget_Base {  
 
    public function get_name() {
        return 'wpx-faq';
    }    
    public function get_title() {
        return esc_html__( 'Section: FAQ', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-faq';
    }
    public function get_categories() {
        return [ WPX_ELEMENTS_THEME_PREFIX . '-widgets' ];
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
		        'default' => esc_html__( 'We figured you’d ask', 'wpx-elements' ),
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
        $this->end_controls_section();   

        $this->start_controls_section(
            'section_process_list',
	        [
                'label' => esc_html__('Faq List','wpx-elements'),            
            ]
        );
            $repeater = new Repeater();         
            $repeater->add_control(
                'list_title',
                [
                    'label'   => esc_html__('Title', 'wpx-elements' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => 'How ASU powers the modern learning experience with WpX',
                ]
            );         
            $repeater->add_control(
                'list_description',
                [
                    'label'   => esc_html__('Description', 'wpx-elements' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => 'Tips & Tricks',
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
                            'list_title' => esc_html__('Do you charge extra for more people?', 'wpx-elements'),
                            'list_description' => esc_html__('Nope. You’ll be charged according to the plan you’re buying. Unlike other major HR software providers, we don’t put a cap per user. Therefore, your bill will not increase exponentially as you add more users.', 'wpx-elements'),
                        ],
                        [
                            'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                            'sal_duration' => esc_html__('500', 'wpx-elements'),
                            'sal_delay' => esc_html__('100', 'wpx-elements'),
                            'list_title' => esc_html__('Can we cancel at any time?', 'wpx-elements'),
                            'list_description' => esc_html__('Absolutely. Feel no pressure. You can cancel anytime you want. Even if you’ve paid in advance, feel free to reach out to us. We can adjust the invoice.', 'wpx-elements'),
                        ],
                        [
                            'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                            'sal_duration' => esc_html__('500', 'wpx-elements'),
                            'sal_delay' => esc_html__('100', 'wpx-elements'),
                            'list_title' => esc_html__('What payment options do you accept?', 'wpx-elements'),
                            'list_description' => esc_html__('We’ll try to provide support for whatever is easier for you. You can use your credit card, PayPal, or any other means. Just drop us a line, we’ll contact you as soon as possible.', 'wpx-elements'),
                        ],
                        [
                            'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                            'sal_duration' => esc_html__('500', 'wpx-elements'),
                            'sal_delay' => esc_html__('100', 'wpx-elements'),
                            'list_title' => esc_html__('Is there any option for a free trial?', 'wpx-elements'),
                            'list_description' => esc_html__('Yes, there is. As you can see with our Startup Plan, you can have 10 users and use it as long as you want for FREE. However, in case you need to try with more users, you can opt for the Team Plan, which by default, comes with a 14-days FREE trial period.', 'wpx-elements'),
                        ],
                        [
                            'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                            'sal_duration' => esc_html__('500', 'wpx-elements'),
                            'sal_delay' => esc_html__('100', 'wpx-elements'),
                            'list_title' => esc_html__('Can I extend my trial period?', 'wpx-elements'),
                            'list_description' => esc_html__('Of course, you can. We’d be happy to allow you some extra time. Just send us an email, and we’ll extend your trial.', 'wpx-elements'),
                        ],
                        [
                            'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                            'sal_duration' => esc_html__('500', 'wpx-elements'),
                            'sal_delay' => esc_html__('100', 'wpx-elements'),
                            'list_title' => esc_html__('Will I be charged after the trial is over?', 'wpx-elements'),
                            'list_description' => esc_html__('No, you don’t. Since we didn’t ask for credit card info upfront, you won’t be charged until you’re ready. When the trial is over, you’ll no longer be able to access your WpX workspace. We’ll only proceed if you’re ready; otherwise, cancel with just a click.', 'wpx-elements'),
                        ],
                        [
                            'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                            'sal_duration' => esc_html__('500', 'wpx-elements'),
                            'sal_delay' => esc_html__('100', 'wpx-elements'),
                            'list_title' => esc_html__('Can I cancel at any time? What about the refund?', 'wpx-elements'),
                            'list_description' => esc_html__('You have the absolute freedom to end your subscription at any given time. There’s no minimum contract period for WpX. You can cancel any time without penalty. Even if you’ve prepaid for a year, we’ll refund you the unused months.', 'wpx-elements'),
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
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="faq-style">
                        <?php foreach ($settings['sc_option_list'] as $sc_option_list): ?>
                            <?php if ( $sc_option_list['animation_show_hide'] == 'yes') { ?>
                                <div data-sal="<?php echo esc_html($sc_option_list['sal_animation']); ?>" data-sal-duration="<?php echo esc_html($sc_option_list['sal_duration']); ?>" data-sal-delay="<?php echo esc_html($sc_option_list['sal_delay']); ?>">
                            <?php } ?>
                            <div class="faq-single-item">
                                <h3 class="title"><?php echo esc_html($sc_option_list['list_title']); ?></h3>
                                <p class="description"><?php echo esc_html($sc_option_list['list_description']); ?></p>
                            </div>
                            <?php if ( $sc_option_list['animation_show_hide'] == 'yes') { ?>
                                </div>
                            <?php } ?> 
                        <?php endforeach; ?>                            
                    </div>
                </div>
            </div>
        </div>
        <?php
    } 
} 

