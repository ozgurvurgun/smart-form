<?php

namespace Smartlab\ParticipantForm\Core\Auth;

use Smartlab\ParticipantForm\Core\Helpers\Base64Helper;
use Smartlab\ParticipantForm\Core\Config\Config;

class JwtAuth
{
    private static ?string $secretKey = null;
    private static ?string $algorithm = null;
    private static ?int $expiration = null;

    private static function loadConfig(): void
    {
        if (self::$secretKey === null) {
            self::$secretKey = Config::get(['jwt', 'secret_key']);
            self::$algorithm = Config::get(['jwt', 'algorithm']);
            self::$expiration = Config::get(['jwt', 'expiration']);
        }
    }

    public static function generateToken(array $payload, ?int $expireInSeconds = null): string
    {
        self::loadConfig();
        $header = json_encode(['alg' => self::$algorithm, 'typ' => 'JWT']);

        if ($expireInSeconds === null) {
            $expireInSeconds = self::$expiration;
        }

        if ($expireInSeconds !== null) {
            $payload['exp'] = time() + $expireInSeconds;
        }

        $payload = json_encode($payload);

        $base64Header = Base64Helper::encode($header);
        $base64Payload = Base64Helper::encode($payload);
        $signature = hash_hmac('sha256', "$base64Header.$base64Payload", self::$secretKey, true);
        $base64Signature = Base64Helper::encode($signature);

        return "$base64Header.$base64Payload.$base64Signature";
    }

    public static function verifyToken(string $token): ?array
    {
        self::loadConfig();
        $parts = explode('.', $token);
        if (count($parts) !== 3) {
            return null;
        }

        [$header, $payload, $signature] = $parts;

        $expectedSignature = Base64Helper::encode(hash_hmac('sha256', "$header.$payload", self::$secretKey, true));

        if (!hash_equals($expectedSignature, $signature)) {
            return null;
        }

        $decodedPayload = json_decode(Base64Helper::decode($payload), true);

        if (isset($decodedPayload['exp']) && $decodedPayload['exp'] < time()) {
            return null;
        }

        return $decodedPayload;
    }

}
