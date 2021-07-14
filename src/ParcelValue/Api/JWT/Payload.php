<?php

declare(strict_types=1);

namespace ParcelValue\Api\JWT;

/**
* An implementation of the object retuned by returned by Firebase\JWT\JWT::decode
*/
class Payload
{
    public string $sub;
    public string $clientKey;

    public function __construct(string $sub, string $clientKey)
    {
        $this->sub = $sub;
        $this->clientKey = $clientKey;
    }
}
