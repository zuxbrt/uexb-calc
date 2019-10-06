<?php

namespace App\Mail;

use App\Email;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailToSend extends Mailable 
{
    use Queueable, SerializesModels;

    private $email;

    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    /**
     * Build and send the message.
     */
    public function build()
    {
        $infos = $this->email;
        $encodedData = json_encode($this->email);

        $date = new \DateTime();
        $date = date_format($date, 'd/m/Y');

        $d = [
            'email' => $infos['email'],
            'subject' => $infos['subject'],
            'message' => $infos['message'],
            'date' => $date,
        ];    

        // set attachment path
        $attachment = $infos['attached_file'];
        // return data to queue
        return $this->from('noreply@smartlab.ba','No Reply')
                    ->view("parts.customer_template", ["data" => $d ])
                    ->attach($attachment)
                    ->subject('UčiExcelBa Predračun');
    }
}