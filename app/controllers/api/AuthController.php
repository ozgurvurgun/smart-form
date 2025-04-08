<?php

namespace Smartlab\ParticipantForm\Controllers\Api;

use Smartlab\ParticipantForm\Core\Auth\JwtAuth;
use Smartlab\ParticipantForm\Core\Config\Config;
use Smartlab\ParticipantForm\Core\Http\Response;

class AuthController
{
    private array $users = [
        ['username' => 'admin', 'password' => '1234', 'name' => 'Admin User'],
        ['username' => 'ozgur', 'password' => 'qwerty', 'name' => 'Özgür Vurgun']
    ];

    public function login(): void
    {
        $input = json_decode(file_get_contents("php://input"), true);
        $username =  $input['username'] ?? null;
        $password =  $input['password'] ?? null;

        foreach ($this->users as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {

                $token = JwtAuth::generateToken([
                    'username' => $user['username'],
                    'name' => $user['name']
                ], Config::get(['jwt', 'expiration']));

                setcookie('jwt_token', $token, [
                    'expires' => time() + Config::get(['jwt', 'expiration']),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => true,
                    'samesite' => 'Lax'
                ]);

                Response::json(['message' => 'success']);
                return;
            }
        }

        Response::json(['message' => 'wrong']);
    }
}
