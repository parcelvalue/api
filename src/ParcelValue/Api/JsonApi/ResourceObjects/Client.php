<?php

declare(strict_types=1);

namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Client extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    public const string TYPE = 'client';

    public function __construct(?string $id = null)
    {
        parent::__construct(self::TYPE);

        if (!$id) {
            return;
        }

        $this->setId($id);
    }
}
