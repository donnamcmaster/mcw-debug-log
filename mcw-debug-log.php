<?php
/**
 *	Plugin Name: McWebby Debug Log
 *	Description: Enable debug logging to a specific folder; provide logging function
 *	Author: Donna McMaster
 *	Author URI: http://www.donnamcmaster.com/
 *	Version: 0.3.0
 *	
 *	See credits & license below the code.
 */

/**
 *	INSTRUCTIONS
 *	Define MCW_DEBUG_LOG_FILE in wp-config.php to specify where you want errors logged. 
 *	The safest location is a folder outside your website root, inaccessible to web browsers.
 *	Or you may choose folder and/or file names that provide security through obscurity, 
 *	for example $_SERVER['DOCUMENT_ROOT'].'/sporks/goofs.log'. 
 *	In that case, put a blank index.php file in the folder or use .htaccess to prevent a directory listing.
 */

/**
 *	Logging Function: mcw_log
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
				error_log( "[mcw_log] $level" );
				error_log( $s );
			}
			if ( WP_DEBUG_DISPLAY ) {
?>
	<div class="mcw-log">
		<p class="mcw-log-level">
			<?php echo strtoupper( $level ); ?>
		</p>
		<div class="mcw-log-content">
			<?php echo $s; ?>
		</div>
	</div><!-- .mcw-log -->

<?php
			}
		} else {
			if ( WP_DEBUG_LOG ) {
				error_log( "[mcw_log] $level: $s" );
			}
			if ( WP_DEBUG_DISPLAY ) {
				$s = strtoupper( $level ) . ': ' . $s;
?>
	<div class="mcw-log"><?php echo $s; ?></div>

<?php
			}
		}
	}
}

$issue_warning = false;
if ( !defined( 'MCW_DEBUG_LOG_FILE' ) ) {
	define( 'MCW_DEBUG_LOG_FILE', WP_CONTENT_DIR.'/mcw-debug.log' );
	$issue_warning = true;
}

ini_set( 'log_errors', 1 );
ini_set( 'error_log', MCW_DEBUG_LOG_FILE );

if ( $issue_warning ) {
	mcw_log( 'mu-plugins/mcw-debug-log: logfile not defined; using '.MCW_DEBUG_LOG_FILE, 'WARNING' );
}

/*
Adapted from "Private Debug Log" 

Author: WebAware
Author URI: http://www.webaware.com.au/
copyright (c) 2013 WebAware Pty Ltd (email : rmckay@webaware.com.au)

LICENSE

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/