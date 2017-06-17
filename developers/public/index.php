<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

session_start();

require '../vendor/autoload.php';

require '../app/class/ChangeString.php';
require '../app/class/CompleteRange.php';
require '../app/class/ClearPar.php';
require '../app/class/DeveloperSa.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

require('../app/container.php');

$app->get('/', \App\Controllers\PagesController::class . ':home')->setName('home');
$app->get('/empl', \App\Controllers\PagesController::class . ':getEmpleado')->setName('empleado');
$app->post('/empl', \App\Controllers\PagesController::class . ':postEmpleado');
$app->post('/detalle', \App\Controllers\PagesController::class . ':getEmpleadoDetalle')->setName('detalle');

$app->get('/ejer', \App\Controllers\PagesController::class . ':getEjercicios')->setName('ejercicios');
$app->post('/ejer', \App\Controllers\PagesController::class . ':postEjercicios');
$app->run();
