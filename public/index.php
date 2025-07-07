<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Smartlab\ParticipantForm\Core\Config\Config;
use Smartlab\ParticipantForm\Core\Http\Router;
use Smartlab\ParticipantForm\Core\Exceptions\ErrorHandler;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
Config::load();

$router = new Router();

require_once __DIR__ . '/../App/routes/web.php';
require_once __DIR__ . '/../App/routes/api.php';

$router->dispatch();

if (!$router->getHasRoute()) {
    ErrorHandler::sendError(404, "Page not found", $_SERVER['REQUEST_URI']);
}

