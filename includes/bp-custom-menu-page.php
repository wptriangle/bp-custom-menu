<?php
/**
 * BuddyPress custom menu page post type
 *
 * @since      1.0
 * @package    Custom Profile Menu for BuddyPress
 * @author     Nahid Ferdous Mohit
 */

/*
 * If this file is called directly, abort.
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Register the bp custom menu page post type
 */
function create_bp_custom_menu_page_post_type() {
    register_post_type( 'bp_custom_menu_page',
      array(
        'labels' => array(
          'name' => __( 'Custom Profile Menu for BuddyPress Pages', 'bp-custom-menu' ),
          'menu_name' => __( 'BP Custom Menu', 'bp-custom-menu' ),
          'singular_name' => __( 'Custom Profile Menu for BuddyPress Page', 'bp-custom-menu' ),
          'add_new' => __( 'Add New', 'bp-custom-menu' ),
          'add_new_item' => __( 'Add New Menu Page', 'bp-custom-menu' ),
          'edit_item' => __( 'Edit Custom Profile Menu for BuddyPress Page', 'bp-custom-menu' ),
          'new_item' => __( 'New Menu Page', 'bp-custom-menu' ),
          'view_item' => __( 'View Menu Page', 'bp-custom-menu' ),
          'search_items' => __( 'Search Menu Pages', 'bp-custom-menu' ),
          'not_found' => __( 'No Menu Pages found', 'bp-custom-menu' ),
          'not_found_in_trash' => __( 'No Menu Pages found in trash', 'bp-custom-menu' ),
          'parent_item_colon' => __( 'Parent Menu Page:', 'bp-custom-menu' ),
          'all_items' => __( 'All Menu Pages', 'bp-custom-menu' ),
          'attributes' => __( 'Menu Page Options', 'bp-custom-menu' ),
        ),
        'public' => false,
        'has_archive' => false,
        'show_ui' => true,
        'show_in_admin_bar' => false,
        'menu_icon' => 'dashicons-list-view',
        'hierarchical' => true,
        'show_in_rest' => false,
        'supports' => array( 'title', 'editor', 'page-attributes', ),
        'publicly_queryable' => true,
      )
    );
}
add_action( 'init', 'create_bp_custom_menu_page_post_type' );
