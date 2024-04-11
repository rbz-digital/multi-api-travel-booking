<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.rbz.digital
 * @since             1.0.0
 * @package           Mt_Api_Travel_Booking
 *
 * @wordpress-plugin
 * Plugin Name:       Multi-API Travel Booking
 * Plugin URI:        https://www.rbz.digital/wordpress/multi-api-travel-booking
 * Description:       Multi-API Travel Booking is a versatile WordPress plugin designed to simplify travel arrangements. It consolidates multiple travel-related APIs, allowing users to search, compare, and book flights.
 * Version:           1.0.0
 * Author:            RBZ Digital
 * Author URI:        https://www.rbz.digital/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mt-api-travel-booking
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MT_API_TRAVEL_BOOKING_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mt-api-travel-booking-activator.php
 */
function activate_mt_api_travel_booking() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mt-api-travel-booking-activator.php';
	Mt_Api_Travel_Booking_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mt-api-travel-booking-deactivator.php
 */
function deactivate_mt_api_travel_booking() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mt-api-travel-booking-deactivator.php';
	Mt_Api_Travel_Booking_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mt_api_travel_booking' );
register_deactivation_hook( __FILE__, 'deactivate_mt_api_travel_booking' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mt-api-travel-booking.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mt_api_travel_booking() {

	$plugin = new Mt_Api_Travel_Booking();
	$plugin->run();

}
run_mt_api_travel_booking();
