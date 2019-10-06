<?php

namespace App\Http\Services;
use App\Email;

class MailTemplate
{
    /**
     * Create template from the given view.
     * @param view
     * @param data
     */
    public function createTemplate($customerData, $attachment)
    {
        $mail = new Email();
        $mail->email = $customerData['email'];
        $mail->subject = 'Predracun za '.$customerData['email'].'.';
        $mail->message = 'Poruka';
        $mail->attached_file = $attachment;    
        $mail->save();
        return $mail;
    }
}