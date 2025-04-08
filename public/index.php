<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Smartlab\ParticipantForm\Core\Config\Config;
use Smartlab\ParticipantForm\Core\Http\Router;
use Smartlab\ParticipantForm\Core\Exceptions\ErrorHandler;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
Config::load();

$router = new Router();

require_once __DIR__ . '/../app/routes/web.php';
require_once __DIR__ . '/../app/routes/api.php';

$router->dispatch();

if (!$router->getHasRoute()) {
    ErrorHandler::sendError(404, "Page not found", $_SERVER['REQUEST_URI']);
}

