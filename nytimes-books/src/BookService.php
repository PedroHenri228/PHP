<?php 

namespace App;

class BookService {
    
    private $apiClient;

    public function __construct(ApiClient $apiClient) {
        $this->apiClient = $apiClient;
    }

    public function getBestSellerList() {

        $endpoint = '/lists/names.json';
        return $this->apiClient->get($endpoint);

    }

    
}