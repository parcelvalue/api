<?php

declare(strict_types=1);

namespace ParcelValue\Api\Exceptions;

class ApiException extends \WebServCo\Framework\Exceptions\ApplicationException
{
    public const int CODE = 400;

    public function __construct(string $message, int $code = self::CODE, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
