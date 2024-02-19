<?php
//
//namespace app\core;
//
//final class Singleton
//{
//    private static Singleton $instance;
//    public static string $ROOT_DIR;
//    public Router $router;
//    public Request $request;
//    // added controller instance
//    public Controller $controller;
//    public Response $response;
//
//    private function __construct($rootPath)
//    {
//        self::$ROOT_DIR = $rootPath;
//        self::$instance = $this;
//        $this->request = new Request();
//        $this->response = new Response();
//        $this->controller = new Controller();
//        $this->router = new Router($this->request, $this->response);
//    }
//
//    private function __clone(): void
//    {
//    }
//
//    /** If the property is set it will populate with a new instance of itself
//     * @return mixed
//     */
//    public static function getInstance(): mixed
//    {
//        if (!isset(self::$instance)) {
//            self::$instance = new self;
//        }
//
//        return self::$instance;
//    }
//
//    public function run(): void
//    {
//        echo $this->router->resolve();
//    }
//}