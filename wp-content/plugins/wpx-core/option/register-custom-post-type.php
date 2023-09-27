<?php
/**
 * Project
 */
            if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_637363596076f',
    'title' => 'Documentation',
    'fields' => array(
        array(
            'key' => 'field_6373635926887',
            'label' => 'Documentation Categories Image',
            'name' => 'documentation-categories-img',
            'aria-label' => '',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'url',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
            'preview_size' => 'medium',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'taxonomy',
                'operator' => '==',
                'value' => 'documentation-category',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
));

endif;      


if (!function_exists('wpx_custom_post_types')) {
    function wpx_custom_post_types()
    {

        $labels = array(
        'name' => _x('Documentation', 'Post Type General Name', 'wpx-elements'),
        'singular_name' => _x('Documentation', 'Post Type Singular Name', 'wpx-elements'),
        'menu_name' => esc_html__('Documentation', 'wpx-elements'),
        'name_admin_bar' => esc_html__('Documentation', 'wpx-elements'),
        'archives' => esc_html__('Item Archives', 'wpx-elements'),
        'parent_item_colon' => esc_html__('Parent Item:', 'wpx-elements'),
        'all_items' => esc_html__('All Items', 'wpx-elements'),
        'add_new_item' => esc_html__('Add New Item', 'wpx-elements'),
        'add_new' => esc_html__('Add New', 'wpx-elements'),
        'new_item' => esc_html__('New Item', 'wpx-elements'),
        'edit_item' => esc_html__('Edit Item', 'wpx-elements'),
        'update_item' => esc_html__('Update Item', 'wpx-elements'),
        'view_item' => esc_html__('View Item', 'wpx-elements'),
        'search_items' => esc_html__('Search Item', 'wpx-elements'),
        'not_found' => esc_html__('Not found', 'wpx-elements'),
        'not_found_in_trash' => esc_html__('Not found in Trash', 'wpx-elements'),
        'featured_image' => esc_html__('Featured Image', 'wpx-elements'),
        'set_featured_image' => esc_html__('Set featured image', 'wpx-elements'),
        'remove_featured_image' => esc_html__('Remove featured image', 'wpx-elements'),
        'use_featured_image' => esc_html__('Use as featured image', 'wpx-elements'),
        'insert_into_item' => esc_html__('Insert into item', 'wpx-elements'),
        'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'wpx-elements'),
        'items_list' => esc_html__('Items list', 'wpx-elements'),
        'items_list_navigation' => esc_html__('Items list navigation', 'wpx-elements'),
        'filter_items_list' => esc_html__('Filter items list', 'wpx-elements'),
    );

        $args = array(
            'label' => esc_html__('Documentation', 'wpx-elements'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-index-card',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );
        register_post_type('documentation', $args);


        $labels = array(
            'name'              => _x( 'Documentation Categories', 'team categories',            'wpx-elements' ),
            'singular_name'     => _x( 'Documentation Categories', 'team category',                'wpx-elements' ),
            'search_items'      => esc_html__('Search Documentation Categories' ,                'wpx-elements'),
            'all_items'         => esc_html__('All Documentation Categories' ,                   'wpx-elements'),
            'parent_item'       => esc_html__('Parent Documentation Category' ,                  'wpx-elements'),
            'parent_item_colon' => esc_html__('Parent Documentation Category:' ,                 'wpx-elements'),
            'edit_item'         => esc_html__('Edit Documentation Category' ,                    'wpx-elements'),
            'update_item'       => esc_html__('Update Documentation Category' ,                  'wpx-elements'),
            'add_new_item'      => esc_html__('Add New Documentation Category' ,                 'wpx-elements'),
            'new_item_name'     => esc_html__('New Documentation Category Name' ,                'wpx-elements'),
            'menu_name'         => esc_html__('Categories' ,                                    'wpx-elements'),
        );
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_in_nav_menus' => true,
            'show_ui'           => null,
            'show_admin_column' => true,
            'query_var'         => true, 
            

        );
        register_taxonomy( "documentation-category", array( "documentation" ), $args );  
     
    }

    add_action('init', 'wpx_custom_post_types', 0);

}