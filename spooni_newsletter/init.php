<?php
add_action("admin_menu", "plugin_menu");
add_action("show_user_profile", "user_profile_fields");
add_action("edit_user_profile", "user_profile_fields");
add_action( 'personal_options_update', 'save_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_user_profile_fields' );

function plugin_menu() {
    add_menu_page("Newsletter", "Newsletter", "manage_options", "spooni_newsletter", "main_page");
    add_submenu_page( "spooni_newsletter", "Email templates", "Templates", "manage_options", "spooni_newsletter_templates", "templates_page");
    add_submenu_page( "spooni_newsletter", "Groups", "Groups", "manage_options", "spooni_newsletter_groups", "templates_groups");
    add_submenu_page( "spooni_newsletter", "Features", "Features", "manage_options", "spooni_newsletter_features", "templates_features");
}

function user_profile_fields($user) { 
    include(plugin_dir_path( __FILE__ )."templates/user_profile.php");
}

function save_user_profile_fields( $user_id ) {
    if(empty($_POST["_wpnonce"]) || !wp_verify_nonce($_POST["_wpnonce"], "update-user_".$user_id))
        return; 
    if (!current_user_can("edit_user", $user_id)) 
        return false; 
    
    update_user_meta($user_id, "subscriber", $_POST["subscriber"]);

    return true;
}

?>