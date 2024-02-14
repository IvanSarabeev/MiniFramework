<?php

session_start();

require_once __DIR__ . "/../vendor/autoload.php";

use app\core\Application;
use app\controllers\AppController;

$app = new Application(dirname(__DIR__));

//$app->router->get('/', 'home');

$app->router->get('/', [AppController::class, 'home']);
$app->router->get('/player', [AppController::class, 'player']);
$app->router->post('/player', [AppController::class, 'player']);
$app->router->get('/computer', [AppController::class, 'computer']);
$app->router->post('/computer', [AppController::class, 'computer']);

$app->run();