<?php

function load(string $controller, string $action) {

    try {


    $controllerNamespace = "App\\Controllers\\{$controller}";

    if(!class_exists($controllerNamespace)) {
        throw new Exception("O controller {$controller} não existe");
    }
    
    $controllerInstace = new $controllerNamespace();
    
    if(!method_exists($controllerInstace, $action)) {
        throw new Exception("O método {$action} não existe no controller {$controller}");

    }

    $controllerInstace->$action((object) $_REQUEST);

    } catch(Exception $e) {
        echo $e->getMessage();
    }
}


$router = [
    'GET' => [
        '/' => fn() => load('HomeController', 'index'),
        '/contact' =>fn() => load('ContactController', 'index'),
    ],
    'POST' => [
        '/contact' =>fn() => load('ContactController', 'store'),
    ],
];