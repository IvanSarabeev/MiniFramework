<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\services\SinglePlayerService;

class HomeController extends Controller
{
    private SinglePlayerService $singlePlayerService;

    public function __construct(private readonly Request $request)
    {
        $this->singlePlayerService = new SinglePlayerService();
    }

    public function home(): array|false|string
    {
        return Application::$app->router->renderView('home');
    }

    public function reset()
    {
        $this->singlePlayerService->reset();
        header('Location: ./', true, 301);
        exit;
    }
}