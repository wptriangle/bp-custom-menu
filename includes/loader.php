<?php
/**
 * Plugin loader file
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
 * Load the plugin only if BuddyPress
 * is active
 */
function bp_custom_menu_init() {

	if( class_exists( 'BuddyPress' ) ) {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/core.php';
	} else {
		add_action( 'admin_notices', 'bp_custom_menu_requires_bp' );
	}
}
add_action( 'plugins_loaded', 'bp_custom_menu_init' );

/*
 * Admin notice content if
 * BuddyPress is not active
 */
function bp_custom_menu_requires_bp() {
	$class = 'notice notice-error';
	$message = __( 'Custom Profile Menu for BuddyPress plugin requires BuddyPress to be active.', 'bp-custom-menu' );

	printf( '<div class="%1$s"><p style="' . esc_attr( 'display: inline-block;' ) . '">%2$s</p> <a href="' . esc_url( 'https://wordpress.org/plugins/buddypress/' ) . '" target="' . esc_attr( '_blank' ) . '">Install and Activate BuddyPress</a>.</div>', esc_attr( $class ), esc_html( $message ) );
}
