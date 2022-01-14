<?php
add_action("admin_menu", "plugin_menu");

// Add buttons to admin menu
function plugin_menu() {
    add_menu_page("Newsletter", "Newsletter", "manage_options", "spooni_newsletter", "main_page", "dashicons-email-alt");
    add_submenu_page( "spooni_newsletter", "Groups", "Groups", "manage_options", "edit-tags.php?taxonomy=spooni_newsletter_groups");
    //add_submenu_page( "spooni_newsletter", "Domain e-mails", "Domain e-mails", "manage_options", "edit-tags.php?taxonomy=spooni_newsletter_domain_emails");
    add_submenu_page( "spooni_newsletter", "About", "About", "manage_options", "spooni_newsletter_features", "templates_features");
}

?>