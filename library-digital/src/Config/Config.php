<?php

namespace App\Config;

class Config
{

    private static $api_key = "ee99UtTzgxNuLAgS1KM4wpjBREZnmeYq";

    private static $api_url = "https://api.nytimes.com/svc/books/v3/";


    public static function getApiKey()
    {
        return self::$api_key;
    }

    public static function getApiUrl()
    {
        return self::$api_url;
    }
}
