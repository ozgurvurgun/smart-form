<?php

namespace Smartlab\ParticipantForm\Core\Database;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $db = null;

    private function __construct() {}

    public static function getConnection(): PDO
    {
        if (self::$db === null) {
            $hostname = $_ENV['DATABASE_HOST'];
            $username = $_ENV['DATABASE_USERNAME'];
            $password = $_ENV['DATABASE_PASSWORD'];
            $databaseName = $_ENV['DATABASE_NAME'];
            $charset = $_ENV['DATABASE_CHARSET'];

            try {
                self::$db = new PDO(
                    "mysql:host=$hostname;dbname=$databaseName;charset=$charset",
                    $username,
                    $password,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
                );
            } catch (PDOException $e) {
                die('<pre><span style="color:red">CONNECTION ERROR: </span>' . $e->getMessage() . '</pre>');
            }
        }
        return self::$db;
    }

    public static function queryExec(string $query, array $params = []): array
    {
        $stmt = self::getConnection()->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
