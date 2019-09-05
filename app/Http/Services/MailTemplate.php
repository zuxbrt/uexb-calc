<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02/05/2019
 * Time: 12:16
 */

namespace App\Http\Services;


use Illuminate\Support\Facades\View;
use App\Email;

class MailTemplate
{
    /**
     * @param $data
     * @return string
     */
    public function createMailTemplate($customerData, $attachment, $customEmail) {
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