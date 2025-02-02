<?php 

// Model - OpenLibraryApi
namespace App\Models;

use App\Config\Config;

class OpenLibraryApi {
    private $baseUrl = Config::API_URL_OPENLIBRARY;

    public function getBookByISBN(string $isbn): array {
        $url = "{$this->baseUrl}?bibkeys=ISBN:{$isbn}&format=json&jscmd=data";

        $response = $this->makeRequest($url);

        if (isset($response["ISBN:{$isbn}"])) {
            $bookData = $response["ISBN:{$isbn}"];

            if (isset($bookData['description'])) {
                if (is_array($bookData['description'])) {
                    $bookData['description'] = $bookData['description']['value'] ?? 'Descrição não disponível';
                }
            } else {
                $bookData['description'] = 'Descrição não disponível';
            }

            return $bookData;
        }

        return [];
    }

    private function makeRequest(string $url): array {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($httpCode === 200 && $response) {
            return json_decode($response, true);
        }

        return [];
    }
}
