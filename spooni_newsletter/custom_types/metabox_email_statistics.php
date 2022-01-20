<?php

add_action("add_meta_boxes", "metabox_email_statistics");

function metabox_email_statistics() {
    add_meta_box(
        "metabox_email_statistics",            
        "Email statistics",    
        "metabox_email_statistics_callback", 
        "emails"
    );
}

function metabox_email_statistics_callback($post) {
    $num_of_emails = get_post_meta($post->ID, "spooni_newsletter_email_sends", true);
    $total_num_of_seen = get_post_meta($post->ID, "spooni_newsletter_email_seen", true);
    $users_seen_email = get_users(array(
        "meta_key" => "spooni_newsletter_email_seen_".$post->ID,
        "orderby" => "meta_value",
        "order" => "DESC"
    ));
    $num_of_opened_emails = count($users_seen_email);

    include(plugin_dir_path( __FILE__ )."../templates/metabox_statistics.php");
}

?>