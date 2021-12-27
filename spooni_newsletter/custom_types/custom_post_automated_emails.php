<?php

function custom_post_automated_emails() {
    register_post_type("automated_emails",
        array(
            "labels"      => array(
                "name"          => __("Automated e-mails", "textdomain"),
                "singular_name" => __("Automated e-mail", "textdomain"),
                "add_new"            => _x("Add new", "book"),
                "add_new_item"       => __("Add new e-mail"),
                "edit_item"          => __("Edit e-mail"),
                "new_item"           => __("New e-mail"),
                "all_items"          => __("Automated e-mails"),
                "view_item"          => __("Show e-mail"),
                "search_items"       => __("Search e-mail"),
                "not_found"          => __("Nothing found"),
                "not_found_in_trash" => __("Nothing found in a trash"),
                "menu_name"          => "E-mails",
            ),
            "description"   => "All e-mails.",
            "public"        => true,
            "show_in_menu" => "spooni_newsletter",
            "supports"      =>  array( "title","editor"),
            "has_archive"   => true,
        )
    );
}
add_action("init", "custom_post_automated_emails");

?>