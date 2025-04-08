<?php

use Smartlab\ParticipantForm\Controllers\Web\HomeController;
use Smartlab\ParticipantForm\Controllers\Web\AuthController;
use Smartlab\ParticipantForm\Controllers\Web\DashboardController;

/** @var $router Smartlab\ParticipantForm\Core\Router\Router */

$router->get('/', [HomeController::class, 'index']);

$router->get('/user/{id}', [HomeController::class, 'showUser']);

$router->get('/page/{url}', [HomeController::class, 'showPage']);

$router->get('/resource/{uuid}/{id}', [HomeController::class, 'showResource']);

$router->get('/login', [AuthController::class, 'showLoginForm']);

$router->get('/logout', [AuthController::class, 'logout']);

$router->get('/dashboard', [DashboardController::class, 'index']); 

$router->get('/ask-the-ozgur', [AuthController::class, 'askToOzgur']); 

$router->get('/forms/{url}',[DashboardController::class, 'formEditor']);
