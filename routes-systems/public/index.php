<?php

require_once '../vendor/autoload.php';
require_once '../routes/router.php';

try {

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

    $request = $_SERVER['REQUEST_METHOD'];

    if(!isset($router[$request])) {
        throw new Exception("Método não permitido");
    }
    
    if(!array_key_exists($uri, $router[$request])) {
        throw new Exception("Rota não encontrada");

    }

    $controller = $router[$request][$uri];
    $controller();
    
}catch(Exception $e) {
    echo $e->getMessage();
}