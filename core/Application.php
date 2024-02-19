<?php

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    // added controller instance
    public Controller $controller;
    public Response $response;
    public static Application $app;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->controller = new Controller();
        $this->router = new Router($this->request, $this->response);
    }

    public function run() : void
    {
        echo $this->router->resolve();
    }

}