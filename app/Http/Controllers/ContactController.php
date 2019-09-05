<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Services\LogService;
use App\Http\Services\MailerService;
use App\Http\Services\MailTemplateCreatorService;
use App\Http\Services\UploadService;
use App\Jobs\SendEmail;
use App\Mail\CoursePassed;
use App\Mail\MailToSend;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    private $logService;
    private $mailer;
    private $uploader;
    private $mailTemplateCreator;

    public function __construct(LogService $logService, MailTemplateCreatorService $mailTemplateCreator)
    {
        $this->logService = $logService;
        $this->mailer = new MailerService($logService);
        $this->uploader = new UploadService($logService);
        $this->mailTemplateCreator = $mailTemplateCreator;
    }

    /**
     * Send contact info to super admin   -->  /contact
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleContactInfo(Request $request) {

        // TODO issues with try/catch block and data validation
        // set request data to session so that it can be used for old input if neccessary
        $request->flash();

        // check if neccessary values are entered correctly, if no return error messages
        $request->validate([
            'name' => 'required|max:45',
            'lastname' => 'required|max:45',
            'email' => 'required|max:45',
            'subject' => 'required|max:255',
            'message' => 'required'
        ]);

        // create contact and push mail to queue
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->lastname = $request->input('lastname');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        $contact->save();

        Mail::to([env('ADMIN_EMAIL')])->queue(new MailToSend($contact));

        // return message
        return redirect('/#contact')->with('message', 'Contact message successfully sent.');
    }


    /**
     * Send bussiness contact message
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleBussinessInfo(Request $request) {

        // TODO issues with try/catch block and data validation
        // set data to session in order to use in input fields if invalid data is sent
        $request->flash();

        // validate form
        $request->validate([
            'bussiness_name' => 'required',
            'bussiness_website' => 'required',
            'bussiness_person' => 'required',
            'bussiness_phone_number' => 'required',
            'bussiness_email' => 'required|email',
            'bussiness_message' => 'required',
            'bussiness_category' => 'required'
        ]);

        // create contact and push mail to queue
        $contact = new Contact();
        $contact->type = 'bussiness';
        $contact->company = $request->input('bussiness_name');
        $contact->bussiness_website = $request->input('bussiness_website');
        $contact->bussiness_person = $request->input('bussiness_person');
        $contact->phone_number = $request->input('bussiness_phone_number');
        $contact->email = $request->input('bussiness_email');
        $contact->message = $request->input('bussiness_message');
        $contact->category = $request->input('bussiness_category');


        // save uploaded file/s if they are sent TODO file sizes and count will be handled in php.ini
        if (file_exists($_FILES['files']['tmp_name'][0])) {

            // generate new folder name
            $folderName = rand(1,10000);

            // make folder where contact files will temporary be located
            Storage::makeDirectory("/" .$folderName);
            // set path where tou store uploaded files
            $path = storage_path()  ."/app/" . $folderName;
            $this->uploader->uploadFiles($_FILES, $path);
            // $attachment = true;
            $contact->file_path = "/" . $folderName . '/contact.zip';

            // create zip
            $this->mailer->zip($path);
        }

        // save contact to be used in queue
        $contact->save();

        // set mail to queue
        Mail::to([env('ADMIN_EMAIL')])->queue(new MailToSend($contact));

        // return message
        return back()->with('message', 'Bussiness contact message successfully sent.');
    }

    /**
     * Send demo meeting info to super admin
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleDemoInfo(Request $request) {

        // TODO issues with try/catch block and data validation
        // set request data to session so that it can be used for old input if neccessary
        $request->flash();

        // check if neccessary values are entered correctly, if no return error messages
        $request->validate([
            'name' => 'required|max:45',
            'company' => 'required|max:45',
            'email' => 'required|max:45',
            'subject' => 'required|max:255',
            'message' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        // create contact and push mail to queue
        $contact = new Contact();
        $contact->type = 'demo';
        $contact->name = $request->input('name');
        $contact->company = $request->input('company');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        $contact->date = $request->input('date');
        $contact->time = $request->input('time');
        $contact->save();

        Mail::to([env('ADMIN_EMAIL')])->queue(new MailToSend($contact));

        // return message
        return back()->with('message', 'Schedule request successfully sent.');
    }

    /**
     * Send careers info to super admin
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleCareersInfo(Request $request) {

        // TODO issues with try/catch block and data validation
        // set request data to session so that it can be used for old input if neccessary
        $request->flash();

        // check if neccessary values are entered correctly, if no return error messages
        $request->validate([
            'name' => 'required|max:45',
            'lastname' => 'required|max:45',
            'email' => 'required|email',
            'phone_number' => 'required|max:45',
            'message' => 'required',
            'category' => 'required'
        ]);

        // create contact and push mail to queue
        $contact = new Contact();
        $contact->type = 'career';
        $contact->name = $request->input('name');
        $contact->lastname = $request->input('lastname');
        $contact->email = $request->input('email');
        $contact->phone_number = $request->input('phone_number');
       // $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        $contact->category = $request->input('category');

        // save uploaded file/s if they are sent TODO file sizes and count will be handled in php.ini
        if (file_exists($_FILES['files']['tmp_name'][0])) {

            // generate new folder name
            $folderName = rand(1,10000);

            // make folder where contact files will temporary be located
            Storage::makeDirectory("/" .$folderName);
            // set path where tou store uploaded files
            $path = storage_path()  ."/app/" . $folderName;
            $this->uploader->uploadFiles($_FILES, $path);
            // $attachment = true;
            $contact->file_path = "/" . $folderName . '/contact.zip';

            // create zip
            $this->mailer->zip($path);
        }

        $contact->save();

        Mail::to([env('ADMIN_EMAIL')])->queue(new MailToSend($contact));

        // return message
        return redirect('/pages/careers#aboveSectionThree')->with('message', 'Career request successfully sent.');
    }
}

