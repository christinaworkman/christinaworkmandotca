<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/Brennii96/
 * @since      1.2.0
 *
 * @package    Typed_Js
 * @subpackage Typed_Js/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.2.0
 * @package    Typed_Js
 * @subpackage Typed_Js/includes
 * @author     Brendan O'Neill <mrlegend1235@hotmail.co.uk>
 */
class Typed_Js_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.2.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'typed-js',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
