<?php
/** PLUGIN PAGES LOAD **/  

function main_page() {
	if (can_manage_options()) 
		include(plugin_dir_path( __FILE__ )."templates/page_newsletter.php");
}

function templates_features() {
    if (can_manage_options()) 
		include(plugin_dir_path( __FILE__ )."templates/page_features.php");
}

function templates_statistics() {
    if (can_manage_options()) 
		include(plugin_dir_path( __FILE__ )."templates/page_statistics.php");
}


/** TAXONOMIES FUNCTIONS **/

// Function will return array of all slugs from specific taxonomy
// ($taxomomy_slug) that are checked in post ($post_id)
function get_slugs_of_groups_by_post_id($post_id, $taxonomy_slug) {
    $terms = wp_get_object_terms($post_id, $taxonomy_slug);
    $return_terms = array();
    
    if (!empty($terms)) {
        $count = 0;
        foreach($terms as $term){
            $return_terms[$count] = $term->slug;
            $count++;
        }  
    }

    return $return_terms;
}

// Take emails of all users, which have checked taxonomy in their profile.
// On return there will be array of emails.
function get_emails_by_meta_value_of_taxonomy($slugs_of_groups, $meta_value) {
    $return_emails = array();

    $count = 0;
    foreach ($slugs_of_groups as $group){
        $users = get_users(array(
            "meta_key" => $group,
            "meta_value" => $meta_value
        ));
            
        $slug_emails = wp_list_pluck($users, "user_email");
        $return_emails = array_merge($return_emails, $slug_emails);
        $count++;
    }

    return $return_emails;
}

// Return description of first taxonomy that is checked in post by post ID.
function get_first_checked_tax_description_of_post($tax, $post_id) {
    $terms = get_the_terms($post_id, $tax);
    foreach($terms as $term) 
        return $term->description;
}

// Return name of first taxonomy that is checked in post by post ID.
function get_first_checked_tax_name_of_post($tax, $post_id) {
    $terms = get_the_terms($post_id, $tax);
    foreach($terms as $term) 
        return $term->name;
}


/** HASH FUNCTIONS **/

// Get unique hash of user.
function get_user_hash($user_id, $return_text = NULL) {
    $hash = get_user_meta($user_id, 'spooni_newsletter_unique_hash', true);
    if($hash == "") {
        if($return_text == "")
            return NULL;
        else    
            return $return_text;
    }

    return $hash;
}

function generate_hash($length = 30, $special_chars = false) {
    $chars =  "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    if($special_chars)
        $chars .= "`-=~!@#$%^&*()_+,./<>?;:[]{}\|";
    
    $hash = "";
    $max = strlen($chars) - 1;
  
    for ($i=0; $i < $length; $i++)
        $hash .= $chars[random_int(0, $max)];
  
    return $hash;
}

// Check, if user $user_id has hash $hash.
function authenticate_user($hash, $user_id) {
    if($hash == get_user_hash($user_id))
        return true;
    
    return false;
}

// Save unique hash to user by ID. If you want to generate new hash
// for user, you must set $generate_new to true.
function save_hash($user_id, $generate_new = false) {
    if(get_user_hash($user_id) == NULL || $generate_new == true) 
        update_user_meta($user_id, "spooni_newsletter_unique_hash", generate_hash());
}


/** FUNCTIONS FOR STATISTICS **/

function get_num_of_all_emails_seen() {
    $num = 0;

    $all_emails = get_posts(array(
        "post_type" => "emails",
        "meta_key" => "spooni_newsletter_email_seen",
    ));
    foreach($all_emails as $email) 
        $num += get_post_meta($email->ID, "spooni_newsletter_email_seen", true);

    return $num;
}

function get_num_of_all_emails_send() {
    $num = 0;

    $all_emails = get_posts(array(
        "post_type" => "emails",
        "meta_key" => "spooni_newsletter_email_sends",
    ));
    foreach($all_emails as $email) 
        $num += get_post_meta($email->ID, "spooni_newsletter_email_sends", true);

    return $num;
}


/** FUNCTIONS FOR PARAMETERS **/

function parameter_exist($parameter) {
    if(isset($_GET[$parameter])) 
        return true;

    return false;
}

function parameter_equal($parameter, $value) {
    if(parameter_exist($parameter) && $_GET[$parameter] == $value) 
        return true;
    
    return false;
}

function necessary_parameters_exist($array) {
    foreach($array as $parameter) {
        if(!parameter_exist($parameter))
            return false;
    }
    return true;
}


/** OTHER FUNCTIONS **/

function can_manage_options() {
    if ( !current_user_can("manage_options") )  {
		wp_die( __("You do not have sufficient permissions to access this page."));
        return false;
	}
    
    return true;
}

function generate_password($length = 15, $special_chars = false) {
    generate_hash($length, $special_chars);
}

function change_variables_to_real_data($mail_body, $user) {
    $variables = array("{{first_name}}", "{{last_name}}", "{{name}}", "{{email}}");
    $user_data = array($user->first_name, $user->last_name, $user->first_name." ".$user->last_name, $user->user_email);

    $mail_body = str_replace($variables, $user_data,  $mail_body);

    return $mail_body;
}

function add_num_in_post_meta($post_id, $meta_key) {
    if(empty(get_post_meta($post_id, $meta_key, true))) 
        $num = 0;
    else 
        $num = get_post_meta($post_id, $meta_key, true);
    
    update_post_meta($post_id, $meta_key, $num);
}

function get_recent_emails($num = 10) {
    return get_posts(array("post_type"=>"emails","orderby" => "date","order" => "DESC","posts_per_page" => $num));
}

?>