<?php

declare(strict_types=1);

namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Address extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    public const TYPE = 'address';

    public function __construct(string $id)
    {
        parent::__construct(self::TYPE);

        $this->setId($id);
    }
}
