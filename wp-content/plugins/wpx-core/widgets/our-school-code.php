<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */ 

class our_school_code_Widget extends WP_Widget {
	public function __construct() {
		$id =  'wpx_our_school_code';
		parent::__construct(
          $id, // Base ID
          esc_html__( 'WpX: Our School Code', 'wpx' ), // Name
          	array( 'description' => esc_html__( 'WpX:  School Code Widget', 'wpx' )
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

      <!-- FAFSA Widget Start -->
      <div class="widget fafsa m-b-20">
          <div class="d-flex align-items-center">
              <img width="70"
                   height="80"
                   src=" <?php echo wp_kses( $imghtml, $allowed_tags ); ?>"
                   alt="FAPSA badge">
              <div class="school-code">
                  <a href="<?php echo esc_url( $instance['url'] ); ?>" class="mb-0 text-secondary widget-title">
                      <?php echo wp_kses( $instance['title'], $allowed_tags ); ?>
                  </a>
                  <span class="code"><?php echo esc_attr( $instance['school_code'] ); ?></span>
              </div>
          </div>
      </div>
      <!-- FAFSA Widget End -->

 
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$allowed_tags  = wp_kses_allowed_html( 'post' );
		$instance                  = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? wp_kses( $new_instance['title'], $allowed_tags) : '';	 
		$instance['bgimage']       = ( ! empty( $new_instance['bgimage'] ) ) ? sanitize_text_field( $new_instance['bgimage'] ) : '';		
		$instance['url']           = ( ! empty( $new_instance['url'] ) ) ? sanitize_text_field( $new_instance['url'] ) : '';
		$instance['school_code']       = ( ! empty( $new_instance['school_code'] ) ) ? sanitize_text_field( $new_instance['school_code'] ) : '';
 
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'       				=> 'FAFSA Application',		 
			'url'        					=> '', 
			'bgimage'        			=> '', 
			'school_code'        	=> 'Our School Code: 038385',   
			 
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'       => array(
				'label'   => esc_html__( 'Title', 'wpx' ),
				'type'    => 'textarea',
			),			 
			'url'    => array(
				'label'   => esc_html__( 'URL', 'wpx' ),
				'type'    => 'url',
			),
			'bgimage'        => array(
				'label'   => esc_html__( 'Image', 'wpx' ),
				'type'    => 'image',
			),		 
			'school_code'       => array(
				'label'   => esc_html__( 'Our School Code', 'wpx' ),
				'type'    => 'text',
			), 
 
		);
		WpX_Widget_Fields::display( $fields, $instance, $this );
	}
}