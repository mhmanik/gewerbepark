<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
 */

add_action('widgets_init', 'webxpixel_register_sidebars');
if (!function_exists('webxpixel_register_sidebars')) {
    function webxpixel_register_sidebars()
    {
        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'webxpixel'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'webxpixel'),
            'before_widget' => '<aside id="%1$s" class="section-title-wrp widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => esc_html__('Header Top Left', 'webxpixel'),
            'id' => 'header-top-left',
            'description' => esc_html__('Add Left', 'webxpixel'),
            'before_widget' => '<aside id="%1$s" class="widgets %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="header-widgets-top">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Header Top Right', 'webxpixel'),
            'id' => 'header-top-right',
            'description' => esc_html__('Add Right', 'webxpixel'),
            'before_widget' => '<aside id="%1$s" class="widgets %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="header-widgets-top">',
            'after_title' => '</h3>',
        ));
         
        register_sidebar(array(
            'name' => esc_html__('Footer Top', 'webxpixel'),
            'id' => 'footer-top',
            'description' => esc_html__('Add Footer About', 'webxpixel'),
            'before_widget' => '<aside id="%1$s" class="footer-cta widgets %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widgets-title">',
            'after_title' => '</h3>',
        )); 

        register_sidebar(array(
            'name' => esc_html__('Footer 1', 'webxpixel'),
            'id' => 'footer1',
            'description' => esc_html__('Add Footer About', 'webxpixel'),
            'before_widget' => '<aside id="%1$s" class="footer-about widgets %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widgets-title">',
            'after_title' => '</h3>',
        ));
          register_sidebar(array(
            'name' => esc_html__('Footer 2', 'webxpixel'),
            'id' => 'footer2',
            'description' => esc_html__('Add Footer Menu', 'webxpixel'),
            'before_widget' => '<aside id="%1$s" class="widgets %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widgets-title">',
            'after_title' => '</h3>',
        ));
          register_sidebar(array(
            'name' => esc_html__('Footer 3', 'webxpixel'),
            'id' => 'footer3',
            'description' => esc_html__('Add Footer Left', 'webxpixel'),
            'before_widget' => '<aside id="%1$s" class="widgets %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widgets-title">',
            'after_title' => '</h3>',
        ));
          register_sidebar(array(
            'name' => esc_html__('Footer 4', 'webxpixel'),
            'id' => 'footer4',
            'description' => esc_html__('Add Footer Left', 'webxpixel'),
            'before_widget' => '<aside id="%1$s" class="widgets %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widgets-title">',
            'after_title' => '</h3>',
        ));
           

        register_sidebar(array(
            'name' => esc_html__('Footer copyright', 'webxpixel'),
            'id' => 'footer-copyright',
            'description' => esc_html__('Add Copyright', 'webxpixel'),
            'before_widget' => '<aside id="%1$s" class="widgets %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widgets-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer Menu', 'webxpixel'),
            'id' => 'footer-menu',
            'description' => esc_html__('Add Menu', 'webxpixel'),
            'before_widget' => '<aside id="%1$s" class="widgets %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widgets-title">',
            'after_title' => '</h3>',
        ));
    }
}