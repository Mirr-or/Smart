<?php
namespace Core;

class Router
{
    protected $routers = [
        'POST' => [],
        'GET' => []
    ];

    public function get($url, $controller)
    {
        $this->routers['GET'][$url] = $controller;
    }

    public function post($url, $controller)
    {
        $this->routers['POST'][$url] = $controller;
    }

    public static function load($path)
    {
        $routers = new static;

        require "{$path}.php";

        return $routers;
    }

    public function run()
    {
        $url = Request::url();

        if( array_key_exists($url, $this->routers[Request::method()]) ){
            return $this->callClass($url);
            // return $this->routers[$url];
        }

        throw new \Exception('Page not Found');
    }

    protected function callClass($url)
    {
        list($class, $method) = explode('@', $this->routers[Request::method()][$url]);
        $class = new $class;
        $class->$method();
    }
}