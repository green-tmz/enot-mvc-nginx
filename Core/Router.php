<?php

namespace Core;

use Core\Facades\Request;

class Router
{
    protected array $routes = [];
    public Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            return "404";
        }

        if (is_array($callback)) {

            foreach ($callback as $k => $v) {
                $controller = 'Controllers\\' . $k;
                $action = ucfirst($v);

                if (!class_exists($controller)) {
                    throw new \ErrorException('Controller does not exist');
                }

                $objController = new $controller;

                if (!method_exists($objController, $action)) {
                    throw new \ErrorException('action does not exist');
                }

                $objController->$action();
            }
        }

        return call_user_func($callback);
    }
}
