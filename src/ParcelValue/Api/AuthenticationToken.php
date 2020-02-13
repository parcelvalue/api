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
            ], // $payload    PHP object or array
            $serverKey, // key        The secret key.
            self::ALGORITHM_HS256 // $alg        The signing algorithm.
        );
    }

    public static function decode($string, $serverKey)
    {
        return JWT::decode(
            $string, // $jwt            The JWT
            $serverKey, // $key            The key, or map of keys.
            [self::ALGORITHM_HS256] // $allowed_algs   List of supported verification algorithms
        );
    }
}
