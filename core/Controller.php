<?php

namespace app\core;
use app\controllers\HomeController;

class Controller
{
    /**
     * @param $view
     * @param array $params
     * @return array|false|string
     */
    public function renderView($view, array $params = []): array|false|string
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * Return the layout or throw an error
     * @return false|string
     */
    protected function layoutContent(): false|string
    {
        return file_get_contents(Singleton::$ROOT_DIR . "/views/layouts/main.php");
    }

    /**
     * Return dynamically the needed view
     * @param $view
     */
    protected function renderOnlyView($view, $params): void
    {
        // loop over the $params, $$key evaluates as string name to a corresponding value
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        require_once Singleton::$ROOT_DIR . "/views/$view.php";

    }

    // TODO: change the return statement
    public function render($view, $params = []): false|array|string
    {
        return Singleton::$app->controller->renderView($view, $params);
    }


}