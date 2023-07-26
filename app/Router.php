<?php

namespace App;
use app\middleware\Middleware;

class Router {

    protected $routes = [];

    public function add($method, $uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller) {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller) {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller) {
        return $this->add('DELETE', $uri, $controller);
    }

    public function put($uri, $controller) {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key) {
        //var_dump($this->routes);
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($uri, $method) {

        foreach($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                if($route['middleware'])
                {
                    $middleware = Middleware::MAP[$route['middleware']];
                    (new $middleware)->handle();
                }
            
                return require BASE_PATH . $route['controller'];
            } 
        }
        $this->abort();
    }

    public function abort($code = 404) {
        http_response_code($code);
        require_once \BASE_PATH . "views/$code.php";
        die();
    }

}
