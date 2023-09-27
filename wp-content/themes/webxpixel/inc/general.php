<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
 */ 

if ( !isset( $content_width ) ) {
	$content_width = 1200;
}
add_action('after_setup_theme', 'webxpixel_landing_setup');
if ( !function_exists( 'webxpixel_landing_setup' ) ) {
	function webxpixel_landing_setup() {
		// Language
		load_theme_textdomain( 'webxpixel', WPX_BASE_DIR . 'languages' );
		// Theme supports
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails' );
		add_theme_support('automatic-feed-links' );
		add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_post_type_support( 'post', 'page-attributes' );

		/*Gutenberg Support*/
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );			
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles');
		add_theme_support( 'woocommerce' );	

		add_theme_support( 'custom-logo', array(
		    'height' => 480,
		    'width'  => 720,
		) );

		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'primary Color', 'webxpixel' ),
				'slug' => 'webxpixel-primary-color',
				'color' => '#007a86',
			),
			array(
				'name' => esc_html__( 'Secondary Color', 'webxpixel' ),
				'slug' => 'webxpixel-secondary-color',
				'color' => '#b8036b',
			),
			array(
				'name' => esc_html__( 'Body Color', 'webxpixel' ),
				'slug' => 'webxpixel-body-color',
				'color' => '#363636',
			),
			array(
				'name' => esc_html__( 'Border Color', 'webxpixel' ),
				'slug' => 'webxpixel-border-color',
				'color' => '#d3d3d3',
			),
		) );


		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => esc_html__( 'Small', 'webxpixel' ),
				'size' => 12,
				'slug' => 'small'
			),
			array(
				'name' => esc_html__( 'Normal', 'webxpixel' ),
				'size' => 16,
				'slug' => 'normal'
			),
			array(
				'name' => esc_html__( 'Large', 'webxpixel' ),
				'size' => 36,
				'slug' => 'large'
			),
			array(
				'name' => esc_html__( 'Huge', 'webxpixel' ),
				'size' => 50,
				'slug' => 'huge'
			)
		) );

		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support('editor-styles');		
	 	 
		// Register menus
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary', 'webxpixel' ),			
			'footer'  => esc_html__( 'Footer', 'webxpixel' ),			
		) );		
		add_editor_style();
	}
}

function webxpixel_theme_add_editor_styles() {   
	add_editor_style( 'style-editor.css' );
	add_editor_style( get_stylesheet_uri() );
}

add_action( 'admin_init', 'webxpixel_theme_add_editor_styles' );
add_action( 'wp_head', 'webxpixel1_pingback' );
function webxpixel1_pingback() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
   