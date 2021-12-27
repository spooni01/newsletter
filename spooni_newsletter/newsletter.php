<?php
/**
 * Plugin Name: Newsletter
 * Plugin URI: https://github.com/spooni01/newsletter
 * Description: Newsletter for Wordpress site.
 * Version: 1.0
 * Author: Adam Ližičiar
 * Author URI: http://www.adam.liziciar.sk
 */

// Functions
include(plugin_dir_path( __FILE__ )."functions.php");

// Admin menu
include(plugin_dir_path( __FILE__ )."admin_menu.php");

// User-related functions and templates
include(plugin_dir_path( __FILE__ )."user_profile.php");

// Custom post types and custom taxonomies
include(plugin_dir_path( __FILE__ )."custom_types/custom_post_emails.php");
include(plugin_dir_path( __FILE__ )."custom_types/custom_post_automated_emails.php");
include(plugin_dir_path( __FILE__ )."custom_types/custom_taxonomy_groups.php");
include(plugin_dir_path( __FILE__ )."custom_types/custom_taxonomy_domain_emails.php");

// Send e-mails
include(plugin_dir_path( __FILE__ )."send.php");

?>