<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */ 

class apply_footer_cto extends WP_Widget {
	public function __construct() {
		$id =  'wpx_footer_top';
		parent::__construct(
          $id, // Base ID
          esc_html__( 'WpX: Footer CTO', 'wpx' ), // Name
          	array( 'description' => esc_html__( 'WpX:  Footer Top', 'wpx' )
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
      <div class="get-started-widget">
          <div class="content">
              <h3 class="m-b-10 text-secondary">
                 <?php echo wp_kses( $instance['title'], $allowed_tags ); ?>
              </h3>
              <?php if($instance['sub_title']){?>
              <p class="m-b-15 text-primary body-b1">
                  <?php echo wp_kses( $instance['sub_title'], $allowed_tags ); ?>
              </p>
                  <?php } ?>
              <?php if($instance['url']){?>
                <a href="<?php echo esc_url( $instance['url'] ); ?>" class="btn btn-action">
                    <?php echo esc_attr( $instance['btn_txt'] ); ?>
                    <i class="far fa-long-arrow-right m-l-10"></i>
                </a>
               <?php } ?>
          </div>
          <?php if($imghtml){?> 
          <div class="widget-image">
              <img width="336" height="158" src="<?php echo wp_kses( $imghtml, $allowed_tags ); ?>" alt="Awards logo">
          </div>
          <?php } ?>
      </div>
		     
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$allowed_tags  = wp_kses_allowed_html( 'post' );
		$instance                  = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? wp_kses( $new_instance['title'], $allowed_tags) : '';	 
		$instance['sub_title']     = ( ! empty( $new_instance['sub_title'] ) ) ? wp_kses( $new_instance['sub_title'], $allowed_tags) : '';	 
		$instance['bgimage']       = ( ! empty( $new_instance['bgimage'] ) ) ? sanitize_text_field( $new_instance['bgimage'] ) : '';		
		$instance['url']           = ( ! empty( $new_instance['url'] ) ) ? sanitize_text_field( $new_instance['url'] ) : '';
		$instance['btn_txt']       = ( ! empty( $new_instance['btn_txt'] ) ) ? sanitize_text_field( $new_instance['btn_txt'] ) : '';
 
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'       		=> '',		 
			'sub_title'       => '',		 
			'bgimage'        	=> '', 
			'url'        			=> '', 
			'btn_txt'        	=> 'Get Started With My New Career',   
			 
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'       => array(
				'label'   => esc_html__( 'Title', 'wpx' ),
				'type'    => 'textarea',
			),	
			'sub_title'       => array(
				'label'   => esc_html__( 'Sub Title', 'wpx' ),
				'type'    => 'textarea',
			),			 
			'bgimage'        => array(
				'label'   => esc_html__( 'Image', 'wpx' ),
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