<?php

declare(strict_types=1);

namespace ParcelValue\Api\JWT;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
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
                new Key(
                    $serverKey,
                    self::ALGORITHM_HS256,
                ),
            );
        } catch (\Throwable $e) {
            throw new JwtException($e->getMessage(), $e->getCode(), $e);
        }

        if (!\property_exists($payload, 'sub') || !\property_exists($payload, 'clientKey')) {
            throw new JwtException('Token is missing required data.');
        }

        $sub = (string) $payload->sub;
        $clientKey = (string) $payload->clientKey;

        if (!$sub) {
            throw new JwtException('Invalid token part: "sub".');
        }

        if (!$clientKey) {
            throw new JwtException('Invalid token part: "clientKey".');
        }

        return new Payload($sub, $clientKey);
    }
}
