

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-X.XX.X/src/Exception.php';
require 'PHPMailer-X.XX.X/src/PHPMailer.php';
require 'PHPMailer-X.XX.X/src/SMTP.php';
require 'emailconfig.php';

function sendAppointmentConfirmationEmail($recipient, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = EMAIL_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL_USERNAME;
        $mail->Password = EMAIL_PASSWORD;
        $mail->SMTPSecure = 'tls'; // or 'ssl' if needed
        $mail->Port = EMAIL_PORT;

        // Recipients
        $mail->setFrom(EMAIL_FROM, EMAIL_FROM_NAME);
        $mail->addAddress($recipient);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        // Log or handle the error
        return false;
    }
}

?>
