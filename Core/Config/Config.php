<?php

namespace Smartlab\ParticipantForm\Core\Config;

class Config
{
    private static array $config = [];

    public static function load(): void
    {
        self::$config = require __DIR__ . '/../../config/app.php';
    }

    public static function get(array $keys)
    {
        $value = self::$config;

        foreach ($keys as $key) {
            if (is_array($value) && isset($value[$key])) {
                $value = $value[$key];
            } else {
                return null;
            }
        }

        return $value;
    }
}
