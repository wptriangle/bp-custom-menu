<?php
/**
 * BuddyPress custom menu page post type
 *
 * @since      1.0
 * @package    BuddyPress Custom Menu
 * @author     Nahid Ferdous Mohit
 */

/**
 * Register the bp custom menu page post type
 */
function create_bp_custom_menu_page_post_type() {
    register_post_type( 'bp_custom_menu_page',
      array(
        'labels' => array(
          'name' => __( 'BuddyPress Custom Menu Pages', 'buddypress-custom-menu' ),
          'menu_name' => __( 'BP Custom Menu', 'buddypress-custom-menu' ),
          'singular_name' => __( 'BuddyPress Custom Menu Page', 'buddypress-custom-menu' ),
          'add_new' => __( 'Add New', 'buddypress-custom-menu' ),
          'add_new_item' => __( 'Add New Menu Page', 'buddypress-custom-menu' ),
          'edit_item' => __( 'Edit BuddyPress Custom Menu Page', 'buddypress-custom-menu' ),
          'new_item' => __( 'New Menu Page', 'buddypress-custom-menu' ),
          'view_item' => __( 'View Menu Page', 'buddypress-custom-menu' ),
          'search_items' => __( 'Search Menu Pages', 'buddypress-custom-menu' ),
          'not_found' => __( 'No Menu Pages found', 'buddypress-custom-menu' ),
          'not_found_in_trash' => __( 'No Menu Pages found in trash', 'buddypress-custom-menu' ),
          'parent_item_colon' => __( 'Parent Menu Page:', 'buddypress-custom-menu' ),
          'all_items' => __( 'All Menu Pages', 'buddypress-custom-menu' ),
          'attributes' => __( 'Menu Page Attributes', 'buddypress-custom-menu' ),
        ),
        'public' => false,
        'has_archive' => false,
        'show_ui' => true,
        'show_in_admin_bar' => false,
        'menu_icon' => 'dashicons-list-view',
        'hierarchical' => true,
        'show_in_rest' => false,
        'supports' => array( 'title', 'editor', 'page-attributes', ),
      )
    );
}
add_action( 'init', 'create_bp_custom_menu_page_post_type' );
