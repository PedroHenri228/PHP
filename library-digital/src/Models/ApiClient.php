<?php

namespace App\Models;

use App\Config\Config;

class ApiClient {

    private $api_key = Config::getApiKey();
    private $api_url = Config::getApiUrl();

    public function __construct() {


        if (empty($this->api_key) || empty($this->api_url)) {
            throw new \Exception('API Key and Url not found');
        }
    }

    public function get($endpoint, $params = []) {
        $params['api_key'] = $this->api_key;

        $url = $this->api_url . $endpoint . '?' . http_build_query($params);

        $response = file_get_contents($url);


        return json_decode($response, true);

    }
}
