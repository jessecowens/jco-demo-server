<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://jessecowens.com
 * @since      1.0.0
 *
 * @package    Jco_Demo_Server
 * @subpackage Jco_Demo_Server/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Jco_Demo_Server
 * @subpackage Jco_Demo_Server/includes
 * @author     Jesse C Owens <jesse@jessecowens.com>
 */
class Jco_Demo_Server_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'jco-demo-server',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
