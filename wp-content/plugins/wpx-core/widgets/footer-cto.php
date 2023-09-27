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
		 
		 $allowed_tags  = wp_kses_allowed_html( 'post' );
		
		?>    
      <div class="cat-started-widget">
          <div class="content-wrp">
          	<div class="cto-left">
	              <h5 class="mb-0 title">
	                 <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.000143707 10.497C-0.0102966 11.4043 0.548981 12.2208 1.39871 12.5389V8.65087C1.39871 8.59493 1.42666 8.51103 1.42666 8.45508C0.5712 8.77064 0.00223176 9.58509 0.000143707 10.497Z" fill="#2B2E52"/>
<path d="M7.63698 15.3081H3.97266L5.34328 20.2871C5.54625 21.0469 6.23509 21.5751 7.02159 21.5738C7.58119 21.5805 8.11065 21.3209 8.44816 20.8745C8.78894 20.4499 8.89404 19.8826 8.72785 19.3641L7.63698 15.3081Z" fill="#2B2E52"/>
<path d="M1.42578 8.42688H1.45373V8.39893C1.45373 8.42688 1.45373 8.42688 1.42578 8.42688Z" fill="black"/>
<path d="M21.4816 8.03516H21.2578V13.0701H21.4816C22.872 13.0701 23.9991 11.943 23.9991 10.5527C23.9991 9.16228 22.8719 8.03516 21.4816 8.03516Z" fill="#2B2E52"/>
<path d="M2.23828 8.65077V12.6228C2.26853 13.6514 3.11136 14.4694 4.14034 14.4689H9.23123V6.9165H4.14034C3.13336 6.9165 2.23828 7.64379 2.23828 8.65077Z" fill="#2B2E52"/>
<path d="M10.0703 14.5806L20.4199 18.7205V2.55273L10.0703 6.6926V14.5806Z" fill="#2B2E52"/>
</svg> <?php echo wp_kses( $instance['title'], $allowed_tags ); ?>
	              </h5>
              </div>
              <?php if($instance['url']){?>
              	<div class="cto-right">
	                <a href="<?php echo esc_url( $instance['url'] ); ?>" class="btn btn-action">
	                    <?php echo esc_attr( $instance['btn_txt'] ); ?> 
	                </a>
                </div>
               <?php } ?>
          </div> 
      </div>
		     
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$allowed_tags  = wp_kses_allowed_html( 'post' );
		$instance                  = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? wp_kses( $new_instance['title'], $allowed_tags) : '';	 
		$instance['url']           = ( ! empty( $new_instance['url'] ) ) ? sanitize_text_field( $new_instance['url'] ) : '';
		$instance['btn_txt']       = ( ! empty( $new_instance['btn_txt'] ) ) ? sanitize_text_field( $new_instance['btn_txt'] ) : '';
 
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'       		=> 'Honest confession! We love WpX so much so that it is the only software we use to run our entire HR operations!',	 
			'url'        			=> '', 
			'btn_txt'        	=> 'Learn More',   
			 
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
			'btn_txt'       => array(
				'label'   => esc_html__( 'Link Text', 'wpx' ),
				'type'    => 'text',
			), 
 
		);
		WpX_Widget_Fields::display( $fields, $instance, $this );
	}
}