<?php

namespace App\Core;

class Core {
    public static function dispatch(array $routes) {
        
        $url = '/';

        isset($_GET['url'])  && $url .= $_GET['url'];

        foreach( $routes as $route) {
            $pattern = '#^' . preg_replace('/{id}/', '([\w-]+)', $route['path']) . '$#';

            if(preg_match($pattern, $url, $matches)) {
                echo "<pre>";
                array_shift($matches);
                print_r($matches);
            }

        }

    }
}