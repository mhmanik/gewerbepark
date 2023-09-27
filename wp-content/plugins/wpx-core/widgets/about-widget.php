<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */ 

class About_Widget extends WP_Widget {
	public function __construct() {
		$id =  'wpx_about';
		parent::__construct(
            $id, // Base ID
            esc_html__( 'WpX: About', 'wpx' ), // Name
            	array( 'description' => esc_html__( 'WpX: About Widget', 'wpx' )
            ) );
	}

	public function widget( $args, $instance ){
				$allowed_tags  = wp_kses_allowed_html( 'post' );
				echo wp_kses_post( $args['before_widget'] );

			if ( !empty( $instance['logo'] ) ) {
				$html = wp_get_attachment_image_src( $instance['logo'], 'full' );
				$html = $html[0];
				$html = '<a class="img-fluid-wrp" href="'. esc_url(home_url('/')) .'"><img class="img-fluid logo" src="' . $html . '" alt="' . $html . '"></a>';
			}
			elseif ( !empty( $instance['title'] ) ) {
				$html = apply_filters( 'widget_title', $instance['title'] );
				$html = $args['before_title'] . $html .$args['after_title'];
			}
			else {
				$html = '';
			}
		?> 
		<?php echo wp_kses_post( $html ); ?>

		<p class="subtitle"><?php echo wp_kses_post( $instance['sub_title'] ); ?></p> 

			<div class="footer-icon d-flex flex-wrap align-items-center justify-content-center m-t-30 m-b-30">
			<?php 
				if( !empty( $instance['facebook'] ) ){
				?>
					<a href="<?php echo esc_url( $instance['facebook'] ); ?>" target="_blank">
						<img width="30" height="30" src="<?php echo WPX_ELEMENTS_BASE_URL . 'widgets/social-icons/fb.png' ?>" alt="Facebook icon">
					</a>
					
				<?php }
				if( !empty( $instance['instagram'] ) ){
					?>
					<a href="<?php echo esc_url( $instance['instagram'] ); ?>" target="_blank">
						 	<img width="30" height="30" src="<?php echo WPX_ELEMENTS_BASE_URL . 'widgets/social-icons/insta.png' ?>" alt="Instagram icon">
						</a>
					<?php } 

				if( !empty( $instance['twitter'] ) ){
					?>
					<a href="<?php echo esc_url( $instance['twitter'] ); ?>" target="_blank">	
						<img width="30" height="30" src="<?php echo WPX_ELEMENTS_BASE_URL . 'widgets/social-icons/twitter.png' ?>" alt="twitter icon">
					</a>
					<?php
				}

				if( !empty( $instance['yelp'] ) ){
					?>
					<a href="<?php echo esc_url( $instance['yelp'] ); ?>" target="_blank">	
						<img width="30" height="30" src="<?php echo WPX_ELEMENTS_BASE_URL . 'widgets/social-icons/yelp.png' ?>" alt="yelp icon">
					</a>
					<?php
				}
				if( !empty( $instance['snap'] ) ){
					?>
					<a href="<?php echo esc_url( $instance['snap'] ); ?>" target="_blank">	
						<img width="30" height="30" src="<?php echo WPX_ELEMENTS_BASE_URL . 'widgets/social-icons/snap.png' ?>" alt="snap icon">
					</a>
					<?php
				}
				if( !empty( $instance['linkedin'] ) ){
					?>
					<a href="<?php echo esc_url( $instance['linkedin'] ); ?>" target="_blank">	
						<img width="30" height="30" src="<?php echo WPX_ELEMENTS_BASE_URL . 'widgets/social-icons/linkedin.png' ?>" alt="linkedin icon">
					</a>
					<?php
				}
				if( !empty( $instance['youtube'] ) ){
					?>
					<a href="<?php echo esc_url( $instance['youtube'] ); ?>" target="_blank">	
						<img width="30" height="30" src="<?php echo WPX_ELEMENTS_BASE_URL . 'widgets/social-icons/youtube.png' ?>" alt="youtube icon">
					</a>
					<?php
				} 

				if( !empty( $instance['tiktok'] ) ){
					?> <a href="<?php echo esc_url( $instance['tiktok'] ); ?>" target="_blank">	
						<img width="30" height="30" src="<?php echo WPX_ELEMENTS_BASE_URL . 'widgets/social-icons/tiktok.png' ?>" alt="tiktok icon">
					</a>
					<?php
				}  
			?>
		</div>		
		 
		<?php
			echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance                  = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['logo']          = ( ! empty( $new_instance['logo'] ) ) ? sanitize_text_field( $new_instance['logo'] ) : '';
		$instance['sub_title']         = ( ! empty( $new_instance['sub_title'] ) ) ? wp_kses( $new_instance['sub_title'], $allowed_tags) : ''; 
		$instance['facebook']      = ( ! empty( $new_instance['facebook'] ) ) ? sanitize_text_field( $new_instance['facebook'] ) : '';
		$instance['twitter']       = ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
		$instance['instagram']     = ( ! empty( $new_instance['instagram'] ) ) ? sanitize_text_field( $new_instance['instagram'] ) : '';
		$instance['yelp']     		= ( ! empty( $new_instance['yelp'] ) ) ? sanitize_text_field( $new_instance['yelp'] ) : '';
		$instance['snap']      		= ( ! empty( $new_instance['snap'] ) ) ? sanitize_text_field( $new_instance['snap'] ) : ''; 
		$instance['linkedin']      		= ( ! empty( $new_instance['linkedin'] ) ) ? sanitize_text_field( $new_instance['linkedin'] ) : ''; 
		$instance['youtube']         = ( ! empty( $new_instance['youtube'] ) ) ? sanitize_text_field( $new_instance['youtube'] ) : '';
		$instance['tiktok']         = ( ! empty( $new_instance['tiktok'] ) ) ? sanitize_text_field( $new_instance['tiktok'] ) : '';
		 
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'       	=> '',
			'logo'        	=> '', 
			'sub_title'      => '',  
			'facebook'    	=> '',
			'twitter'     	=> '',
			'instagram'     => '',
			'yelp'     		=> '',
			'snap'     		=> '', 
			'linkedin'     		=> '', 
			'youtube'       => '',
			'tiktok'       => '',
			 
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'       => array(
				'label'   => esc_html__( 'Title', 'wpx' ),
				'type'    => 'text',
			),
			'logo'        => array(
				'label'   => esc_html__( 'Logo', 'wpx' ),
				'type'    => 'image',
			),
			'sub_title'       => array(
				'label'   => esc_html__( 'About Us', 'wpx' ),
				'type'    => 'textarea',
			),		
			 
			'facebook'    => array(
				'label'   => esc_html__( 'Facebook URL', 'wpx' ),
				'type'    => 'url',
			),
			'twitter'     => array(
				'label'   => esc_html__( 'Twitter URL', 'wpx' ),
				'type'    => 'url',
			), 
			'instagram'   => array(
				'label'   => esc_html__( 'Instagram URL', 'wpx' ),
				'type'    => 'url',
			),
			'yelp'   => array(
				'label'   => esc_html__( 'yelp URL', 'wpx' ),
				'type'    => 'url',
			),
			'linkedin'   => array(
				'label'   => esc_html__( 'linkedin URL', 'wpx' ),
				'type'    => 'url',
			),
			'snap'   => array(
				'label'   => esc_html__( 'Snapchat URL', 'wpx' ),
				'type'    => 'url',
			), 
			'youtube'       => array(
				'label'   => esc_html__( 'YouTube URL', 'wpx' ),
				'type'    => 'url',
			),
			'tiktok'       => array(
				'label'   => esc_html__( 'Tiktok URL', 'wpx' ),
				'type'    => 'url',
			),
			 
		);

		WpX_Widget_Fields::display( $fields, $instance, $this );
	}
}