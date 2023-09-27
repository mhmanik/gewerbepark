<?php
/**
* @author wpx
* @since   1.0
* @version 1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'WPX_Postmeta' ) ) {
	return;
}

$WpX_Postmeta 	= WPX_Postmeta::getInstance();
 
$nav_menus 		= wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus 		= array( 'default' => esc_html__( 'Default', 'wpx' ) ) + $nav_menus;
 


$WpX_Postmeta->add_meta_box( 'program_settings', esc_html__( 'Select Program', 'wpx' ), array( 'page' ), '', 'side', 'high', array(
	'fields' => array(	 
  
		"wpx_programs_select" => array(
			'label'   => esc_html__( 'Programs', 'wpx' ),
			'type'    => 'select',
			'options' => array(			
				'business-administration' => 'Business Administration',
				'business-administrative-assistant' => 'Business Administrative Assistant',
				'briminal-justice' => 'Criminal Justice',
				'dental-administrative-assistant' => 'Dental Administrative Assistant',
				'dental-assistant' => 'Dental Assistant',
				'healthcare-administration' => 'Healthcare Administration',
				'legal-assistant' => 'Legal Assistant',
				'massage-therapy' => 'Massage Therapy',
				'medical-administrative-assistant' => 'Medical Administrative Assistant',
				'medical-assistant' => 'Medical Assistant',
				'medical-billing-and-coding' => 'Medical Billing and Coding',
				'paralegal-studies' => 'Paralegal Studies',
				'pharmacy-technician' => 'Pharmacy Technician',
				'phlebotomy' => 'Phlebotomy',
				'scholarship' => 'Scholarship',
				'generic-program' => 'Generic Program',
  
			),
			'default'  => 'generic-program',
			),
		
		 
		),
	) 
);
 
 