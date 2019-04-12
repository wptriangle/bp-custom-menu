<?php
/**
 * Plugin Name: BuddyPress Custom Menu
 * Plugin URI: https://nfmohit.pro/projects/buddypress-custom-menu
 * Description: Create custom BuddyPress profile menu pages, gracefully.
 * Author: Nahid Ferdous Mohit
 * Version: 1.0
 * Author URI: https://nfmohit.pro
 * Text Domain: buddypress-custom-menu
 *
 * @package BuddyPress Custom Menu
 * @version 1.0
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

function bp_nav_adder() {
	global $bp;
	global $post;

	$bp_custom_menu_pages = get_posts(
		array(
			'post_type' => 'bp_custom_menu_page',
			'post_parent' => 0,
		)
	);

	foreach ( $bp_custom_menu_pages as $bp_custom_menu_page ) {
		setup_postdata( $post );

		bp_core_new_nav_item(
			array(
				'name' => $bp_custom_menu_page->post_title,
				'slug' => $bp_custom_menu_page->post_name,
				'screen_function' => 'bp_custom_menu_page_screen_function',
				'default_subnav_slug' => $bp_custom_menu_page->post_name,
			)
		);

		$bp_custom_sub_menu_pages = get_posts(
			array(
				'post_type' => 'bp_custom_menu_page',
				'post_parent' => $bp_custom_menu_page->ID,
			)
		);

		foreach( $bp_custom_sub_menu_pages as $bp_custom_sub_menu_page ) {
			setup_postdata( $post );

			bp_core_new_subnav_item(
				array(
					'name' => $bp_custom_sub_menu_page->post_title,
					'slug' => $bp_custom_sub_menu_page->post_name,
					'parent_slug' => $bp_custom_menu_page->post_name,
					'parent_url' => $bp->loggedin_user->domain . $bp_custom_menu_page->post_name . '/',
					'screen_function' => 'bp_custom_sub_menu_screen_function',
				)
			);
		}
		wp_reset_postdata();

	}
	wp_reset_postdata();

}
add_action( 'bp_setup_nav', 'bp_nav_adder', 302 );

function bp_custom_menu_page_screen_function() {
	add_action( 'bp_template_content', 'bp_custom_menu_page_screen_function_content' );
	bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}

function bp_custom_menu_page_screen_function_content() {

	$bp_current_nav_item_slug = bp_current_component();

	$bp_current_nav_item = get_page_by_path( $bp_current_nav_item_slug, OBJECT, 'bp_custom_menu_page' );

	$bp_current_nav_item_id = $bp_current_nav_item->ID;

	$bp_current_nav_item_post = get_post( $bp_current_nav_item_id );

	echo $bp_current_nav_item_post->post_content;
}

function bp_custom_sub_menu_screen_function() {
	add_action( 'bp_template_content', 'bp_custom_sub_menu_screen_function_content' );
	bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}

function bp_custom_sub_menu_screen_function_content() {

	$bp_current_nav_item_slug = bp_current_component();

	$bp_current_nav_item = get_page_by_path( $bp_current_nav_item_slug . '/' . bp_current_action(), OBJECT, 'bp_custom_menu_page' );

	$bp_current_nav_item_id = $bp_current_nav_item->ID;

	$bp_current_nav_item_post = get_post( $bp_current_nav_item_id );

	echo $bp_current_nav_item_post->post_content;
}
