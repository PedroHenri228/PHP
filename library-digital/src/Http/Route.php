<?php

namespace App\Http;

use Exception;

class Route {
    
    private static array $routes = [];

    public static function get(string $path, string $action) {
        self::$routes['GET'][] = [
            'path' => $path,
            'action' => $action
        ];
    }

    public static function post(string $path, string $action) {
        self::$routes['POST'][] = [
            'path' => $path,
            'action' => $action
        ];
    }

    public static function dispatch(string $method, string $uri): void {
        try {
            $method = strtoupper($method);
            
            if (!isset(self::$routes[$method])) {
                throw new Exception("Método HTTP não permitido!");
            }

            foreach (self::$routes[$method] as $route) {
                $pattern = preg_replace('/\{([\w]+)\}/', '([\w-]+)', $route['path']);
                $pattern = str_replace('/', '\/', $pattern);
                
                if (preg_match('/^' . $pattern . '$/', $uri, $matches)) {
                    array_shift($matches);
                    
                    [$controller, $method] = explode('@', $route['action']);
                    $controllerNamespace = "App\\Controllers\\{$controller}";

                    if (!class_exists($controllerNamespace)) {
                        throw new Exception("O controller {$controller} não existe");
                    }

                    $controllerInstance = new $controllerNamespace();

                    if (!method_exists($controllerInstance, $method)) {
                        throw new Exception("O método {$method} não existe no controller {$controller}");
                    }

                    call_user_func_array([$controllerInstance, $method], $matches);
                    return;
                }
            }

            throw new Exception("Rota {$uri} não encontrada!");

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
