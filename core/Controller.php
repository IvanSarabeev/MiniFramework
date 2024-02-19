<?php

namespace app\core;
use app\controllers\HomeController;

class Controller
{

    public function render($view, $params = []): false|array|string
    {
        return Application::$app->router->renderView($view, $params);
    }

}