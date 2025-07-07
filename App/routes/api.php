<?php

use Smartlab\ParticipantForm\Controllers\Api\ApiController;
use Smartlab\ParticipantForm\Controllers\Api\AuthController;
use Smartlab\ParticipantForm\Controllers\Api\CheckUpdate;

/** @var $router Smartlab\ParticipantForm\Core\Router\Router */

// API rotaları
$router->get('/api/hello', [ApiController::class, 'hello']);
$router->get('/check-update', [CheckUpdate::class, 'check']);

$router->post('/api/login', [AuthController::class, 'login']);