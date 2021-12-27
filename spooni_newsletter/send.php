<?php
add_action("publish_emails", "send_emails");

function send_emails($post_id) {    
    $slugs_of_groups = get_slugs_of_groups_by_post_id($post_id, "groups");

    $emails = get_emails_by_meta_value_of_taxonomy($slugs_of_groups, "subscribed");
    $post_title = get_the_title($post_id); 
    $mail_body = get_the_content($post_id);
    $headers = array("Content-Type: text/html; charset=UTF-8");

    wp_mail($emails, $post_title, $mail_body, $headers);  
}

?>