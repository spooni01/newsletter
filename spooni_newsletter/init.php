<?php
    add_action( "admin_menu", "plugin_menu");

    function plugin_menu() {
        add_menu_page("Newsletter", "Newsletter", "manage_options", "spooni_newsletter", "main_page");
        add_submenu_page( "spooni_newsletter", "Templates", "Templates", "manage_options", "spooni_newsletter_templates", "templates_page");
    }
?>