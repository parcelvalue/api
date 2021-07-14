<?php

declare(strict_types=1);

namespace ParcelValue\Api\JWT;

use Firebase\JWT\JWT;
use ParcelValue\Api\Exceptions\JwtException;

final class Helper
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

    public static function decode(string $jwt, string $serverKey): Payload
    {
        try {
            $payload = JWT::decode(
                $jwt, // jwt The JWT
                $serverKey, // key The key, or map of keys.
                [self::ALGORITHM_HS256], // allowed_algs List of supported verification algorithms
            );
        } catch (\Throwable $e) {
            throw new JwtException($e->getMessage(), $e);
        }

        if (!\property_exists($payload, 'sub') || !\property_exists($payload, 'clientKey')) {
            throw new JwtException('Token is missing required data.');
        }

        return new Payload($payload->sub, $payload->clientKey);
    }
}
