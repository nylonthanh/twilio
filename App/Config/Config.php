<?php

namespace App\Config;

class Config
{
    public function __construct()
    {
        define('TWILIO_ACCOUNT_ID', '');
        define('TWILIO_AUTH_TOKEN', '');
        define('FROM_PHONE_NUMBER', '');
        define('CORS_DISABLED', FALSE);

    }
}
