<?php

namespace Smartlab\ParticipantForm\Core\Http;

class Response
{
    public static function json(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public static function text(string $message, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: text/plain');
        echo $message;
    }

    public static function html(string $htmlContent, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: text/html');
        echo $htmlContent;
    }

    public static function redirect(string $url, int $statusCode = 302): void
    {
        http_response_code($statusCode);
        header("Location: $url");
    }
}
