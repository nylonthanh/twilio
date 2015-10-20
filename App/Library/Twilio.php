<?php

namespace App\Library;

class Twilio extends \App\Library\SMSAbstract
{
    public $name;
    protected $client;

    public function __construct()
    {
        parent::__construct();

        $this->name = 'Twilio';
        $AccountSid = TWILIO_ACCOUNT_ID;
        $AuthToken = TWILIO_AUTH_TOKEN;

        try {
            $this->client = new \Services_Twilio($AccountSid, $AuthToken);

        } catch (\Services_Twilio_HttpException $e) {
            throw new \Exception('Failed to create new Twilio service. Err: ' . $e->getCode());

        }

    }

    /**
     * Twilio send message, returns appropriate response code and body
     * @param $fromNumber
     * @param $toNumber
     * @param $messageBody
     * @return bool
     * @throws Error
     */
    public function sendMessage($fromNumber, $toNumber, $messageBody)
    {
        try {
            $message = $this->client->account->messages->create(array(
                "From" => $fromNumber,
                "To" => $toNumber,
                "Body" => $messageBody,
            ));

        } catch (\Services_Twilio_RestException $e) {
            throw new Error('sendMessage failed. From class: ' . __CLASS__ . ', line: ' . __LINE__);

        }

        if ($message->status === 'queued') {
            \App\Helper\HTTPResponse::response(200, $message->status);

        } else {
            \App\Helper\HTTPResponse::response($message->error_code, $message->error_message);


        }

    }

}
