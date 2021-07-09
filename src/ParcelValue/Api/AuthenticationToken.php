<?php

declare(strict_types=1);

namespace ParcelValue\Api;

use Firebase\JWT\JWT;

final class AuthenticationToken
{
    protected const ALGORITHM_HS256 = 'HS256';

    public static function generate(string $clientId, string $clientKey, string $serverKey): string
    {
        return JWT::encode(
            [
                'sub' => $clientId,
                'clientKey' => $clientKey,
            ], // payload PHP object or array
            $serverKey, // key The secret key.
            self::ALGORITHM_HS256, // alg The signing algorithm.
        );
    }

    public static function decode(string $string, string $serverKey): object
    {
        return JWT::decode(
            $string, // jwt The JWT
            $serverKey, // key The key, or map of keys.
            [self::ALGORITHM_HS256], // allowed_algs List of supported verification algorithms
        );
    }
}
