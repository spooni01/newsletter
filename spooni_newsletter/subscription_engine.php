<?php

/** WORKING WITH SUBSCRIPTION **/
// Working with short subeng

add_action("init", "load_subscription_engine_template");

function load_subscription_engine_template() {
    if (parameter_equal("src", "spooni_newsletter")) {
        // Unsubscribe
        if(parameter_equal("action", "unsubscribe") && necessary_parameters_exist(array("usid", "group", "hash")) && authenticate_user($_GET["hash"], $_GET["usid"])) {
            update_user_meta($_GET["usid"], $_GET["group"], "");
            include(plugin_dir_path( __FILE__ )."templates/template_page_unsubscribe.php");
            die();
        }   

        // Subscribe
        if(parameter_equal("action", "subscribe") && necessary_parameters_exist(array("group"))) {
            include(plugin_dir_path( __FILE__ )."templates/template_page_subscribe.php");
            die();
        }   

        // Try to subscribe user. If user already exist on a page, just log him into newsletter.
        // If user not exist, register him and then add him to newsletter.
        if(parameter_equal("action", "add_subscribe") && necessary_parameters_exist(array("group")) && isset($_POST['email'])) {
            if(email_exists($_POST["email"])) {
                $user = get_user_by("email", $_POST["email"]);
                update_user_meta($user->ID, $_GET["group"], "subscribed");
            }
            else {
                wp_create_user($_POST["email"], generate_password(), $_POST["email"]);
                $user = get_user_by("email", $_POST["email"]);
                update_user_meta($user->ID, $_GET["group"], "subscribed");
            }
            
            include(plugin_dir_path( __FILE__ )."templates/template_page_subscribe_done.php");
            die();
        }   

        
    }
}



?>