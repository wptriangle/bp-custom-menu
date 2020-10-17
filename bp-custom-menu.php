<?php
/**
 * Plugin Name: Custom Profile Menu for BuddyPress
 * Plugin URI: https://nahid.dev/project/bp-custom-menu
 * Description: Create custom BuddyPress profile menu pages, gracefully.
 * Author: Nahid Ferdous Mohit
 * Version: 1.0.3
 * Author URI: https://nahid.dev
 * Text Domain: bp-custom-menu
 *
 * @since      1.0.0
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
 * Call the plugin loader file
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/loader.php';
