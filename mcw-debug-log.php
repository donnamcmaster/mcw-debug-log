<?php
/**
 *	Plugin Name: McWebby Debug Log
 *	Description: Enable debug logging to a specific folder; provide logging function
 *	Author: Donna McMaster
 *	Author URI: http://www.donnamcmaster.com/
 *	Version: 0.1.0
 *	
 *	Credits: inspired by Private Debug Log by WebAware
 *	https://gist.github.com/webaware/4969753
 */

/**
 *	CONFIGURATION: uncomment the define() for either option A or option B
 *	You may also want to edit the file name in the ini_set() call. 
 */

/**
 *	Option A
 *	Places the log file in a directory under public_html that is hidden only by obscurity; 
 *	if you choose this route, select your directory name well and do not allow the 
 *	directory to be indexed. 
 */
//define( 'PRIVATE_LOG_DIR', $_SERVER['DOCUMENT_ROOT'] . '/private_logs' );

/**
 *	Option B
 *	Places the log file in a directory above public_html and inaccessible via HTTP. 
 */
//define( 'PRIVATE_LOG_DIR', dirname( ABSPATH )  . '/private' );

ini_set( 'log_errors', 1 );
if ( defined( 'PRIVATE_LOG_DIR' ) ) {
	ini_set( 'error_log', PRIVATE_LOG_DIR . 'debug.log' );
}

/**
 *	Debugging: mcw_log
 *	- can be called with single item (e.g., string or integer) 
 *	  or complex (array or object)
 *	- does nothing if WP_DEBUG is false/0/null
 *	- prints to log file if WP_DEBUG_LOG
 *	- prints to screen if WP_DEBUG_DISPLAY
 */
function mcw_log ( $s, $level='info' ) {
	if ( WP_DEBUG ) {
		if ( is_array( $s ) || is_object( $s ) ) {
			$s = print_r( $s, true );
			if ( WP_DEBUG_LOG ) {
				error_log( $s );
			}
			if ( WP_DEBUG_DISPLAY ) {
?>
	<div class="mcw-log"><?php echo strtoupper( $level ); ?></div>
	<div class="mcw-log"><?php echo $s; ?></div>

<?php
			}
		} else {
			$s = strtoupper( $level ) . ': ' . $s;
			if ( WP_DEBUG_LOG ) {
				error_log( $s );
			}
			if ( WP_DEBUG_DISPLAY ) {
?>
	<div class="mcw-log"><?php echo $s; ?></div>

<?php
			}
		}
	}
}
