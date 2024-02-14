<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class AppController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "Alcoholic"
        ];
        return Application::$app->router->renderView('home');
    }

    public function player()
    {
        $params = [];
        return $this->render('player', $params);
    }

    public function handlePlayerAction(Request $request)
    {
        $body = $request->getBody();
        dd($body);
        return 'Handle the Action';
    }

    public function computer()
    {
        return Application::$app->router->renderView('computer');
    }

    public function handleComputerAction()
    {
        return 'Handle the Comp Action';
    }

}