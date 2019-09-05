<?php

namespace App\Http\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerService
{
    private $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    /**
     * Mail sender function
     *
     * @param $subject
     * @param $recipient
     * @param $emailBody
     */
    public function sendEmail($subject, $recipient, $emailBody, $attachment = false, $folderName = false) {

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
                // zip all files from files folder
                $this->zip($folderName);

                // add attachment to the email
                $mail->addAttachment('files/' . $folderName .  '/contact.zip', 'Contact_attachment.zip');
            }

            // send email
            $mail->send();

            // if mail is sent delete all from files
            if ($attachment) {
                $this->delete($folderName);
            }

        } catch (Exception $e) {
            // add log
            $this->logService->setLog('ERROR', 'MailchimpService - sendEmail: ' . $mail->ErrorInfo);
        }

    }

    /**
     * Zip all files from specified folder
     *
     * @param $contactType
     */
    public function zip($path) {

        try {
            // create zip file and store attachments in it
            $zip = new \ZipArchive();
            $zip->open($path . '/contact.zip', \ZipArchive::CREATE);

            // loop through specified folder and add all the files to the zip
            foreach (glob($path . "/*") as $file) {
                if (is_file($file)) {
                    $newFilename = substr($file,strrpos($file,'/') + 1);
                    $zip->addFile($file, $newFilename);
                }
            }

            // close zip object
            $zip->close();

        } catch (\Exception $e) {
            // add log
            $this->logService->setLog('ERROR', 'MailerService - zip: ' . $e->getMessage());
        }
    }

    /**
     * Delete all files from specified folder
     *
     */
    public function delete() {

        try {
            // delete all uploaded files
            foreach (glob(storage_path()."/app/*") as $folder) {

                if (is_dir($folder)
                    && strpos($folder, 'images') === false
                    && strpos($folder, 'public') === false) {

                    foreach (glob($folder . "/*") as $file) {
                        unlink($file);
                    }

                    //echo $file . "<br/>";
                    // delete folder
                    rmdir($folder);
                }
            }

        } catch (\Exception $e) {
            // add log
            $this->logService->setLog('ERROR', 'MailerService - delete: ' . $e->getMessage());
        }
    }

}