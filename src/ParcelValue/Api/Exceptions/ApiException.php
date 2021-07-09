<?php

declare(strict_types=1);

namespace ParcelValue\Api\Exceptions;

final class ApiException extends \WebServCo\Framework\Exceptions\ApplicationException
{
    const CODE = 0;

    public function __construct($message, \Exception $previous = null)
    {
        parent::__construct($message, self::CODE, $previous);
    }
}
