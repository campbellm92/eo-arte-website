<?php

if (!session_id()) {
    session_start();
}

require __DIR__ . "/../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

function handle_contact_form_submission()
{
    if (!isset($_POST['contact_form_nonce']) || !wp_verify_nonce($_POST['contact_form_nonce'], 'contact_form_submit')) {
        wp_die('Security check failed');
    }

    $errors = [];
    $inputs = [];
    $success = false;

    $name_result = validate_name($_POST['name'] ?? '');
    $email_result = validate_email($_POST['email'] ?? '');
    $message_result = validate_message($_POST['message'] ?? '');

    $inputs['name'] = $name_result['value'];
    $inputs['email'] = $email_result['value'];
    $inputs['message'] = $message_result['value'];


    if ($name_result['error'])
        $errors['name'] = $name_result['error'];

    if ($email_result['error'])
        $errors['email'] = $email_result['error'];

    if ($message_result['error'])
        $errors['message'] = $message_result['error'];

    if (empty($errors)) {
        $recipient_email = "m.campbell92@gmail.com";

        try {
            $mail = new PHPMailer(true);

            // comment out when finished testing
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->Username = $_ENV["USER"];
            $mail->Password = $_ENV["PASS"];

            $mail->setFrom($email_result['value'], $name_result['value']);
            $mail->addAddress($recipient_email, 'Matt');

            $mail->Subject = 'Hai un nuovo messagio.';
            $mail->Body = $message_result['value'];

            $mail->send();
            $success = true;
        } catch (Exception $e) {
            $errors['mail'] = 'Impossibile inviare il messaggio. Mailer error: ' . $mail->ErrorInfo;
        }


    }

    $_SESSION['form_errors'] = $errors;
    $_SESSION['form_inputs'] = $inputs;
    $_SESSION['form_success'] = $success;

    wp_redirect(wp_get_referer() ?: get_permalink(get_page_by_path('contact')));
    exit;
}
add_action('admin_post_submit_contact_form', 'handle_contact_form_submission');
add_action('admin_post_nopriv_submit_contact_form', 'handle_contact_form_submission');


function validate_name($name)
{
    $name = trim($name);

    if ($name === '') {
        return ['value' => $name, 'error' => 'Inserisci il tuo nome'];
    }
    return ['value' => $name, 'error' => null];
}

function validate_email($email)
{
    $email = trim($email);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['value' => $email, 'error' => 'Inserisci un indirizzo e-mail valido'];
    }
    return ['value' => $email, 'error' => null];
}


function validate_message($message)
{
    $message = trim($message);

    if ($message === '') {
        return ['value' => $message, 'error' => 'Inserisci il tuo messagio'];
    }
    return ['value' => $message, 'error' => null];
}




