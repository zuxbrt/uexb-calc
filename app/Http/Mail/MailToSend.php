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
        $infos = json_encode($this->email);
        dd($infos);

        // define what type of mail (notification/email)
        if ($info->type == 'email' && !is_null($info->file_path)) {
            // set attachment path
            $attachment = $info->file_path;
            // return data to queue
            return $this->from('noreply@smartlab.ba','No Reply')
                ->view("parts.customer_template", ["data" => $d ])
                ->attachFromStorage($attachment)
                ->subject('UčiExcelBa Predračun');
        } else if ($info->type == 'bussiness' && is_null($info->file_path)) {
            // return data to queue
            return $this->from('noreply@smartlab.ba','No Reply')
                ->view("parts.admin_template", ["data" => $d ])
                ->subject('Novi predračun generisan');
        }     
    }
}