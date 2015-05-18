# McWebby Debug Log

WordPress plugin to support error logging. 

- enables PHP logging
- configures the log file location
- includes a function mcw_log for printing debug information to the log

# Usage

In order to set the debug log and enable logging, this plugin must be
run as a "must-use" plugin. To do this, place the php file in a folder
called "mu-plugins" in the wp-content directory, at the same level as 
the plugins folder. 

# Configuration

Currently you must edit the plugin file to set the error log file location. 
We plan a revision that will enable configuration of the log file via WordPress 
administrative interface and/or wp-config.php. 
 
# Credits and More Information

inspiration from: 
https://gist.github.com/webaware/4969753
relevant discussion: 
http://wordpress.stackexchange.com/questions/84132/is-it-possible-to-change-the-log-file-location-for-wp-debug-log
