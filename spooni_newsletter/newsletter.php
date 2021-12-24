<?php
/**
 * Plugin Name: Newsletter
 * Plugin URI: https://github.com/spooni01/newsletter
 * Description: Newsletter for Wordpress site.
 * Version: 1.0
 * Author: Adam Ližičiar
 * Author URI: http://www.adam.liziciar.sk
 */

// Functions for plugin
include(plugin_dir_path( __FILE__ )."functions.php");
// Inicialization
include(plugin_dir_path( __FILE__ )."init.php");
// Plugin templates
include(plugin_dir_path( __FILE__ )."templates.php");

?>