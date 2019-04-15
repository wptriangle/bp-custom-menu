<?php
/**
 * BuddyPress navigation menu items adder
 *
 * @since      1.0
 * @package    BuddyPress Custom Menu
 * @author     Nahid Ferdous Mohit
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

			bp_core_new_nav_item(
				array(
					'name' => $bp_custom_menu_page->post_title,
					'slug' => $bp_custom_menu_page->post_name,
					'screen_function' => 'bp_custom_menu_page_screen_function',
					'default_subnav_slug' => $default_subnav_slug,
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

		}
		wp_reset_postdata();
	}

}
add_action( 'bp_setup_nav', 'bp_nav_adder', 302 );
