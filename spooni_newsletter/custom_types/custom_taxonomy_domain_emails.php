<?php
add_action( "init", "create_domain_emails_taxonomies");

function create_domain_emails_taxonomies() {
    $labels = array(
        "name"              => _x("Domain emails", "taxonomy general name" ),
        "singular_name"     => _x("Domain email", "taxonomy singular name" ),
        "search_items"      => __("Search domain email"),
        "all_items"         => __("All domain emails"),
        "parent_item"       => __("Parent domain email"),
        "parent_item_colon" => __("Parent domain emails:"),
        "edit_item"         => __("Edit domain email"),
        "update_item"       => __("Update domain email"),
        "add_new_item"      => __("Add new domain email"),
        "new_item_name"     => __("New domain email name"),
        "menu_name"         => __("Domain email"),
    );

    $args = array(
        "hierarchical"      => true,
        "labels"            => $labels,
        "show_ui"           => true,
        "show_admin_column" => true,
        "query_var"         => true,
        "show_in_nav_menus" => true
    );

    //register_taxonomy( "spooni_newsletter_domain_emails", array("emails", "automated_emails"), $args);   
}
?>