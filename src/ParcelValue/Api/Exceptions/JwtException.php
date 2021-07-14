<?php

declare(strict_types=1);

namespace ParcelValue\Api\Exceptions;

class JwtException extends ApiException
{
    public function __construct(string $message, ?\Throwable $previous = null)
    {
        parent::__construct($message, $previous);
    }
}
