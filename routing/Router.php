<?php
class Router
{

    public $routes = [
       
    ];
    public function get($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'GET',
        ];
    }

    public function post($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST',
        ];
    }

    public function delete($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'DELETE',
        ];
    }

    public function put($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PUT',
        ];
    }

    public function route($uri, $method) {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                
                return require $route['controller'];
            }
            
        }
        http_response_code(404);
    echo '404 - Route Not Found';
    }
}

