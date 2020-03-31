<?php
/**
 * Custom plugin functions
 *
 * @since      1.0.1
 * @package    Custom Profile Menu for BuddyPress
 * @author     Nahid Ferdous Mohit
 */

/*
 * Set the depth of the hierarchical
 * bp_custom_menu_page post type to 1
 */

function set_bp_custom_menu_depth( $a ) {
	global $post;
	if( $post->post_type == 'bp_custom_menu_page' ) {
  		$a['depth'] = 1;
		return $a;
	}
	return $a;
}
add_filter( 'page_attributes_dropdown_pages_args','set_bp_custom_menu_depth' );
add_filter( 'quick_edit_dropdown_pages_args', 'set_bp_custom_menu_depth' );

/*
 * Change "View" link in the post listing
 * to current user's relative path menu page
 */

function change_bp_custom_menu_view_link( $permalink, $post ) {
    if( $post->post_type == 'bp_custom_menu_page' ) {

    	if ( $post->post_parent ) {

    		$post_data = get_post( $post->post_parent );
    		$parent_slug = $post_data->post_name;

        	$permalink = bp_core_get_user_domain( get_current_user_id() ) . $parent_slug . '/' . $post->post_name;

    	} else {
    		$permalink = bp_core_get_user_domain( get_current_user_id() ) . $post->post_name;
    	}
    }
    return $permalink;
}
add_filter( 'post_type_link', 'change_bp_custom_menu_view_link', 10, 2 );
