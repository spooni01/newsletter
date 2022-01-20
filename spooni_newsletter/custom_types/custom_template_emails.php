<?php

/** PUBLIC TEMPLATE FOR POST TYPE EMAILS **/

add_filter("single_template", "load_single_newsletter_template");

function load_single_newsletter_template($template) {
    global $post;

    if($post->post_type == "emails")
        if (file_exists(plugin_dir_path(__FILE__)."../templates/template_page_emails.php")) 
            return plugin_dir_path( __FILE__ )."../templates/template_page_emails.php";

    return $template;
}

?>