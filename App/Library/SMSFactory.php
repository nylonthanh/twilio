<?php

namespace App\Library;

class SMSFactory
{
    
    static public function create($smsVendor)
    {
        $smsVendorPath = "\\" . __NAMESPACE__ . "\\$smsVendor";

        try {
            return new $smsVendorPath($smsVendor);

        } catch (\Exception $e) {
            throw new \Exception("Could not create vendor $smsVendor");

        }

    }

}
