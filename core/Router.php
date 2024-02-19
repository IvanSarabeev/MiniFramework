<?php

namespace app\core;
use app\core\Application;

class Router
{
    public Request $request;
    public Response $response;
    public Controller $controller;
    protected array $routes = [];

    /**
     * @param Request $request
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public function get($path, $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);

            // TODO: call the controller then the renderView method
            return $this->controller->renderView("_404");
        }

        if (is_string($callback)) {
            return $this->controller->renderView($callback);
        }

//        $object = $callback[0] ?? '';
//        $obj = new $object();
//        $method = $callback[1];
//        return $obj->{$method}();

        if (is_array($callback)) {
            $callback[0] = new $callback[0]($this->request);
        }

        return call_user_func($callback, $this->request);
    }

    /* TODO: merge the following methods: renderView, layoutContent and renderOnlyView
        to a core/Controller, because the controller should be responsible for the rendering not the router
    */
}