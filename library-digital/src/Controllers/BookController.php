<?php 

namespace App\Controllers;

use App\Models\ApiClient;
use App\Models\OpenLibraryApi;
use App\Config\Config;

class BookController {

    private $books;

    private $newISBN;
    private $endpoint;

    private $params;

    private $listname = 'hardcover-fiction';

    private $results;

    private $api_key = Config::API_KEY;

    public function index() {
        $this->endpoint = 'lists.json';


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


    public function isbn($isbn) {

        $this->newISBN = new OpenLibraryApi;

        $this->results = $this->newISBN->getBookByISBN($isbn);

        $this->render('open', ['results' => $this->results,]);
        

    }

    private function render($view, $data = []) {
    
        extract($data);

        require_once __DIR__ . "/../Views/{$view}.php";
    }
}
