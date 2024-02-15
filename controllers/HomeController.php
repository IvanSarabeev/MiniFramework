<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class HomeController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "Alcoholic"
        ];
        return Application::$app->router->renderView('home');
    }
}