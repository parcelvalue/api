<?php

declare(strict_types=1);

namespace ParcelValue\Api\Exceptions;

class JwtException extends ApiException
{
    public const CODE = 400;

    public function __construct(string $message, int $code = self::CODE, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
