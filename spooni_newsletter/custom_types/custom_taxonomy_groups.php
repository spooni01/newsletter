<?php
add_action("init", "create_groups_taxonomies");

function create_groups_taxonomies() {
    $labels = array(
        "name"              => _x("Groups", "taxonomy general name" ),
        "singular_name"     => _x("Group", "taxonomy singular name" ),
        "search_items"      => __("Search group"),
        "all_items"         => __("All groups"),
        "parent_item"       => __("Parent group"),
        "parent_item_colon" => __("Parent groups:"),
        "edit_item"         => __("Edit group"),
        "update_item"       => __("Update group"),
        "add_new_item"      => __("Add new group"),
        "new_item_name"     => __("New group name"),
        "menu_name"         => __("Group"),
    );

    $args = array(
        "hierarchical"      => true,
        "labels"            => $labels,
        "show_ui"           => true,
        "show_admin_column" => true,
        "query_var"         => true,
        "show_in_nav_menus" => true,
    );

    register_taxonomy( "groups", array("emails", "automated_emails"), $args );  
}
?>