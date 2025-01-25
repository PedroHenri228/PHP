<?php

namespace App;

class ReviewLoader
{
    private $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function getReviewByBook($bookTitle)
    {
        $endpoint = 'reviews.json';

        $params = [
            'title' => $bookTitle,
        ];

        return $this->apiClient->get($endpoint, $params);
    }

  
    public function getBestSellers($listName)
    {
        $endpoint = 'lists.json'; 

        $params = [
            'list' => $listName,
        ];

        return $this->apiClient->get($endpoint, $params);
    }
}
