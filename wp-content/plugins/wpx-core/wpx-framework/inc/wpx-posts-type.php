<?php
if( !class_exists( 'WpX_Posts' ) ){

	class WpX_Posts {
		
		protected static $instance = null;
		private $post_types = array();
		private $taxonomies = array();

		private function __construct() {
			add_action( 'init', array( $this, 'initialize' ) );
		}

		public static function getInstance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		public function initialize() {
			$this->register_taxonomies();
			$this->register_custom_post_types();
		}

		public function add_post_types( $post_types ) {

			foreach ( $post_types as $post_type => $args ) {

				$title = $args['title'];
				$plural_title = empty( $args['plural_title'] ) ? $title . 's' : $args['plural_title'];
				
				if ( ! empty( $args['rewrite'] ) ) {
					$args['rewrite'] = array( 'slug' => $args['rewrite'] );
				}

				$labels      = array(
					'name'               => $plural_title,
					'singular_name'      => $title,
					'add_new'            => esc_html__( 'Add New', 'wpx-core' ),
					'add_new_item'       => esc_html__( 'Add New', 'wpx-core' ) .' '. $title,
					'edit_item'          => esc_html__( 'Edit', 'wpx-core' ) .' '. $title,
					'new_item'           => esc_html__( 'New', 'wpx-core' ) .' '. $title,
					'all_items'          => esc_html__( 'All', 'wpx-core' ) .' '. $plural_title,
					'view_item'          => esc_html__( 'View', 'wpx-core' ) .' '. $title,
					'search_items'       => esc_html__( 'Search', 'wpx-core' ) .' '. $plural_title,
					'not_found'          => $plural_title . esc_html__( ' not found', 'wpx-core' ),
					'not_found_in_trash' => $plural_title . esc_html__( ' not found in Trash', 'wpx-core' ),
					'parent_item_colon'  => '',
					'menu_name'          => $plural_title
					);

				if ( !empty( $args['labels_override'] ) ) {
					$labels = wp_parse_args( $args['labels_override'], $labels );
				}

				$defaults = array(
					'labels'             => $labels,
					'public'             => true,
					'publicly_queryable' => true,
					'show_ui'            => true,
					'show_in_menu'       => true,
					'show_in_nav_menus'  => true,
					'query_var'          => true,
					'has_archive'        => true,
					'hierarchical'       => false,
					'menu_position'      => null,
					'menu_icon'          => null,
					'supports'           => array( 'title', 'thumbnail', 'editor' )
					);

				$args = wp_parse_args( $args, $defaults );
				$this->post_types[ $post_type ] = $args;
			}
		}

		public function add_taxonomies( $taxonomies ) {

			foreach ($taxonomies as $taxonomy => $args ) {

				$title = $args['title'];
				$plural_title = empty( $args['plural_title'] ) ? $title . 's' : $args['plural_title'];

				$labels     = array(
					'name'              => $title,
					'singular_name'     => $title,
					'search_items'      => esc_html__( 'Search', 'wpx-core' ) .' '. $plural_title,
					'all_items'         => esc_html__( 'All', 'wpx-core' ) .' '. $plural_title,
					'parent_item'       => esc_html__( 'Parent', 'wpx-core' ) .' '. $title,
					'parent_item_colon' => esc_html__( 'Parent', 'wpx-core' ) .' '. $title.':',
					'edit_item'         => esc_html__( 'Edit', 'wpx-core' ) .' '. $title,
					'update_item'       => esc_html__( 'Update', 'wpx-core' ) .' '. $title,
					'add_new_item'      => esc_html__( 'Add New', 'wpx-core' ) .' '. $title,
					'new_item_name'     => esc_html__( 'New name of', 'wpx-core' ) .' '. $title,
					'menu_name'         => $plural_title,
					);

				if ( !empty( $args['labels_override'] ) ) {
					$labels = wp_parse_args( $args['labels_override'], $labels );
				}

				$defaults = array(  
					'hierarchical'      => true,
					'labels'            => $labels,
					'show_in_nav_menus' => true,
					'show_ui'           => null,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite'           => array( 'slug' => $taxonomy )
					);

				$args = wp_parse_args( $args, $defaults );
				$this->taxonomies[ $taxonomy ] = $args;
			}
		}

		private function register_custom_post_types() {
			foreach ( $this->post_types as $post_type => $args ) {
				register_post_type( $post_type, $args );
			}
		}

		private function register_taxonomies() {
			foreach ( $this->taxonomies as $taxonomy => $args ) {
				register_taxonomy( $taxonomy, $args['post_types'], $args );
			}
		}
	}
}

WpX_Posts::getInstance();