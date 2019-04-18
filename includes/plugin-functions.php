<?php
/**
 * Custom plugin functions
 *
 * @since      1.0
 * @package    BuddyPress Custom Menu
 * @author     Nahid Ferdous Mohit
 */

/*
 * Set the depth of the hierarchical
 * bp_custom_menu_page post type to 1
 */

function set_bp_custom_menu_depth( $a ) {
  $a['depth'] = 1;
  return $a;
}
add_action( 'page_attributes_dropdown_pages_args','set_bp_custom_menu_depth' );
add_filter( 'quick_edit_dropdown_pages_args', 'set_bp_custom_menu_depth' );
