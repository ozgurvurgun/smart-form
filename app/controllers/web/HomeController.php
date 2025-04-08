<?php

namespace Smartlab\ParticipantForm\Controllers\Web;

use Smartlab\ParticipantForm\Core\View\View;
use Smartlab\ParticipantForm\Models\UserModel;

class HomeController
{
    public function index()
    {
        $user = UserModel::getUserById(1); // ID=1 user

        View::render('home/hello', [
            'name' => $user['name'] ?? 'Misafir',
            'message' => 'Hoşgeldin, ' . $_ENV['APP_NAME'] . '!'
        ]);
    }

    public function showUser(int $id)
    {
        View::render('home/user', [
            'id' => $id,
            'message' => "Kullanıcı ID: $id"
        ]);
    }

    public function showPage(string $url)
    {
        View::render('home/page', [
            'url' => $url,
            'message' => "Sayfa Slug: $url"
        ]);
    }

    public function showResource(string $uuid, string $id)
    {
        echo "<h1>$id</h1>";
        View::render('home/resource', [
            'uuid' => $uuid,
            'message' => "Kaynak UUID: $uuid"
        ]);
    }
}
