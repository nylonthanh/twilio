<?php

namespace App\Library;

class SMS extends \App\Library\SMSAbstract
{
    public $vendor;

    public function __construct($vendor = null)
    {
        parent::__construct();

        if ($vendor === null) {
            throw new \Exception('SMS vendor cannot be null');

        }

        $this->vendor = trim(strtolower($vendor));
        
    }

    public function sendMessage()
    {
        
    }
    
    public function getVendor()
    {
        return $this->vendor;

    }



}