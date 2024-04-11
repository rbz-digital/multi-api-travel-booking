<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.rbz.digital
 * @since      1.0.0
 *
 * @package    Mt_Api_Travel_Booking
 * @subpackage Mt_Api_Travel_Booking/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Mt_Api_Travel_Booking
 * @subpackage Mt_Api_Travel_Booking/includes
 * @author     RBZ Digital <rafael@rbz.digital>
 */
class Mt_Api_Travel_Booking_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'mt-api-travel-booking',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
