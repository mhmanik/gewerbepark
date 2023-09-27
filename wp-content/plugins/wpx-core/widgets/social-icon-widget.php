<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */

class About_Icon_Widget extends WP_Widget {
	public function __construct() {
		$id =  'wpx_social_icon';
		parent::__construct(
            $id, // Base ID
            esc_html__( 'WpX: Social icon', 'wpx' ), // Name
            array( 'description' => esc_html__( 'WpX: Social icon widget', 'wpx' )
            	) );
	}

	public function widget( $args, $instance ){
		echo wp_kses_post( $args['before_widget'] );
	
		if ( !empty( $instance['title'] ) ) {
			$html = apply_filters( 'widget_title', $instance['title'] );
			$html = $args['before_title'] . $html .$args['after_title'];
		}
		else {
			$html = '';
		}

		echo wp_kses_post( $html );
		?>
		<div class="social-icon-widget">

			<ul>
				<?php
				if( !empty( $instance['twitter'] ) ){
					?><li class="twitter"><a href="<?php echo esc_url( $instance['twitter'] ); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li><?php
				}	
				if( !empty( $instance['facebook'] ) ){
					?><li class="facebook"><a href="<?php echo esc_url( $instance['facebook'] ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li><?php
				}
				if( !empty( $instance['instagram'] ) ){
					?><li class="instagram"><a href="<?php echo esc_url( $instance['instagram'] ); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li><?php
				}							
				if( !empty( $instance['youtube'] ) ){
					?><li class="youtube"><a href="<?php echo esc_url( $instance['youtube'] ); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li><?php
				}
				if( !empty( $instance['linkedin'] ) ){
					?><li class="linkedin"><a href="<?php echo esc_url( $instance['linkedin'] ); ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li><?php
				}
				if( !empty( $instance['pinterest'] ) ){
					?><li class="pinterest"><a href="<?php echo esc_url( $instance['pinterest'] ); ?>" target="_blank"><i class="fab fa-pinterest"></i></a></li><?php
				}				
				
				?>
			</ul>		

		</div>
	<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance                  = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		
		$instance['facebook']      = ( ! empty( $new_instance['facebook'] ) ) ? sanitize_text_field( $new_instance['facebook'] ) : '';
		$instance['twitter']       = ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
		
		$instance['youtube']         = ( ! empty( $new_instance['youtube'] ) ) ? sanitize_text_field( $new_instance['youtube'] ) : '';
		$instance['linkedin']      = ( ! empty( $new_instance['linkedin'] ) ) ? sanitize_text_field( $new_instance['linkedin'] ) : '';
		$instance['pinterest']     = ( ! empty( $new_instance['pinterest'] ) ) ? sanitize_text_field( $new_instance['pinterest'] ) : '';
		
		$instance['instagram']     = ( ! empty( $new_instance['instagram'] ) ) ? sanitize_text_field( $new_instance['instagram'] ) : '';
		
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'       	=> '',
			'facebook'    	=> '',
			'twitter'     	=> '',			
			'youtube'       => '',
			'linkedin'    => '',
			'pinterest'   => '',			
			'instagram'   => '',
			
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'       => array(
				'label'   => esc_html__( 'Title', 'wpx' ),
				'type'    => 'text',
			),
			
			
			'facebook'    => array(
				'label'   => esc_html__( 'Facebook URL', 'wpx' ),
				'type'    => 'url',
			),
			'twitter'     => array(
				'label'   => esc_html__( 'Twitter URL', 'wpx' ),
				'type'    => 'url',
			),
			
			'youtube'       => array(
				'label'   => esc_html__( 'YouTube URL', 'wpx' ),
				'type'    => 'url',
			),
			'linkedin'    => array(
				'label'   => esc_html__( 'Linkedin URL', 'wpx' ),
				'type'    => 'url',
			),
			'pinterest'   => array(
				'label'   => esc_html__( 'Pinterest URL', 'wpx' ),
				'type'    => 'url',
			),
			
			'instagram'   => array(
				'label'   => esc_html__( 'Instagram URL', 'wpx' ),
				'type'    => 'url',
			),
			
		);

		WpX_Widget_Fields::display( $fields, $instance, $this );
	}
}