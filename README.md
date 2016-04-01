# McWebby Debug Log

WordPress plugin to support error logging. 

- enables PHP logging
- configures the log file location
- includes a function mcw_log for printing debug information to the log

# Usage 
 
In order to set the debug log and enable logging, this plugin must be run as a "must-use" plugin. To do this, place the mcw-debug-log.php file in a folder called "mu-plugins" in the wp-content directory, at the same level as the plugins folder.

NOTE: We do note recommend putting any of the other files in the distribution into your mu-plugins folder. 

# Usage

In order to set the debug log and enable logging, this plugin must be
run as a "must-use" plugin. To do this, place the php file in a folder
called "mu-plugins" in the wp-content directory, at the same level as 
the plugins folder. 

# Configuration

Define MCW\_DEBUG\_LOG\_FILE in wp-config.php to specify where you want errors logged. The safest location is a folder outside your website root, inaccessible to web browsers. Or you may choose folder and/or file names that provide security through obscurity, for example $\_SERVER['DOCUMENT\_ROOT'].'/sporks/goofs.log'. In that case, put a blank index.php file in the folder or use .htaccess to prevent a directory listing. 

See the wp-config-additions.php file in this distro for an example of some debugging definitions you might use in your wp-config.php file. 

If MCW\_DEBUG\_LOG\_FILE is not initialized, errors will be logged to a file named mcw-debug.log in your wp-content directory. 
 
# Logging Function

Function mcw\_log() can be called with single item (e.g., string or integer), or with a complex item (array or object). 

It does nothing if WP\_DEBUG is false/0/null. If WP\_DEBUG is set: 
- it prints to log file if WP\_DEBUG\_LOG
- it prints to screen if WP\_DEBUG\_DISPLAY

# Credits and More Information 
 
Inspiration from:  
https://gist.github.com/webaware/4969753 

Relevant discussion:  
http://wordpress.stackexchange.com/questions/84132/is-it-possible-to-change-the-log-file-location-for-wp-debug-log 
