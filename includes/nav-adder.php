<?php
/**
 * BuddyPress navigation menu items adder
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

/*
 * Run the navigation menu adder logic
 */

function bp_nav_adder() {
	global $bp;
	global $post;

	$bp_custom_menu_pages = get_posts(
		array(
			'post_type' => 'bp_custom_menu_page',
			'post_parent' => 0,
		)
	);

	if ( ! empty ( $bp_custom_menu_pages ) ) {
		foreach ( $bp_custom_menu_pages as $bp_custom_menu_page ) {
			setup_postdata( $post );

			$default_submenu = get_post_meta( $bp_custom_menu_page->ID, 'default_submenu', true );
			if ( ! empty ( $default_submenu ) || $default_submenu != '' ) {
				$default_subnav_slug = get_post_meta( $bp_custom_menu_page->ID, 'default_submenu', true );
			} else {
				$default_subnav_slug = $bp_custom_menu_page->post_name;
			}

			$menu_order = $bp_custom_menu_page->menu_order;
			if ( ! empty ( $menu_order ) || $menu_order != 0 ) {
				$menu_page_order = $menu_order;
			} else {
				$menu_page_order = 99;
			}

			bp_core_new_nav_item(
				array(
					'name' => $bp_custom_menu_page->post_title,
					'slug' => $bp_custom_menu_page->post_name,
					'screen_function' => 'bp_custom_menu_page_screen_function',
					'default_subnav_slug' => $default_subnav_slug,
					'position' => $menu_page_order,
				)
			);

			$bp_custom_sub_menu_pages = get_posts(
				array(
					'post_type' => 'bp_custom_menu_page',
					'post_parent' => $bp_custom_menu_page->ID,
				)
			);

			if ( ! empty ( $bp_custom_sub_menu_pages ) ) {
				foreach( $bp_custom_sub_menu_pages as $bp_custom_sub_menu_page ) {
					setup_postdata( $post );

					$sub_menu_order = $bp_custom_sub_menu_page->menu_order;
					if ( ! empty ( $sub_menu_order ) || $sub_menu_order != 0 ) {
						$sub_menu_page_order = $sub_menu_order;
					} else {
						$sub_menu_page_order = 99;
					}

					bp_core_new_subnav_item(
						array(
							'name' => $bp_custom_sub_menu_page->post_title,
							'slug' => $bp_custom_sub_menu_page->post_name,
							'parent_slug' => $bp_custom_menu_page->post_name,
							'parent_url' => $bp->displayed_user->domain . $bp_custom_menu_page->post_name . '/',
							'screen_function' => 'bp_custom_sub_menu_screen_function',
							'position' => $sub_menu_page_order,
						)
					);
				}
				wp_reset_postdata();
			}

		}
		wp_reset_postdata();
	}

}
add_action( 'bp_setup_nav', 'bp_nav_adder', 302 );
