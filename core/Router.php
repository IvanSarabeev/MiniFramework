<?php

namespace app\core;
use app\core\Application;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    /**
     * @param Request $request
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
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
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

//        $object = $callback[0] ?? '';
//        $obj = new $object();
//        $method = $callback[1];
//
//        return $obj->{$method}();

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

//        dd($callback);

        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

        return str_replace('{{content}}', $viewContent, $layoutContent);
//        include_once Application::$ROOT_DIR . "/views/$view.php";
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * Return the layout or throw an error
     * @return false|string
     */
    protected function layoutContent()
    {
        return file_get_contents(Application::$ROOT_DIR . "/views/layouts/main.php");

    }


    /**
     * Return dynamically the needed view
     * @param $view
     * @return false|string
     */
    protected function renderOnlyView($view, $params)
    {
        // loop over the $params, $$key evaluates as string name to a corresponding value
        foreach ($params as $key => $value) {
            $$key = $value;
        }
//        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
//        return ob_get_clean();
    }
}