<?php

namespace Smartlab\ParticipantForm\Controllers\Web;

use Smartlab\ParticipantForm\Core\View\View;
use Smartlab\ParticipantForm\Core\Middleware\AuthMiddleware;
use Smartlab\ParticipantForm\Core\Auth\JwtAuth;

class DashboardController
{
    public function index(): void
    {
        AuthMiddleware::check('/login');

        $token = $_COOKIE['jwt_token'] ?? null;
        $user = JwtAuth::verifyToken($token);

        View::render('pages/dashboard', [
            'user' => $user
        ]);
    }

    public function formEditor(string $formId): void
    {
        AuthMiddleware::check('/login');
        View::render('pages/formEditor', [
            'formId' => $formId
        ]);
    }
}
