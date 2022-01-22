<?php
add_action("publish_emails", "send_emails");

// Send emails to all users who subscribe one of Groups 
// taxonomy that is checked in custom post type 'email'
function send_emails($post_id) {
    // Get all slugs that are checked in custom post type 'email'   
    $slugs_of_groups = get_slugs_of_groups_by_post_id($post_id, "spooni_newsletter_groups");

    // Get emails of all users that subscribe one of taxonomy 'Groups'
    // that is checked in custom post type 'email'.
    // Then get variables for email.
    $emails = get_emails_by_meta_value_of_taxonomy($slugs_of_groups, "subscribed");
    $post_title = get_the_title($post_id); 
    $mail_body = get_the_content($post_id);
    $headers = "From: ".get_first_checked_tax_description_of_post("spooni_newsletter_domain_emails", $post->ID)." <".get_first_checked_tax_name_of_post("spooni_newsletter_domain_emails", $post->ID).">\r\n";
    $headers .= "Reply-To: ".get_first_checked_tax_description_of_post("spooni_newsletter_domain_emails", $post->ID)." <".get_first_checked_tax_name_of_post("spooni_newsletter_domain_emails", $post->ID).">\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8";

    $num_of_emails = 0;

    foreach($emails as $email) {
        $user = get_user_by("email", $email);
        $hash = get_user_hash($user->ID);
        $url = get_bloginfo('wpurl');
        $tmp_mail_body = change_variables_to_real_data($mail_body, $user);
        include(plugin_dir_path( __FILE__ )."/templates/email_footer.php");

        wp_mail($email, $post_title, $tmp_mail_body.$mail_footer, $headers);   
        $num_of_emails++;
    }

    // Set meta for statistics 
    add_num_in_post_meta($post_id, "spooni_newsletter_email_seen");
    update_post_meta($post_id, "spooni_newsletter_email_sends", $num_of_emails);    
}

?>