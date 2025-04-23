<?php

$errors = [];
$inputs = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        send_email($inputs['name'], $inputs['email'], $inputs['message'], $recipient_email);
        $success = true;
    }

}


function send_email($name, $from_email, $message, $recipient_email)
{

    $subject = "Nuovo messagio da $name";
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=utf-8';
    $headers[] = "To: $recipient_email";
    $headers[] = "From: $from_email";
    $header_string = implode("\r\n", $headers);


    wp_mail($recipient_email, $subject, $message, $header_string);
}

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