<?php

namespace App;

class ApiClient
{
    private $apiKey;
    private $baseUrl;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->baseUrl = 'https://api.nytimes.com/svc/books/v3/';
    }

    public function get($endpoint, $params = [])
    {
        $params['api-key'] = $this->apiKey;

        $url = $this->baseUrl . $endpoint . '?' . http_build_query($params);

        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}
