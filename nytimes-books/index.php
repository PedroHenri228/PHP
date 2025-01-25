<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\ApiClient;
use App\Config;
use App\ReviewLoader;


$apiKey = Config::API_KEY;


$apiClient = new ApiClient($apiKey);

$reviewLoader = new ReviewLoader($apiClient);


$bookTitle = 'Becoming';


$responseData = $reviewLoader->getReviewByBook($bookTitle);

echo "<h2>Críticas para o livro: <em>$bookTitle</em></h2>";
if (!empty($responseData['results'])) {
    echo "<ul>";
    foreach ($responseData['results'] as $reviewData) {
        echo "<li>";
        echo "<strong>Título:</strong> " . $reviewData['book_title'] . "<br>";
        echo "<strong>Autor:</strong> " . $reviewData['book_author'] . "<br>";
        echo "<strong>Resumo:</strong> " . $reviewData['summary'] . "<br>";
        echo "<strong>Publicado em:</strong> " . $reviewData['publication_dt'] . "<br>";
        echo "<strong><a href='" . $reviewData['url'] . "' target='_blank'>Leia mais</a></strong><br>";
        echo "</li><br>";
    }
    echo "</ul>";
} else {
    echo "<p><em>Sem críticas encontradas para este livro.</em></p>";
}


$listName = 'hardcover-fiction';


$bestSellersData = $reviewLoader->getBestSellers($listName);

echo "<h2>Best Sellers na lista: <em>$listName</em></h2>";
if (!empty($bestSellersData['results'])) {
    echo "<ul>";
    foreach ($bestSellersData['results'] as $bookData) {
        $bookDetails = $bookData['book_details'][0];
        echo "<li>";
        echo "<strong>Título:</strong> " . $bookDetails['title'] . "<br>";
        echo "<strong>Autor:</strong> " . $bookDetails['author'] . "<br>";
        echo "<strong>Descrição:</strong> " . $bookDetails['description'] . "<br>";
        echo "<strong><a href='" . $bookData['amazon_product_url'] . "' target='_blank'>Comprar na Amazon</a></strong><br>";
        echo "</li><br>";
    }
    echo "</ul>";
} else {
    echo "<p><em>Sem livros encontrados nesta lista.</em></p>";
}
?>
