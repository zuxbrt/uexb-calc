<?php

namespace App\Mail;

use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailToSend extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // decode contact data
        $info = json_decode($this->contact);

        $d = [
            'name' => $info->name,
            'lastname' => $info->lastname,
            'company' => $info->company,
            'email' => $info->email,
            'phone_number' => $info->phone_number,
            'subject' => $info->subject,
            'message' => $info->message,
            'date' => $info->date,
            'time' => $info->time,
        ];

        // check which type of contact we have and return appropriate data
        if ($info->type == 'customer' && !is_null($info->file_path)) {
            // set attachment path
            $attachment = $info->file_path;

            // return data to queue
            return $this->from('noreply@smartlab.ba','No Reply')
                ->view("parts.bussiness_mail_template", ["data" => $d ])
                ->attachFromStorage($attachment)
                ->subject('New bussiness contact mail');

        } else if ($info->type == 'admin' && is_null($info->file_path)) {
            // return data to queue
            return $this->from('noreply@smartlab.ba','No Reply')
                ->view("parts.bussiness_mail_template", ["data" => $d ])
                ->subject('New bussiness contact mail');
        }

    }

}

