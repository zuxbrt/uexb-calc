<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02/05/2019
 * Time: 12:16
 */

namespace App\Http\Services;


use Illuminate\Support\Facades\View;

class MailTemplate
{
    /**
     * @param $data
     * @return string
     */
    public function createMailTemplateForAdmin($data) {

        $contact->name = $request->input('name');
        $contact->lastname = $request->input('lastname');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        $contact->save();
        
    }

    /**
     * @param $data
     * @return string
     */
    public function createMailTemplateForCustomer($data) {
        // todo create mail for admin and for user
    }
}