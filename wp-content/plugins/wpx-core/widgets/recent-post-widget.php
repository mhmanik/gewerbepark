<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */ 
     
class Recent_Posts_Widget extends WP_Widget {

		public function __construct() {
			$id = 'wpx_posts';
			parent::__construct(
	        $id, // Base ID
	        esc_html__( 'WpX: Recent Posts', 'wpx' ), // Name
	        array( 'description' => esc_html__( 'WpX: Recent Posts Widget', 'wpx' ) 
	        	) );
		}
		public function widget($args, $instance) {
			if (!isset($args['widget_id'])) {
				$args['widget_id'] = $this->id;
			}
			
			$title                = (!empty($instance['title'])) ? $instance['title'] : esc_html__('Recent Posts', 'wpx');
			$title                = apply_filters('widget_title', $title, $instance, $this->id_base);
			$number               = (!empty($instance['number'])) ? absint($instance['number']) : 5;
			$content_limit        = (!empty($instance['content_limit'])) ? absint($instance['content_limit']) : 10;

			$btn_txt        			= (!empty($instance['btn_txt'])) ? $instance['btn_txt'] : 'MORE NEWS &amp; BLOG POSTS';
			$btn_url        			= (!empty($instance['btn_url'])) ? $instance['btn_url'] : '';


			if (!$number) {
				$number = 3;
			}
			$show_img     = isset($instance['show_img']) ? $instance['show_img'] : false;
			$show_date    = isset($instance['show_date']) ? $instance['show_date'] : false;
			$show_content = isset($instance['show_content']) ? $instance['show_content'] : false;
			 
			$categories = get_the_category(); 
			$cat_slug = $categories[0]->slug;
		
			/*if ( ! empty( $categories ) ) {
			    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
			}
			*/

   			$result_query = new WP_Query(apply_filters('widget_posts_args', array(
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
				'category_name' 		=> $cat_slug,
				'post_status' 			=> 'publish',
				'order' 				=> 'DESC',
			)));
			if ($result_query->have_posts()):
			?>
		<?php	echo wp_kses_post( $args['before_widget'] );
	
		if ( !empty( $instance['title'] ) ) {
			$html = apply_filters( 'widget_title', $instance['title'] );
			$html = $args['before_title'] . $html . ' ' .$cat_slug .$args['after_title'];
		}
		else {
			$html = '';
		}

		echo wp_kses_post( $html ); ?>

			<div class="widget-mid">
		<?php while ($result_query->have_posts()): $result_query->the_post();
			$content = Helper::get_current_post_content();
			$content = wp_trim_words( $content, $content_limit );
			$content = "<p>$content</p>";
		?>
	            <div class="media">
	            <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
	            
            </div>
		<?php endwhile;	 ?>

		
		</div>
	<?php if($btn_url){?>

			<div class="btn-area">
				<a class="btn btn-lg-primary w-100" href="<?php echo esc_url($btn_url);?>"><?php echo wp_kses_post( $btn_txt );?></a>
			</div>
		<?php 	} ?>
		<?php echo wp_kses_post($args['after_widget']); ?>
		<?php
        wp_reset_postdata();
			endif;
		}
		public function update($new_instance, $old_instance) {
			$instance                  = $old_instance;
			$instance['title']         = sanitize_text_field($new_instance['title']);
			$instance['number']        = (int) $new_instance['number'];
			$instance['content_limit'] = (int) $new_instance['content_limit'];

			$instance['show_img']      = isset($new_instance['show_img']) ? (bool) $new_instance['show_img'] : false;
			$instance['show_date']     = isset($new_instance['show_date']) ? (bool) $new_instance['show_date'] : false;
			$instance['show_content']  = isset($new_instance['show_content']) ? (bool) $new_instance['show_content'] : false;

			$instance['btn_txt']         = $new_instance['btn_txt'];
			$instance['btn_url']         = $new_instance['btn_url'];

			return $instance;
		}
		public function form($instance) {
			$defaults = array(
				'title'         => esc_html__('Latest Post', 'wpx'),
				'number'        => '5',
				'show_img'     	=> true,
				'show_date'     => true,
				'show_content'  => true,
				'content_limit' => '10',
				'btn_txt' 			=> 'MORE NEWS &amp; BLOG POSTS',
				'btn_url' 			=> '',
			);
			$instance = wp_parse_args((array) $instance, $defaults);

			$fields = array(
				'title'         => array(
					'label' => esc_html__('Title', 'wpx'),
					'type'  => 'text',
				),
				'number'        => array(
					'label' => esc_html__('Number of posts to show', 'wpx'),
					'type'  => 'number',
				),

				'content_limit' => array(
					'label' => esc_html__('Content limit of posts to show', 'wpx'),
					'type'  => 'number',
				),
				'show_img'  => array(
					'label' =>esc_html__('Display post Image ?', 'wpx'),
					'type'  => 'checkbox',
				),
				'show_content'  => array(
					'label' => esc_html__('Display post Content ?', 'wpx'),
					'type'  => 'checkbox',
				),
				'show_date'     => array(
					'label' => esc_html__('Display post date ?', 'wpx'),
					'type'  => 'checkbox',
				),
				'btn_txt'         => array(
					'label' => esc_html__('Button Text', 'wpx'),
					'type'  => 'text',
				),	
				'btn_url'         => array(
					'label' => esc_html__('Button Url', 'wpx'),
					'type'  => 'text',
				),
			);

			WpX_Widget_Fields::display($fields, $instance, $this);
		}
	}
