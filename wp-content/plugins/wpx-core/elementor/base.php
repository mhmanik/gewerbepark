<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */

namespace wpx\wpx_elements;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

    class wpx_Widgets_Control{
        public function __construct(){
            $this->wpx_widgets_control();   
         }

    public function wpx_widgets_control(){
        $sectiontitle = 'on';
        $widgets_manager = \Elementor\Plugin::instance()->widgets_manager; 
      
         $widget_files = [

            [
                'section_title' => 'on',
                'file_path'     => 'elementor/widgets/title.php',
                'class'         => 'wpx_title',
            ],
            [
                'section_title' => 'on',
                'file_path'     => 'elementor/widgets/banner.php',
                'class'         => 'wpx_banner',
            ],
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/feature.php',
            //     'class'         => 'wpx_feature',
            // ],
            [
                'section_title' => 'on',
                'file_path'     => 'elementor/widgets/call-to-action.php',
                'class'         => 'wpx_call_to_action',
            ],
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/testimonial.php',
            //     'class'         => 'wpx_testimonial',
            // ],    
            [
                'section_title' => 'on',
                'file_path'     => 'elementor/widgets/features-box-repeater.php',
                'class'         => 'wpx_features_box_repeater',
            ],    
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/brand.php',
            //     'class'         => 'wpx_brand',
            // ],    
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/process.php',
            //     'class'         => 'wpx_process',
            // ],    
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/event.php',
            //     'class'         => 'wpx_event',
            // ],    
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/work-resource.php',
            //     'class'         => 'wpx_work_resource',
            // ],    
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/faq.php',
            //     'class'         => 'wpx_faq',
            // ],    
            [
                'section_title' => 'on',
                'file_path'     => 'elementor/widgets/pricing.php',
                'class'         => 'wpx_pricing',
            ],    
            [
                'section_title' => 'on',
                'file_path'     => 'elementor/widgets/contact.php',
                'class'         => 'wpx_contact',
            ],    
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/chat.php',
            //     'class'         => 'wpx_chat',
            // ],    
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/results-driven.php',
            //     'class'         => 'wpx_results_driven',
            // ],    
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/contact-form.php',
            //     'class'         => 'wpx_contact_form',
            // ],    
            [
                'section_title' => 'on',
                'file_path'     => 'elementor/widgets/services-repeater.php',
                'class'         => 'wpx_services_repeater',
            ],    
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/team.php',
            //     'class'         => 'wpx_team',
            // ],    
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/search.php',
            //     'class'         => 'wpx_search',
            // ],    
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/subscribe.php',
            //     'class'         => 'wpx_subscribe',
            // ],    
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/button.php',
            //     'class'         => 'wpx_button',
            // ],    
            // [
            //     'section_title' => 'on',
            //     'file_path'     => 'elementor/widgets/documentation-category.php',
            //     'class'         => 'wpx_documentation_category',
            // ],    
            
        ];
        foreach ($widget_files as $widget_file) {
            if ( file_exists( WPX_ELEMENTS_BASE_DIR . $widget_file['file_path'] ) && $widget_file['section_title'] == 'on' ) {                
                require_once WPX_ELEMENTS_BASE_DIR. $widget_file['file_path'];
                $class_name_with_namespace = "wpx\\wpx_elements\\" . $widget_file['class'];
                $widgets_manager->register_widget_type( new $class_name_with_namespace() );
            }
        }


    }
}    
new wpx_Widgets_Control();