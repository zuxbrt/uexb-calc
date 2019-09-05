<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class MailchimpService
{

    private $headers;
    private $logService;

    public function __construct(LogService $logService)
    {
        $this->headers = ['Authorization' => env('MAILCHIMP_API_KEY')];
        $this->logService = $logService;
    }

    /**
     * Add subscriber to MailChimp
     *
     * @param $email
     */
    public function addPendingSubscriber($email) {

        try {

            // create client
            $client = new Client([
                'headers' => $this->headers
            ]);

            // send request for adding subscriber (pending status until user verify email)
            $client->post(env('MAILCHIMP_API_ROUTE'),
                [
                    \GuzzleHttp\RequestOptions::JSON => [
                        'email_address' => $email,
                        'status' => 'pending',
                        'merge_fields' => [
                            'FNAME' => 'Unknown',
                            'LNAME' => 'Unknown'
                        ]
                    ]
                ]);

        } catch (\Exception $e) {
            // add log
            $this->logService->setLog('ERROR', 'MailchimpService - addPendingSubscriber: ' . $e->getMessage());
        }
        
    }

    /**
     * Get list of subscribers from MailChimp
     *
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function listSubscribers() {

        try {

            // create client object
            $client = new Client([
                'headers' => $this->headers
            ]);

            // get subscribers
            $subscribers = $client->get(env('MAILCHIMP_API_ROUTE'));
            $data = json_decode($subscribers->getBody()->getContents());

            $subscribers = [];

            // loop through returned data and extract only subscriber emails
            foreach ($data->members as $subscriber) {
                array_push($subscribers, $subscriber->email_address);
            }

            // return data
            return $subscribers;

        } catch (\Exception $e) {
            // add log
            $this->logService->setLog('ERROR', 'MailchimpService - listSubscribers: ' . $e->getMessage());

            // return empty array if error appears
            return [];
        }
    }

//    public function createTemplate($title, $body) {
//
//        try {
//
//            // create client
//            $client = new Client([
//                'headers' => $this->headers
//            ]);
//
//            // send request for adding subscriber (pending status until user verify email)
//            $client->post(env('MAILCHIMP_API_ROUTE'),
//                [
//                    \GuzzleHttp\RequestOptions::JSON => [
//                        'name' => $title,
//                        'status' => $body
//                    ]
//                ]);
//
//        } catch (\Exception $e) {
//            // add log
//            $this->logService->setLog('ERRROR', $e->getMessage());
//        }
//    }
}