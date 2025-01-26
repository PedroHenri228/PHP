<?php 

require_once __DIR__ ."/vendor/autoload.php";


use App\Models\ApiClient;
use App\Controllers\BookController;

$book = new BookController();
$book->index();

