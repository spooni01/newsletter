<?php

/** WORKING WITH SUBSCRIPTION **/
// Working with short subeng

add_action("init", "load_subscription_engine_template");

function load_subscription_engine_template() {
    if (isset($_GET["src"]) && isset($_GET["action"]) && isset($_GET["group"]) && isset($_GET["hash"]) && isset($_GET["usid"]) && $_GET["src"] == "spooni_newsletter") {
        $action = $_GET["action"];
        $hash = $_GET["hash"];
        $user_id = $_GET["usid"];
        $group = $_GET["group"];

        if($action == "unsubscribe" && authenticate_user($hash, $user_id)) {
            update_user_meta($user_id, $group, "");
            include(plugin_dir_path( __FILE__ )."templates/template_page_unsubscribe.php");
            die();
        }
            
    }
}



?>