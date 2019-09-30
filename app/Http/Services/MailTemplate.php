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
    public function createTemplate($customerData, $attachment, $customEmail)
    {
        $mail = new Email();
        if($customEmail !== false){
            $mail->email = $customEmail;
            $mail->subject = 'Predracun za '.$customerData['email'].'.';
        } else {
            $mail->email = $customerData['email'];
            $mail->subject = 'Predracun';
        }
        $mail->message = 'Poruka';
        $mail->attached_file = $attachment;
    
        $mail->save();
        return $mail;
    }
}