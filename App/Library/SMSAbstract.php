<?php

namespace App\Library;


abstract class SMSAbstract
{

    public $configVars;

    public $name;

    public function __construct()
    {
        $configVars = new \App\Config\Config();

    }

    abstract public function sendMessage($fromNumber, $toNumber, $messageBody);


}