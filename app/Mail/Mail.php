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

    private $contact;

    /**
    //  * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

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
            'bussiness_website' => $info->bussiness_website,
            'bussiness_person' => $info->bussiness_person,
            'email' => $info->email,
            'phone_number' => $info->phone_number,
            'subject' => $info->subject,
            'message' => $info->message,
            'date' => $info->date,
            'time' => $info->time,
            'category' => $info->category,
        ];

        // check which type of contact we have and return appropriate data
        if ($info->type == 'bussiness' && !is_null($info->file_path)) {
            // set attachment path
            $attachment = $info->file_path;

            // return data to queue
            return $this->from('noreply@smartlab.ba','No Reply')
                ->view("parts.bussiness_mail_template", ["data" => $d ])
                ->attachFromStorage($attachment)
                ->subject('New bussiness contact mail');

        } else if ($info->type == 'bussiness' && is_null($info->file_path)) {
            // return data to queue
            return $this->from('noreply@smartlab.ba','No Reply')
                ->view("parts.bussiness_mail_template", ["data" => $d ])
                ->subject('New bussiness contact mail');

        } else if ($info->type == 'general') {
            // return data to queue
            return $this->from('noreply@smartlab.ba','No Reply')
                ->view("parts.contact_mail_template", ["data" => $d ])
                ->subject('New general contact mail');
        } else if ($info->type == 'demo') {
            // return data to queue
            return $this->from('noreply@smartlab.ba','No Reply')
                ->view("parts.demo_mail_template", ["data" => $d ])
                ->subject('New demo contact mail');
        } else if ($info->type == 'career' && !is_null($info->file_path)) {
            // set attachment path
            $attachment = $info->file_path;

            // return data to queue
            return $this->from('noreply@smartlab.ba','No Reply')
                ->view("parts.careers_mail_template", ["data" => $d ])
                ->attachFromStorage($attachment)
                ->subject('New careers contact mail');

        } else if ($info->type == 'career' && is_null($info->file_path)) {
            // return data to queue
            return $this->from('noreply@smartlab.ba','No Reply')
                ->view("parts.careers_mail_template", ["data" => $d ])
                ->subject('New careers contact mail');
        }

    }

}

