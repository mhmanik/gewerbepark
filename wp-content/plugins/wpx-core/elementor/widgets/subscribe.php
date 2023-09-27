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

class wpx_subscribe extends Widget_Base {

 public function get_name() {
        return 'wpx-subscribe';
    }    
    public function get_title() {
        return __( 'Section: Subscribe', 'wpx-elements' );
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
            'section_title',
            [
                'label' => esc_html__('Content', 'wpx-elements'),                 
            ]
        ); 
            $this->add_control(
                'image',
                [
                    'label' => __('Image','wpx-elements'),
                    'type'=>Controls_Manager::MEDIA,
                    'default' => [
                        'url' => $this->wpx_get_img( 'icon/wallet.svg' ),
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
                'title',
                [
                    'label' => esc_html__('Section Title', 'wpx-elements'),
                    'type' => Controls_Manager::TEXT,
                    'default'       => 'FREE lifetime updates',
                    'placeholder' => esc_html__('Type Section Title', 'wpx-elements'),
                    'label_block' => true,      
                    'separator' => 'before',       
                ]
            ); 
            $this->add_control(
                'title_tag',
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
                'description',
                [
                    'label' => esc_html__('Section Description', 'wpx-elements'),
                    'type' => Controls_Manager::TEXTAREA,
                    'default'       => 'You will constantly receive all the upcoming features that will be introduced to WpX. What is more, you will not be charged for those extra perks. Leave your email to get notified once we launch the Business plan.',
                    'placeholder' => esc_html__('Type Section Description', 'wpx-elements'),
                    'label_block' => true,   
                    'separator' => 'before',          
                ]
            ); 
            $this->add_control(
                'subscribe_placeholder_text',
                [
                    'label' => esc_html__('Placeholder Text', 'wpx-elements'),
                    'type' => Controls_Manager::TEXT,
                    'default'       => 'Enter your email',
                    'placeholder' => esc_html__('Type Placeholder Text', 'wpx-elements'),
                    'label_block' => true,  
                    'separator' => 'before',           
                ]
            );          
            $this->add_control(
                'subscribe_button_text',
                [
                    'label' => esc_html__('Button Text', 'wpx-elements'),
                    'type' => Controls_Manager::TEXT,
                    'default'       => 'Get Notified',
                    'placeholder' => esc_html__('Type Button Text', 'wpx-elements'),
                    'label_block' => true,   
                    'separator' => 'before',          
                ]
            );          
            $this->add_control(
                'animation_show_hide',
                [
                    'label' => esc_html__('Animation Show Hide', 'wpx-elements'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Show', 'wpx-elements'),
                    'label_off' => esc_html__('Hide', 'wpx-elements'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'separator' => 'before',
                ]
            );       
            $this->add_control(
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
            $this->add_control(
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
            $this->add_control(
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
        $this->end_controls_section();
  }
	protected function render() {
	    $settings = $this->get_settings();
        
        ?>
        <div class="container">
            <?php if ( $settings['animation_show_hide'] == 'yes') { ?>
                <div data-sal="<?php echo esc_html($settings['sal_animation']); ?>" data-sal-duration="<?php echo esc_html($settings['sal_duration']); ?>" data-sal-delay="<?php echo esc_html($settings['sal_delay']); ?>">
            <?php } ?>
            <div class="subscribe-wrap2">
                <div class="thumbnail">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?>
                </div>
                <div class="content">
                    <?php if ($settings['title_tag']) : ?>
                        <?php  if($settings['title']){ ?>
                            <<?php echo esc_html( $settings['title_tag'] );?> class="title">
                                <?php echo wpx_kses_intermediate( $settings['title'] );?>
                            </<?php echo esc_html( $settings['title_tag'] );?>> 
                        <?php  } ?>             
                    <?php endif; ?>
                    <p class="description"><?php echo wpx_kses_intermediate( $settings['description'] );?></p>
                </div>
                <div class="form-wrap">
                    <form action="" method="">
                        <div class="form-group">
                            <input class="subscribe-input" type="text" name="subscribe" placeholder="<?php echo wpx_kses_intermediate( $settings['subscribe_placeholder_text'] );?>" value="">
                            <button type="submit" class="subscribe-button"><?php echo wpx_kses_intermediate( $settings['subscribe_button_text'] );?></button>
                        </div>
                    </form>
                </div>
            </div>
            <?php if ( $settings['animation_show_hide'] == 'yes') { ?>
                </div>
            <?php } ?>
        </div> 
    <?php  
	}
}