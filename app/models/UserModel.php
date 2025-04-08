<?php

namespace Smartlab\ParticipantForm\Models;

use Smartlab\ParticipantForm\Core\Database\Database;

class UserModel
{
    public static function getUserById(int $id): ?array
    {
        $result = Database::queryExec("SELECT * FROM users WHERE id = :id LIMIT 1", ['id' => $id]);
        return $result[0] ?? null;
    }
}
