<?php

namespace App\Helper;


class HTTPResponse
{
    /**
     * creates a response with JSON/P Header, HTTP CODE, with CORS. This can be configured in the \App\Config\onfig.php
     * @param $code
     * @param $message
     */
    public static function response($code, $message)
    {
        $code = $code ?: filter_var($code, FILTER_SANITIZE_NUMBER_INT);

        header('content-type: application/json; charset=utf-8');
        http_response_code($code);

        ob_start('ob_gzhandler');

        $callback = isset($_GET['callback']) ? filter_var($_GET['callback'], FILTER_SANITIZE_STRING) : null;
        $json = json_encode(array(
            'status' => $code,
            'description' => filter_var($message, FILTER_SANITIZE_STRING)
        ));

        echo isset($callback)
            ? "{$callback}($json)"
            : $json;

        if (!CORS_DISABLED) {
            header("access-control-allow-origin: *");

        }

    }

}
