<?php
/**
 * Core plugin file
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
 * Register the post type
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/bp-custom-menu-page.php';

/*
 * Add Menu Page Options Metabox Extensions
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/metaboxes/extend-menu-page-options.php';

/*
 * Add the menu items
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/nav-adder.php';
 
/*
 * Parent menu page handler
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/parent-menu-page.php';

/*
 * Sub menu page handler
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/sub-menu-page.php';

/*
 * Custom plugin functions
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/plugin-functions.php';
