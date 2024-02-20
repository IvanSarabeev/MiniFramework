<?php

namespace app\core;

final class Singleton
{
    private static ?self $instance = null;
    public static string $ROOT_DIR;
    public static Singleton $app;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;

    private function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->controller = new Controller();
        $this->router = new Router($this->request, $this->response);
    }

    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self(rootPath: dirname(__DIR__));
        }

        return self::$instance;
    }

    public function run(): void
    {
        echo $this->router->resolve();
    }

}