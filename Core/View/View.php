<?php

namespace Smartlab\ParticipantForm\Core\View;

use Smartlab\ParticipantForm\Core\Exceptions\ErrorHandler;

class View
{
    public static function render(string $view, array $data = []): void
    {
        extract($data);
        $viewFile = __DIR__ . '/../../App/views/' . $view . '.php';

        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            ErrorHandler::sendError(404, "View file '{$view}.php' not found.");
        }
    }

    public static function renderToString(string $view, array $data = []): string
    {
        extract($data);
        $viewFile = __DIR__ . '/../../App/views/' . $view . '.php';

        if (!file_exists($viewFile)) {
            return "<h1>404 - View '{$view}.php' not found.</h1>";
        }

        ob_start();
        require $viewFile;
        return ob_get_clean();
    }
}
