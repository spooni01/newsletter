<?php

/**
 * PLUGIN PAGES
 */    

function main_page() {
	if (can_manage_options()) 
		include(plugin_dir_path( __FILE__ )."pages/newsletter.php");
}

function templates_page() {
    if (can_manage_options()) 
		include(plugin_dir_path( __FILE__ )."pages/templates.php");
}

?>