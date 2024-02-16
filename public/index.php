<?php

require_once __DIR__ . "/../vendor/autoload.php";

session_start();

use app\controllers\HomeController;
use app\controllers\MultiPlayerContr;
use app\controllers\SinglePlayerContr;
use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [HomeController::class, 'home']);
$app->router->get('/player', [SinglePlayerContr::class, 'player']);
$app->router->post('/player', [SinglePlayerContr::class, 'player']);
$app->router->get('/computer', [MultiPlayerContr::class, 'computer']);
$app->router->post('/computer', [MultiPlayerContr::class, 'computer']);
$app->router->get('/reset', [HomeController::class, 'reset']);

$app->run();