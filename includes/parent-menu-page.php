<?php
/**
 * Parent menu page handler
 *
 * @since      1.0.1
 * @package    Custom Profile Menu for BuddyPress
 * @author     Nahid Ferdous Mohit
 */

/*
 * If this file is called directly, abort.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * 'bp_setup_nav' callback function
 *
 */
function bp_custom_menu_page_screen_function() {
	add_action( 'bp_template_content', 'bp_custom_menu_page_screen_function_content' );
	bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}

/*
 * Parent menu page output template
 *
 */
function bp_custom_menu_page_screen_function_content() {

	$bp_current_nav_item_slug = bp_current_component();

	$bp_current_nav_item = get_page_by_path( $bp_current_nav_item_slug, OBJECT, 'bp_custom_menu_page' );

	$bp_current_nav_item_id = $bp_current_nav_item->ID;

	$bp_current_nav_item_post = get_post( $bp_current_nav_item_id );

	$default_submenu = get_post_meta( $bp_current_nav_item_post->ID, 'default_submenu', true );

	if ( empty ( $default_submenu ) || $default_submenu = '' ) {

		$content = $bp_current_nav_item_post->post_content;
		echo apply_filters( 'the_content', $content );

	}

}
