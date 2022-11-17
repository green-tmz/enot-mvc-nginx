<?php

namespace Core;

use Core\Router;

class App extends Router
{
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
