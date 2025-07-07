<?php

namespace Smartlab\ParticipantForm\Core\Exceptions;

use Smartlab\ParticipantForm\Core\View\View;
use Smartlab\ParticipantForm\Core\Http\Response;

class ErrorHandler
{
    public static function sendError(int $statusCode, string $message, string $path = '')
    {
        http_response_code($statusCode);

        $config = require __DIR__ . '/../../config/app.php';
        $isApiRequest = self::isApiRequest();

        $errorConfig = $isApiRequest ? $config['error_handling']['api'] : $config['error_handling']['web'];

        switch ($errorConfig['response_type']) {
            case 'json':
                Response::json([
                    'error' => $message,
                    'status' => $statusCode,
                    'path' => $path
                ], $statusCode);
                break;
            case 'text':
                Response::text("[$statusCode] $message: $path", $statusCode);
                break;
            case 'view':
            default:
                $htmlContent = View::renderToString($errorConfig['view_path'], [
                    'statusCode' => $statusCode,
                    'message' => $message,
                    'path' => $path
                ]);
                Response::html($htmlContent, $statusCode);
                break;
        }
    }

    private static function isApiRequest(): bool
    {
        return strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false;
    }
}
