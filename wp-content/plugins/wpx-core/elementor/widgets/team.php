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

class wpx_team extends Widget_Base {

 public function get_name() {
        return 'wpx-team';
    }    
    public function get_title() {
        return __( 'Section: Team', 'wpx-elements' );
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
            'team_image',
            [
                'label' => esc_html__( 'Features Image', 'wpx-elements' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                   'url' => $this->wpx_get_img( 'team/1.jpg' ),
                ],
            ]
        );        
        $repeater->add_control(
            'team_title',
            [
                'label'   => esc_html__('Title', 'wpx-elements' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Esther Howard',
            ]
        ); 
        $repeater->add_control(
            'team_sub_title',
            [
                'label'   => esc_html__('Sub Title', 'wpx-elements' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Chief Executive Officer',
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
                'default' => 'no',
                'separator' => 'before',
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
                'default' => 'fade',
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
                'default' => '500',
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
                'default' => '100',
                'condition' => array( 'animation_show_hide' => array( 'yes' ) ),
            ]
        );             
        $this->add_control(
            'list_team',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                 'default' => [
                    [       
                        'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'team_title' => esc_html__( 'Esther Howard', 'wpx-elements' ),  
                        'team_sub_title' => esc_html__( 'Chief Executive Officer', 'wpx-elements' ),  
                        'team_image' => [
                            'url' => $this->wpx_get_img( 'team/1.jpg' ),
                        ],
                    ],                    
                    [       
                        'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'team_title' => esc_html__( 'Floyd Miles', 'wpx-elements' ),  
                        'team_sub_title' => esc_html__( 'Co-Founder', 'wpx-elements' ),  
                        'team_image' => [
                            'url' => $this->wpx_get_img( 'team/2.jpg' ),
                        ],
                    ],                    
                    [       
                        'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'team_title' => esc_html__( 'Bessie Cooper', 'wpx-elements' ),  
                        'team_sub_title' => esc_html__( 'Project Manager', 'wpx-elements' ),  
                        'team_image' => [
                            'url' => $this->wpx_get_img( 'team/3.jpg' ),
                        ],
                    ],                    
                    [       
                        'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'team_title' => esc_html__( 'Esther Howard', 'wpx-elements' ),  
                        'team_sub_title' => esc_html__( 'Chief Executive Officer', 'wpx-elements' ),  
                        'team_image' => [
                            'url' => $this->wpx_get_img( 'team/4.jpg' ),
                        ],
                    ],                    
                    [       
                        'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'team_title' => esc_html__( 'Theresa Webb', 'wpx-elements' ),  
                        'team_sub_title' => esc_html__( 'Project Lead', 'wpx-elements' ),  
                        'team_image' => [
                            'url' => $this->wpx_get_img( 'team/5.jpg' ),
                        ],
                    ],                    
                    [       
                        'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'team_title' => esc_html__( 'Savannah Nguyen', 'wpx-elements' ),  
                        'team_sub_title' => esc_html__( 'Senior Software Engineer', 'wpx-elements' ),  
                        'team_image' => [
                            'url' => $this->wpx_get_img( 'team/6.jpg' ),
                        ],
                    ],                    
                    [       
                        'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'team_title' => esc_html__( 'Kristin Watson', 'wpx-elements' ),  
                        'team_sub_title' => esc_html__( 'Project Lead', 'wpx-elements' ),  
                        'team_image' => [
                            'url' => $this->wpx_get_img( 'team/7.jpg' ),
                        ],
                    ],                    
                    [       
                        'sal_animation' => esc_html__('Fade', 'wpx-elements'),
                        'sal_duration' => esc_html__('500', 'wpx-elements'),
                        'sal_delay' => esc_html__('100', 'wpx-elements'),
                        'team_title' => esc_html__( 'Cody Fisher', 'wpx-elements' ),  
                        'team_sub_title' => esc_html__( 'Senior Software Engineer', 'wpx-elements' ),  
                        'team_image' => [
                            'url' => $this->wpx_get_img( 'team/8.jpg' ),
                        ],
                    ],                    

                ],
                'title_field' => '{{{ team_title }}}',
            ]
        );

        $this->end_controls_section();


  }
	protected function render() {
	    $settings = $this->get_settings();
        
        ?> 
        <div class="container">   
            <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-lg-4">
                <?php foreach ($settings['list_team'] as $option_list) { 
                        
                ?> 
                <div class="col">
                    <?php if ( $option_list['animation_show_hide'] == 'yes') { ?>
                        <div data-sal="<?php echo esc_html($option_list['sal_animation']); ?>" data-sal-duration="<?php echo esc_html($option_list['sal_duration']); ?>" data-sal-delay="<?php echo esc_html($option_list['sal_delay']); ?>">
                    <?php } ?>
                        <div class="team-style-1">
                            <div class="team-thumb">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $option_list, 'full', 'team_image' );?> 
                            </div>
                            <div class="team-content">
                                <h3 class="title"><?php echo wpx_kses_intermediate( $option_list['team_title'] );?></h3>
                                <div class="sub-title"><?php echo wpx_kses_intermediate( $option_list['team_sub_title'] );?></div>
                            </div>
                        </div>
                    <?php if ( $option_list['animation_show_hide'] == 'yes') { ?>
                        </div>
                    <?php } ?> 
                </div>
                <?php } ?>        
            </div>
        </div>
    <?php
  
	}
}