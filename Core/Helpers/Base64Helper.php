<?php

namespace Smartlab\ParticipantForm\Core\Helpers;

class Base64Helper
{
    public static function encode(string $data): string
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
    }

    public static function decode(string $data): string
    {
        return base64_decode(str_replace(['-', '_'], ['+', '/'], $data));
    }
}
