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
 * @since      1.0
 * @package    BuddyPress Custom Menu
 * @author     Nahid Ferdous Mohit
 */

/*
 * If this file is called directly, abort.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
 * Call the plugin loader file
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/loader.php';
