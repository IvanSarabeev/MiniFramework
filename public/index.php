<?php

require_once __DIR__ . "/../vendor/autoload.php";

session_start();

use app\controllers\HomeController;
use app\controllers\MultiPlayerContr;
use app\controllers\SinglePlayerContr;
use app\core\Singleton;

$singleApp = Singleton::getInstance(dirname(__DIR__));

$singleApp->router->get('/', [HomeController::class, 'home']);
$singleApp->router->get('/reset', [HomeController::class, 'reset']);
$singleApp->router->get('/reset-bot', [HomeController::class, 'resetBot']);
$singleApp->router->get('/player', [SinglePlayerContr::class, 'player']);
$singleApp->router->post('/player', [SinglePlayerContr::class, 'player']);
$singleApp->router->get('/computer', [MultiPlayerContr::class, 'computer']);
$singleApp->router->post('/computer', [MultiPlayerContr::class, 'computer']);

$singleApp->run();
