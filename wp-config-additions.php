<?php
/**
 * Sample additions to wp-config.php that might be useful for debugging. 
 *
 * You can use these in conjunction with the mcw-debug-log MU plugin. 
 */

/**
 *	If you use a special TLD for your debug environment (e.g., ".DEV"),
 *	this code will determine whether you are in development or live environment
 */
$tld = substr( $_SERVER['HTTP_HOST'], -3);

/**
 *	Set debug mode for development environment
 */
switch ( $tld ) {
	case 'dev':
		define( 'WP_DEBUG', true );
		define( 'WP_DEBUG_DISPLAY', true );		// display errors to terminal
		define( 'WP_DEBUG_LOG', true );			// log errors to error_log file
		@ini_set( 'display_errors', 'On' );
		error_reporting( E_ALL | E_STRICT );
		break;
	default:
		define( 'WP_DEBUG', true );				// makes it possible to log errors
		define( 'WP_DEBUG_DISPLAY', false );	// DO NOT display errors to terminal
		define( 'WP_DEBUG_LOG', true );			// log errors to error_log file
		@ini_set( 'display_errors', 'Off' );
		error_reporting( E_ALL & ~E_STRICT );
}

/**
 *	Log errors to /sporks/mcw_debug.log (see MU plugin)
 */
$log_file = $_SERVER['DOCUMENT_ROOT'] . '/quokka/mcw_debug.log';
define( 'MCW_DEBUG_LOG_FILE', $log_file );
