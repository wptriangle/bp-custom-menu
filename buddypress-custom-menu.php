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

/*
 * If this file is called directly, abort.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
 * Call the core plugin file
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/core.php';
