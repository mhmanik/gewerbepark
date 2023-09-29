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
        return __( 'Section: Features Boxs', 'wpx-elements' );
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
            'box_content',
            [
                'label' => esc_html__( 'Content', 'wpx-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( '3891 Ranchview Dr. Richardson street, California 62639', 'wpx-elements' ),
                'placeholder' => esc_html__( 'Address is here', 'wpx-elements' ),
                'separator' => 'before',
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
            
           $this->add_control(
            'list_features',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                 'default' => [
                    [       
                        
                        'box_title' => esc_html__( 'Mini-Box', 'wpx-elements' ),  
                        'box_content' => esc_html__('Sicher und preiswert kleine Dinge lagern.', 'wpx-elements'),
                        
                    ],   
                    [       
                        
                        'box_title' => esc_html__( 'Gitterbox', 'wpx-elements' ),  
                        'box_content' => esc_html__('Viel Raum zum besten Preis-Leistungs-Verhältnis.', 'wpx-elements'),
                        
                    ],   
                    [       
                        
                        'box_title' => esc_html__( 'Geschlossene Box', 'wpx-elements' ),  
                        'box_content' => esc_html__('Die (blick)sichere Box auch für größere Schätze.', 'wpx-elements'),
                        
                    ], 
                     

                ],
                'title_field' => '{{{ box_title }}}',
            ]
        );

        $this->end_controls_section();

 


      }
        protected function render() {
           $settings = $this->get_settings();
           $allowed_tags = wp_kses_allowed_html( 'post' ); 
            ?>  
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
                    <?php echo $wrapper_start;?> 
                    <div class="feature-box">
                        <div class="feature-img">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $option_list, 'full', 'box_image' );?> 
                        </div>
                        <div class="feature-content">
                            <h3 class="title"><?php echo wpx_kses_intermediate( $option_list['box_title'] );?></h3>
                            <p><?php echo wpx_kses_intermediate( $option_list['box_content'] );?></p>
                        </div>
                    </div>
                    <?php echo $wrapper_end;?> 
                </div> 
                 <?php } ?>
            </div>   
        <?php 
        }
    }
 