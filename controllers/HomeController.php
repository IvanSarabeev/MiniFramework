<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
//use app\core\Singleton;
use app\services\MultiPlayerService;
use app\services\SinglePlayerService;
use JetBrains\PhpStorm\NoReturn;

class HomeController extends Controller
{
    private SinglePlayerService $singlePlayerService;
    private MultiPlayerService $multiPlayerService;

    public function __construct()
    {
        $this->singlePlayerService = new SinglePlayerService();
        $this->multiPlayerService = new MultiPlayerService();
    }

    public function home(): false|array|string
    {
        return Application::$app->controller->renderView('home');
//        return Singleton::getInstance()->controller->renderView('home');
    }

    #[NoReturn] public function reset(): void
    {
        $this->singlePlayerService->reset();
        header('Location: ./', true, 301);
        exit;
    }

    #[NoReturn] public function resetBot(): void
    {
        $this->multiPlayerService->resetBot();
        header('Location: ./', true, 301);
        exit;
    }
}