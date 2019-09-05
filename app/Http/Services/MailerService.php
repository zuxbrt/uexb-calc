<?php

namespace App\Http\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerService
{
    /**
     * Mail sender function
     *
     * @param $subject
     * @param $recipient
     * @param $emailBody
     */
    public function sendEmail($subject, $recipient, $emailBody, $attachment = false) {

        // create PHPMailer object
        $mail = new PHPMailer(true);

        try {
            // set object properties
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = 'tls';
            $mail->Port = env('MAIL_PORT');
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($recipient, 'Receiver');     // Add a recipient

            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $emailBody;
            $mail->AltBody = 'Your email provider doesnt support sending HTML mails.';

            // check if attachment will be set
            if ($attachment) {
                // add attachment to the email pdf
                $mail->addAttachment($attachment);
            }

            // send email
            $mail->send();


        } catch (Exception $e) {
            // add log
        }

    }

}