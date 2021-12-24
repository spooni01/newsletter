<?php

/**
 * PLUGIN PAGES
 */    

function main_page() {
	if (can_manage_options()) 
		include(plugin_dir_path( __FILE__ )."templates/page_newsletter.php");
}

function templates_page() {
    if (can_manage_options()) 
		include(plugin_dir_path( __FILE__ )."templates/page_templates.php");
}

function templates_groups() {
    if (can_manage_options()) 
		include(plugin_dir_path( __FILE__ )."templates/page_groups.php");
}

function templates_features() {
    if (can_manage_options()) 
		include(plugin_dir_path( __FILE__ )."templates/page_features.php");
}

?>