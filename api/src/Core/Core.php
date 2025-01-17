<?php

namespace App\Core;
use App\Http\Request;
use App\Http\Response;

class Core {
    public static function dispatch(array $routes) {
        
        $url = '/';

        isset($_GET['url'])  && $url .= $_GET['url'];

        $url !== '/' && $url = rtrim($url, '/'); 

        $prefixController = 'App\\Controllers\\';

        $routeFound = false;

        foreach( $routes as $route) {
            $pattern = '#^' . preg_replace('/{id}/', '([\w-]+)', $route['path']) . '$#';

            if(preg_match($pattern, $url, $matches)) {

                array_shift($matches);

                $routeFound = true;

                if($route['method'] !== Request::method()) { // Verifica se o método e o mesmo da rota, caso não retorna um erro 
                    Response::json([
                        'error' => true,
                        'success' => false,
                        'message' => 'Sorry, method not allowed',
                    ], 405);
                    return;
                }

                [$controller, $action] = explode('@', $route['action']); // Divide a string para array com dois elementos

                $controller = $prefixController . $controller; // Atualiza a váriavel para incluir o namespace

                $extendController = new $controller(); // Instanciando a classe do controlador

                $extendController->$action(new Request, new Response, $matches); // Chamada do método do controlador

            }

        }

        if (!$routeFound) {
            $controller = $prefixController . 'NotFoundController';

            $extendController = new $controller();
            $extendController->index(new Request, new Response);
        }

    }
}