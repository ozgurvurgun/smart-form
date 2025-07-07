<?php

namespace Smartlab\ParticipantForm\Controllers\Web;

use Smartlab\ParticipantForm\Core\Http\Response;
use Smartlab\ParticipantForm\Core\View\View;
use Smartlab\ParticipantForm\Core\Middleware\AuthMiddleware;

class AuthController
{
    public function showLoginForm(): void
    {
        AuthMiddleware::guestOnly();
        View::render('pages/login');
    }

    public function askToOzgur(): void {
        // AuthMiddleware::guestOnly();
        View::render('pages/ask-the-ozgur');
    }

    public function logout(): void
    {
        setcookie('jwt_token', '', time() - 3600, "/");
        Response::redirect('/login');
    }
}
