<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */

namespace wpx\wpx_elements;

use Elementor\Widget_Base;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
 


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class wpx_features_box_repeater extends Widget_Base {

 public function get_name() {
        return 'wpx-features-repeater';
    }    
    public function get_title() {
        return __( 'Section: Features Boxs 2', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-posts-grid';
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
            'wpx_content',
            [
                'label' => esc_html__( 'Features List', 'wpx-elements' ),
                  
            ]
        );

        $repeater = new Repeater(); 

        $repeater->add_control(
            'box_image',
            [
                'label' => esc_html__( 'Features Image', 'wpx-elements' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                   'url' => $this->wpx_get_img( 'icon/action.svg' ),
                ],
            ]
        );
        
        $repeater->add_control(
            'box_title',
            [
                'label'   => esc_html__('Title', 'wpx-elements' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Lorem Ipsum',
            ]
        );
     
        $repeater->add_control(
          'box_url',
              [
                  'label' => esc_html__('Box link','wpx-elements'),
                  'type' => Controls_Manager::URL,
                  'dynamic' => [
                      'active' => true,
                  ], 
                  'placeholder' => esc_html__('https://your-link.com','wpx-elements'),
                  'show_external' => true,
                  'default' => [
                      'url' => '',
                      'is_external' => true,
                      'nofollow' => true,
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
            'list_features',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                 'default' => [
                [       'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'box_title' => esc_html__( 'Employee onboarding', 'wpx-elements' ),  
                        'box_image' => [
                             'url' => $this->wpx_get_img( 'icon/action.svg' ),
                        ],
                ], 
                [       'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'box_title' => esc_html__( 'Time & attendance', 'wpx-elements' ),  
                        'box_image' => [
                             'url' => $this->wpx_get_img( 'icon/dashboard.svg' ),
                        ],
                    ], 
                [       'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'box_title' => esc_html__( 'Company newsfeed', 'wpx-elements' ),  
                        'box_image' => [
                             'url' => $this->wpx_get_img( 'icon/action.svg' ),
                        ],
                    ], 
                [       'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'box_title' => esc_html__( 'Leave management', 'wpx-elements' ),  
                        'box_image' => [
                             'url' => $this->wpx_get_img( 'icon/action.svg' ),
                        ],
                    ], 
                [       'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'box_title' => esc_html__( 'Office calendar', 'wpx-elements' ),  
                        'box_image' => [
                             'url' => $this->wpx_get_img( 'icon/action.svg' ),
                        ],
                    ], 
                [       'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'box_title' => esc_html__( 'Smart reporting', 'wpx-elements' ),  
                        'box_image' => [
                             'url' => $this->wpx_get_img( 'icon/action.svg' ),
                        ],
                    ], 
                [       'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'box_title' => esc_html__( 'More on the way...', 'wpx-elements' ),  
                        'box_image' => [
                             'url' => $this->wpx_get_img( 'icon/action.svg' ),
                        ],
                    ], 
                [       'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'box_title' => esc_html__( 'Employee onboarding', 'wpx-elements' ),  
                        'box_image' => [
                             'url' => $this->wpx_get_img( 'icon/action.svg' ),
                        ],
                    ],   

                ],
                'title_field' => '{{{ box_title }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'wpx_link_content',
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
                'label' => esc_html__('Default Button Text','wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Become a remote work guru',
                'title' => esc_html__('Enter button text','wpx-elements'),
                'condition' => array( 'button_show_hide' => array( 'yes' ) ),
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
                'condition' => array( 'button_show_hide' => array( 'yes' ) ),
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
                'condition' => array( 'button_show_hide' => array( 'yes' ) ),
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
                'condition' => array( 'button_show_hide' => array( 'yes' ), 'animation_show_hide_btn' => array( 'yes' ) ),
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
                'condition' => array( 'button_show_hide' => array( 'yes' ), 'animation_show_hide_btn' => array( 'yes' ) ),
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
                'condition' => array( 'button_show_hide' => array( 'yes' ), 'animation_show_hide_btn' => array( 'yes' ) ),
            ]
        ); 
 
    $this->end_controls_section();


  }
	protected function render() {
	   $settings = $this->get_settings();
       $allowed_tags = wp_kses_allowed_html( 'post' );
       $attr = '';
       $btn = '';
       if ('1' == $settings['btn_link_type']) {

            if ( !empty( $settings['btn_link']['url'] ) ) {
                $attr  = 'href="' . $settings['btn_link']['url'] . '"';
                $attr .= !empty( $settings['btn_link']['is_external'] ) ? ' target="_blank"' : '';
                $attr .= !empty( $settings['btn_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                
            }
            if ( !empty( $settings['btn_link_text'] ) ) {
                $btn = '<a class="axil-btn btn-fill" ' . $attr . '>' . $settings['btn_link_text'] . '</a>';
            }

        } else {
            $attr  = 'href="' . get_permalink($settings['btn_page_link']) . '"';
            $attr .= ' target="_blank"';
            $attr .= ' rel="nofollow"';                        
            $btn = '<a class="axil-btn btn-fill" ' . $attr . '>' . $settings['btn_link_text'] . '</a>';
        } 
        ?> 
        <div class="container">   
            <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-lg-3">
                <?php foreach ($settings['list_features'] as $option_list) {   
                    $wrapper_start = '<span class="box-link-item d-block">';
                    $wrapper_end   = '</span>';

                    if ( !empty( $option_list['box_url']['url'] ) ) {
                        $attr  = 'href="' . $option_list['box_url']['url'] . '"';
                        $attr .= !empty( $option_list['box_url']['is_external'] ) ? ' target="_blank"' : '';
                        $attr .= !empty( $option_list['box_url']['nofollow'] ) ? ' rel="nofollow"' : '';
                        
                        $wrapper_start = '<a class="box-link-item d-block" ' . $attr . '>';
                        $wrapper_end   = '</a>';
                    } 
                    ?> 
                <div class="col">
                    <?php if ( $option_list['animation_show_hide'] == 'yes') { ?>
                        <div data-sal="<?php echo esc_html($option_list['sal_animation']); ?>" data-sal-duration="<?php echo esc_html($option_list['sal_duration']); ?>" data-sal-delay="<?php echo esc_html($option_list['sal_delay']); ?>">
                    <?php } ?>
                        <?php echo $wrapper_start;?> 
                        <div class="feature-style-4">
                            <div class="feature-icon">
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $option_list, 'full', 'box_image' );?> 
                            </div>
                            <div class="feature-content">
                                <h3 class="title"><?php echo wpx_kses_intermediate( $option_list['box_title'] );?></h3>
                            </div>
                        </div>
                        <?php echo $wrapper_end;?>
                    <?php if ( $option_list['animation_show_hide'] == 'yes') { ?>
                        </div>
                    <?php } ?> 
                </div>
                <?php } ?>        
            </div>
            <?php if ( $settings['button_show_hide'] == 'yes') { ?>
                <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                    <div data-sal="<?php echo esc_html($settings['sal_animation_btn']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration_btn']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay_btn']); ?>">
                <?php } ?> 
                    <div class="text-center mt-5">
                        <?php echo wp_kses( $btn, $allowed_tags ); ?>
                    </div> 
                <?php if ( $settings['animation_show_hide_btn'] == 'yes') { ?>
                    </div>
                <?php } ?>     
            <?php } ?> 
        </div>
    <?php
  
	}
}