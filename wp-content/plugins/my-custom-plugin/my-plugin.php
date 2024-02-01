<?php
/*
 * Plugin Name:       My First Plugin
 * Plugin URI:        https://github.com/InOutLuz/wordpress-theme-and-plugin-development
 * Description:       My first plugin for the course WordPress for developers in Softuni
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      8.0
 * Author:            Dimitar G
 * Author URI:        https://github.com/InOutLuz/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       softuni
 * Domain Path:       /languages
 */


require 'includes/cpt-games.php';

require 'includes/custom-plugin-options.php';

require 'includes/functions.php';

/**
 * enqueue  styles for frontend
 */
function mp_enqueue_styles() {

	wp_enqueue_style( 'mp-main-styles', plugins_url( '/assets/css/main.css', __FILE__ ) );
}

// Hook the function to the wp_enqueue_scripts action
add_action( 'wp_enqueue_scripts', 'mp_enqueue_styles' );

/**
 * Enqueue styles for custom metaboxes.
 */
function mp_enqueue_admin_styles() {
	wp_enqueue_style( 'mp-admin-styles', plugins_url( '/assets/css/admin-styles.css', __FILE__ ) );
}

add_action( 'admin_enqueue_scripts', 'mp_enqueue_admin_styles' );
