<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://jessecowens.com
 * @since      1.0.0
 *
 * @package    Jco_Demo_Server
 * @subpackage Jco_Demo_Server/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="panel panel-success" id="tryit_status_panel" style="display:none">
            <div class="panel-heading">Server status</div>
            <div class="panel-body" id="tryit_online_message" style="display:none;color: black;">
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

        <div class="panel panel-warning" id="tryit_start_panel" style="display:none">
            <div class="panel-heading">Start</div>
            <div class="panel-body">
                <button class="btn btn-default btn-lg" id="tryit_accept" type="button">
                    Start the Container
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
                Reconnect
            </button>
        </div>

        <div class="panel panel-danger" id="tryit_error_panel" style="display:none">
            <div class="panel-heading" id="tryit_error_panel_create" style="display:none">Unable to create a new container</div>
            <div class="panel-heading" id="tryit_error_panel_access" style="display:none">Unable to access the container</div>

            <div class="panel-body" id="tryit_error_full" style="display:none">
                The server is currently full, please try again in a few minutes.
                <button class="btn btn-default btn-lg tryit_goback" type="button">
                    Start over
                </button>
            </div>

            <div class="panel-body" id="tryit_error_quota" style="display:none">
                You have reached the maximum number of concurrent sessions,
                please wait for some to expire before starting more of them.

                <br /><br />

                <button class="btn btn-default btn-lg tryit_goback" type="button">
                    Start over
                </button>
            </div>

            <div class="panel-body" id="tryit_error_banned" style="display:none">
                You have been banned from this service due to a failure to
                respect the terms of service.
            </div>

            <div class="panel-body" id="tryit_error_unknown" style="display:none">
                An unknown error occured. Please try again in a few minutes.
                <button class="btn btn-default btn-lg tryit_goback" type="button">
                    <span aria-hidden="true" class="glyphicon glyphicon-home"></span>
                    Start over
                </button>
            </div>
            <div class="panel-body" id="tryit_error_missing" style="display:none">
                The container you\'re trying to connect to doesn\'t exist anymore.
                <button class="btn btn-default btn-lg tryit_goback" type="button">
                    Start over
                </button>
            </div>
        </div>
