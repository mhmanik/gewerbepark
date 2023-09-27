<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */ 

class apply_Now_Widget extends WP_Widget {
	public function __construct() {
		$id =  'wpx_apply_now';
		parent::__construct(
          $id, // Base ID
          esc_html__( 'WpX: Apply Now', 'wpx' ), // Name
          	array( 'description' => esc_html__( 'WpX:  Apply Now Widget', 'wpx' )
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
          </p>
          <a href="<?php echo esc_url( $instance['url2'] ); ?>" class="app-btn-link text-action text-b4">
              <i class="far fa-chevron-double-right m-r-5"></i> <?php echo esc_attr( $instance['btn_txt'] ); ?>
          </a>
      </div> 
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$allowed_tags  = wp_kses_allowed_html( 'post' );
		$instance                  = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? wp_kses( $new_instance['title'], $allowed_tags) : '';	 
		$instance['bgimage']       = ( ! empty( $new_instance['bgimage'] ) ) ? sanitize_text_field( $new_instance['bgimage'] ) : '';		
		$instance['url']           = ( ! empty( $new_instance['url'] ) ) ? sanitize_text_field( $new_instance['url'] ) : '';
		$instance['btn_txt']       = ( ! empty( $new_instance['btn_txt'] ) ) ? sanitize_text_field( $new_instance['btn_txt'] ) : '';
 
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'       		=> '',		 
			'bgimage'        	=> '', 
			'url'        			=> '', 
			'btn_txt'        	=> '',   
			 
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'       => array(
				'label'   => esc_html__( 'Title', 'wpx' ),
				'type'    => 'textarea',
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
 
		);
		WpX_Widget_Fields::display( $fields, $instance, $this );
	}
}