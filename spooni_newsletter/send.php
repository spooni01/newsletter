<?php
add_action("publish_emails", "send_emails");

// Send email to user
function send($email, $post_title, $mail_body, $headers) {
    $user_id = get_user_by("email", $mail);
    $hash = get_user_hash($user_id);

    $mail_footer .= "<div><a href='www.google.sk/?hash=".$hash."&usid=".$user_id."'>Odhlásiť sa z newslettra</div>";

    wp_mail($email, $post_title, $mail_body, $headers);  
}

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
    $headers = array("Content-Type: text/html; charset=UTF-8");

    foreach($emails as $email) {
        $user = get_user_by("email", $email);
        $hash = get_user_hash($user->ID);
        $url = get_bloginfo('wpurl');
        $tmp_mail_body = change_variables_to_real_data($mail_body, $user);
        include(plugin_dir_path( __FILE__ )."/templates/email_footer.php");

        wp_mail($email, $post_title, $tmp_mail_body.$mail_footer, $headers);   
    }
}

?>