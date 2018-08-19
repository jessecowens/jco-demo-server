<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://jessecowens.com
 * @since      1.0.0
 *
 * @package    Jco_Demo_Server
 * @subpackage Jco_Demo_Server/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Jco_Demo_Server
 * @subpackage Jco_Demo_Server/public
 * @author     Jesse C Owens <jesse@jessecowens.com>
 */
class Jco_Demo_Server_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Jco_Demo_Server_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Jco_Demo_Server_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/jco-demo-server-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Jco_Demo_Server_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Jco_Demo_Server_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/jco-demo-server-public.js', array( 'jquery' ), $this->version, false );
		if ( is_user_logged_in() ) {
			wp_enqueue_script( $this->plugin_name . 'getEmPixels.js', plugin_dir_url( __FILE__ ) . 'js/getEmPixels.js', array('jquery'), $this->version, false);
			wp_enqueue_script( $this->plugin_name . 'term.js', plugin_dir_url( __FILE__ ) . 'js/term.js', array(), $this->version, false);
			wp_enqueue_script( $this->plugin_name . 'tryit.js', plugin_dir_url( __FILE__ ) . 'js/tryit.js', array(), $this->version, false);
		}
	}

}
