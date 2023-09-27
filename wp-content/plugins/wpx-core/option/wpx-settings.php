<?php
if ( !class_exists('WpX_Settings' ) ):
class WpX_Settings {

    private $settings_api;

    function __construct() {
        $this->settings_api = new WpX_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_options_page( 'Settings API', 'Programs Dates', 'delete_posts', 'settings_api_test', array($this, 'plugin_page') );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id'    => 'wpx_default_programs',
                'title' => __( 'Programs Date', 'wpx-elements' )
            ), 
             
           
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(

            'wpx_default_programs' => array( 
                array(
                    'name'              => 'classes_start_default_date',
                    'label'             => __( 'All Programs Default Date', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [start_date]', 'wpx-elements' ),
                    
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),  

                 array(
                    'name'              => 'ba_classes_start_date',
                    'label'             => __( 'Business Administration', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [ba_start_date]', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),  
                array(
                    'name'              => 'baa_classes_start_date',
                    'label'             => __( 'Business Administrative Assistant', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [baa_start_date]', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),   
                array(
                    'name'              => 'cj_classes_start_date',
                    'label'             => __( 'Criminal Justice', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [cj_start_date]', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),  
                array(
                    'name'              => 'daa_classes_start_date',
                    'label'             => __( 'Dental Administrative Assistant', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [daa_start_date]', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),   

                array(
                    'name'              => 'da_classes_start_date',
                    'label'             => __( 'Dental Assistant', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [da_start_date]', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),  
                array(
                    'name'              => 'ha_classes_start_date',
                    'label'             => __( 'Healthcare Administration', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [ha_start_date]', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),   
                array(
                    'name'              => 'la_classes_start_date',
                    'label'             => __( 'Legal Assistant', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [la_start_date]', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),  
                array(
                    'name'              => 'mt_classes_start_date',
                    'label'             => __( 'Massage Therapy', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [mt_start_date]', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name'              => 'maa_classes_start_date',
                    'label'             => __( 'Medical Administrative Assistant', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [maa_start_date]', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ), 
                array(
                    'name'              => 'ma_classes_start_date',
                    'label'             => __( 'Medical Assistant', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [ma_start_date]', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),  
                array(
                    'name'              => 'mbc_classes_start_date',
                    'label'             => __( 'Medical Billing and Coding ', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [mbc_start_date]', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ), 
                array(
                    'name'              => 'ps_classes_start_date',
                    'label'             => __( 'Paralegal Studies', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [ps_start_date]', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),  
                array(
                    'name'              => 'pt_classes_start_date',
                    'label'             => __( 'Pharmacy Technician ', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [pt_start_date]', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ), 
                array(
                    'name'              => 'ptt_classes_start_date',
                    'label'             => __( 'Phlebotomy Technician Training ', 'wpx-elements' ),
                    'desc'              => __( 'Shortcode - [ptt_start_date]', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),  


                array(
                    'name'              => 'pdf_school_catalog',
                    'label'             => __( 'Download School Catalog Link ', 'wpx-elements' ),
                    'desc'              => __( 'Default Link', 'wpx-elements' ), 
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),  


            ),    

        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';

            $this->settings_api->show_navigation();
            $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;
