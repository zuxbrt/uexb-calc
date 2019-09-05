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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
    }


    /**
    //  * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // decode contact data
        $info = json_decode($this->email);

        $d = [
            'email' => $info->email,
            'subject' => $info->subject,
            'message' => $info->message,
            'date' => $info->created_at,
        ];

        // check which type of contact we have and return appropriate data
        if ($info->email === env('ADMIN_EMAIL') && !is_null($info->attached_file)) {
            // set attachment path
            $attachment = $info->attached_file;

            // return data to queue
            return $this->from('noreply@smartlab.ba','No Reply')
                ->view("parts.admin_template", ["data" => $d ])
                ->attachFromStorage($attachment)
                ->subject('UciExcelBa Calculator (admin)');

        } else if (is_null($info->attached_file)) {
            // return data to queue
            return $this->from('noreply@smartlab.ba','No Reply')
                ->view("parts.custmer_template", ["data" => $d ])
                ->subject('UciExcelBa');
        }

    }

}

