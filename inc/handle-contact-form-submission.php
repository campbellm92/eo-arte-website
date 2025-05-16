<?php

function handle_contact_form_submission()
{
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    $adminEmail = get_option('admin_email');

    wp_mail($adminEmail, sprintf("New message from %s email: %s", $name, $email), $message);

    error_log("Sending contact form email to: " . $adminEmail);

    wp_redirect(home_url('/contattateci/?success=true'));
    exit;
}
add_action('admin_post_nopriv_submit_contact_form', 'handle_contact_form_submission');
add_action('admin_post_submit_contact_form', 'handle_contact_form_submission');



