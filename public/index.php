<?php

session_start();

require_once __DIR__ . "/../vendor/autoload.php";

use app\controllers\HomeController;
use app\controllers\MultyPlayerContr;
use app\controllers\SinglePlayerContr;
use app\core\Application;
use app\controllers\AbstractGameController;

$app = new Application(dirname(__DIR__));

//$app->router->get('/', 'home');

$app->router->get('/', [HomeController::class, 'home']);
$app->router->get('/player', [SinglePlayerContr::class, 'player']);
$app->router->post('/player', [SinglePlayerContr::class, 'player']);
$app->router->get('/computer', [MultyPlayerContr::class, 'computer']);
$app->router->post('/computer', [MultyPlayerContr::class, 'computer']);

$app->run();