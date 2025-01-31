<?php 

namespace App\Http;

use Exception;

class Route 
{
    private static array $routes = [];

    public static function get(string $path, string $action): void 
    {
        self::$routes['GET'][$path] = $action;
    }

    public static function post(string $path, string $action): void 
    {
        self::$routes['POST'][$path] = $action;
    }

    public static function dispatch(string $method, string $path): void 
    {
        try {
            $method = strtoupper($method);

            if (!isset(self::$routes[$method][$path])) {
                throw new Exception("Rota {$path} não encontrada!");
            }

            $action = self::$routes[$method][$path];

            if (is_callable($action)) {
                call_user_func($action);
                return;
            }

            if (is_string($action) && str_contains($action, '@')) {
                [$controller, $method] = explode('@', $action);
                $controller = "App\\Controllers\\$controller";

                if (!class_exists($controller)) {
                    throw new Exception("Controller {$controller} não encontrado!");
                }

                $instance = new $controller();

                if (!method_exists($instance, $method)) {
                    throw new Exception("Método {$method} não existe no controller {$controller}!");
                }

                $instance->$method();
                return;
            }

            throw new Exception("Ação inválida para a rota {$path}!");

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
