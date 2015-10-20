<?php

/**
 * This is a client that will implement the SMSFactory
 * You can pass in 'Twilio' or whatever service to it and it will create that service
 * Then you can call sendMessage() to send the message with the params (fromNumber, toNumber, message)
 * sendMessage is required because of the contract with the concrete class of Twilio and its dependance on
 * SMSAbstract.php
 *
 * The intent is to be used in a larger program that has more SMS services to pick from, to get away from crazy
 * conditionals, and to have maintainable, reusable code.
 *
 * Thanh
 */
require_once __DIR__ . '/vendor/autoload.php';

//pass phone number here
$toPhoneNumber = '';
$messageBody = "Hi mate, testing from Twilio! \n\n ok?";

//if there was a different service, you can use it (or if fail, use fallback)
try {
    $SMSObj = \App\Library\SMSFactory::create('Twilio');

} catch (Exception $e) {
    \App\Helper\HTTPResponse::response(400, $e->getMessage());

}

//try to send the message using the service created in the factory
try {
    $SMSObj->sendMessage(FROM_PHONE_NUMBER, $toPhoneNumber, $messageBody);

} catch (Exception $e) {
    \App\Helper\HTTPResponse::response(400, $e->getMessage());

}

