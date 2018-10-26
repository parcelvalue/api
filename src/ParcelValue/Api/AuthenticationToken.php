<?php
namespace ParcelValue\Api;

use Firebase\JWT\JWT;

final class AuthenticationToken
{
    const ALGORITHM_HS256 = 'HS256';

    public static function generate($clientId, $clientKey, $serverKey)
    {
        return JWT::encode(
            [
                'sub' => $clientId,
                'clientKey' => $clientKey,
            ],
            $serverKey,
            self::ALGORITHM_HS256
        );
    }

    public static function decode($string, $serverKey)
    {
        return JWT::decode(
            $string,
            $serverKey,
            [self::ALGORITHM_HS256]
        );
    }
}
