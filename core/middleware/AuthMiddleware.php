<?php

namespace Smartlab\ParticipantForm\Core\Middleware;

use Smartlab\ParticipantForm\Core\Exceptions\AuthException;
use Smartlab\ParticipantForm\Core\Http\Response;
use Smartlab\ParticipantForm\Core\Auth\JwtAuth;

class AuthMiddleware
{
    public static function check(string|null $redirect = null): void
    {
        $token = $_COOKIE['jwt_token'] ?? null;

        if (!$token || !JwtAuth::verifyToken($token)) {
            if ($redirect) { //redirect path veriyorsan zaten get request atiyorsundur :,-)
                Response::redirect($redirect);
            } else {
                Response::json(['error' => 'Unauthorized', 'message' => 'You must log in.'], 401);
                return;
            } 
        }
    }

    public static function guestOnly(string $redirect = '/dashboard'): void
    {
        $token = $_COOKIE['jwt_token'] ?? null;

        if ($token && JwtAuth::verifyToken($token)) {
            Response::redirect($redirect);
        }
    }
}
