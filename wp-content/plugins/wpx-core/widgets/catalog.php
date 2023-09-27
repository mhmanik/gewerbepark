<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */ 

class catalog_Widget extends WP_Widget {
	public function __construct() {
		$id =  'wpx_catalog';
		parent::__construct(
            $id, // Base ID
            esc_html__( 'WpX: Catalog', 'wpx' ), // Name
            	array( 'description' => esc_html__( 'WpX: Catalog Widget', 'wpx' )
            ) );
	}

	public function widget( $args, $instance ){
		echo wp_kses_post( $args['before_widget'] );

		if ( !empty( $instance['bgimage'] ) ) {
			$html = wp_get_attachment_image_src( $instance['bgimage'], 'full' );
			$imghtml = $html[0]; 
		}
		 $allowed_tags  = wp_kses_allowed_html( 'post' );
		
		?> 

		<div style="background-image: url('<?php echo esc_attr( $imghtml );?>')"  class="widget students-say m-b-20">
            <p class="m-b-10 text-secondary widget-title">
              <?php echo wp_kses( $instance['title'], $allowed_tags ); ?>
                <span class="d-block"> <?php echo wp_kses( $instance['sub_title'], $allowed_tags ); ?></span>
            </p>
            <a href="<?php echo esc_url( $instance['url'] ); ?>" class="app-btn-link text-action text-b4">
                <i class="far fa-chevron-double-right m-r-5"></i> <?php echo wp_kses( $instance['btn_txt'], $allowed_tags ); ?>
            </a>
            <br>
            <a href="<?php echo esc_url( $instance['url2'] ); ?>" class="app-btn-link text-action text-b4">
                <i class="far fa-chevron-double-right m-r-5"></i> <?php echo wp_kses( $instance['btn_txt2'], $allowed_tags ); ?>
            </a>
        </div> 
			 	 
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance                  = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['sub_title']     = ( ! empty( $new_instance['sub_title'] ) ) ? sanitize_text_field( $new_instance['sub_title'] ) : '';
		$instance['bgimage']       = ( ! empty( $new_instance['bgimage'] ) ) ? sanitize_text_field( $new_instance['bgimage'] ) : '';
		
		$instance['url']           = ( ! empty( $new_instance['url'] ) ) ? sanitize_text_field( $new_instance['url'] ) : '';
		$instance['btn_txt']       = ( ! empty( $new_instance['btn_txt'] ) ) ? sanitize_text_field( $new_instance['btn_txt'] ) : '';

		$instance['url2']           = ( ! empty( $new_instance['url2'] ) ) ? sanitize_text_field( $new_instance['url2'] ) : '';
		$instance['btn_txt2']       = ( ! empty( $new_instance['btn_txt2'] ) ) ? sanitize_text_field( $new_instance['btn_txt2'] ) : '';
		 
	 
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'       		=> '',
			'sub_title'       => '',
			'bgimage'        	=> '', 
			'url'        			=> '', 
			'btn_txt'        	=> '', 
			'url2'        		=> '', 
			'btn_txt2'        => '', 
			 
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'       => array(
				'label'   => esc_html__( 'Title', 'wpx' ),
				'type'    => 'text',
			),
			'sub_title'       => array(
				'label'   => esc_html__( 'Sub Title', 'wpx' ),
				'type'    => 'text',
			),
			'bgimage'        => array(
				'label'   => esc_html__( 'background Image', 'wpx' ),
				'type'    => 'image',
			),
			 
			'url'    => array(
				'label'   => esc_html__( 'URL', 'wpx' ),
				'type'    => 'url',
			),
			'btn_txt'       => array(
				'label'   => esc_html__( 'Link Text', 'wpx' ),
				'type'    => 'text',
			), 

			'url2'    => array(
				'label'   => esc_html__( 'URL 2' , 'wpx' ),
				'type'    => 'url',
			),
			'btn_txt2'       => array(
				'label'   => esc_html__( 'Link Text 2', 'wpx' ),
				'type'    => 'text',
			), 
		);

		WpX_Widget_Fields::display( $fields, $instance, $this );
	}
}