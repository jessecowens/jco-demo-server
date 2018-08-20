<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://jessecowens.com
 * @since      1.0.0
 *
 * @package    Jco_Demo_Server
 * @subpackage Jco_Demo_Server/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Jco_Demo_Server
 * @subpackage Jco_Demo_Server/admin
 * @author     Jesse C Owens <jesse@jessecowens.com>
 */
class Jco_Demo_Server_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/jco-demo-server-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/jco-demo-server-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function handle_jco_demo_server_shortcode() {
		$demo_html = '
		<div class="panel panel-success" id="tryit_status_panel" style="display:none">
                <div class="panel-heading">Server status</div>
                <div class="panel-body" id="tryit_online_message" style="display:none">
                    You are connected over: <span id="tryit_protocol"></span> (<span id="tryit_address"></span>)<br/>
                    The demo server is currently running <span id="tryit_count"></span> user sessions out of <span id="tryit_max"></span>
                </div>

                <div class="panel-body" id="tryit_maintenance_message" style="display:none">
                    The demo service is currently down for maintenance and should be
                    back online in a few minutes.
                </div>

                <div class="panel-body" id="tryit_unreachable_message" style="display:none">
                    Your browser couldn\'t reach the demo server.<br />
                    This is either (most likely) because of a firewall or proxy
                    issue on your side or because of a network, power or other catastrophic
                    server side failure.
                </div>
            </div>

            <div class="panel panel-primary" id="tryit_terms_panel" style="display:none">
                <div class="panel-heading">Terms of service</div>
                <div class="panel-body" id="tryit_terms"></div>
            </div>

            <div class="panel panel-warning" id="tryit_start_panel" style="display:none">
                <div class="panel-heading">Start</div>
                <div class="panel-body">
                    <button class="btn btn-default btn-lg" id="tryit_accept" type="button">
                        <span aria-hidden="true" class="glyphicon glyphicon-ok"></span>
                        I have read and accept the terms of service above
                    </button>

                    <div id="tryit_progress" style="display:none;width:100%;text-align:center;">
                        <p>
                            <big>Starting the container...</big>
                        </p>
                        <p>
                            <div class="large spinner"></div>
                        </p>
                    </div>
                </div>
            </div>

            <div class="panel panel-success" id="tryit_info_panel" style="display:none">
                <div class="panel-heading">Container information</div>
                <table class="table" style="padding-left: 15px;">
                    <tr id="tryit_clock">
                        <th>Remaining time</th>
                        <td><span class="minutes"></span> minutes, <span class="seconds"></span> seconds</td>
                    </tr>
                </table>
            </div>

            <div class="panel panel-primary" id="tryit_console_panel" style="display:none">
                <div class="panel-heading">Terminal</div>
                <div id="tryit_console" style="background-color:black;"></div>

                <button class="btn btn-default btn-lg" id="tryit_console_reconnect" type="button" style="display:none">
                    <span aria-hidden="true" class="glyphicon glyphicon-repeat"></span>
                    Reconnect
                </button>
            </div>

            <div class="panel panel-danger" id="tryit_error_panel" style="display:none">
                <div class="panel-heading" id="tryit_error_panel_create" style="display:none">Unable to create a new container</div>
                <div class="panel-heading" id="tryit_error_panel_access" style="display:none">Unable to access the container</div>

                <div class="panel-body" id="tryit_error_full" style="display:none">
                    The server is currently full, please try again in a few minutes.

                    <br /><br />

                    <button class="btn btn-default btn-lg tryit_goback" type="button">
                        <span aria-hidden="true" class="glyphicon glyphicon-home"></span>
                        Start over
                    </button>
                </div>

                <div class="panel-body" id="tryit_error_quota" style="display:none">
                    You have reached the maximum number of concurrent sessions,
                    please wait for some to expire before starting more of them.

                    <br /><br />

                    <button class="btn btn-default btn-lg tryit_goback" type="button">
                        <span aria-hidden="true" class="glyphicon glyphicon-home"></span>
                        Start over
                    </button>
                </div>

                <div class="panel-body" id="tryit_error_banned" style="display:none">
                    You have been banned from this service due to a failure to
                    respect the terms of service.
                </div>

                <div class="panel-body" id="tryit_error_unknown" style="display:none">
                    An unknown error occured. Please try again in a few minutes.

                    <br /><br />

                    <button class="btn btn-default btn-lg tryit_goback" type="button">
                        <span aria-hidden="true" class="glyphicon glyphicon-home"></span>
                        Start over
                    </button>
                </div>

                <div class="panel-body" id="tryit_error_missing" style="display:none">
                    The container you\'re trying to connect to doesn\'t exist anymore.

                    <br /><br />

                    <button class="btn btn-default btn-lg tryit_goback" type="button">
                        <span aria-hidden="true" class="glyphicon glyphicon-home"></span>
                        Start over
                    </button>
                </div>
            </div>
		';
		return $demo_html;
	}

}
