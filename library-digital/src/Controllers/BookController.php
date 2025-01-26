<?php 

namespace App\Controllers;

use App\Models\ApiClient;
use App\Config\Config;

class BookController {

    private $books;
    private $endpoint;

    private $params;

    private $listname = 'hardcover-fiction';

    private $results;

    private $api_key = Config::getApiKey();

    public function index() {
        $this->endpoint = 'lists.json';

        echo "<pre>";
        var_dump($this->api_key);

        $this->params = [
            'api-key' => $this->api_key,
            'list' => $this->listname,
        ];
        

        $this->books = new ApiClient();

        $this->results = $this->books->get($this->endpoint, $this->params);


        $this->render('books', [
            'results' => $this->results,
        ]);
    }

    private function render($view, $data = []) {
    
        extract($data);

        require_once __DIR__ . "/../Views/{$view}.php";
    }
}
