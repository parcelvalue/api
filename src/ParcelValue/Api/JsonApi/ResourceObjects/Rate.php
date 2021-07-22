<?php

declare(strict_types=1);

namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Rate extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    public const TYPE = 'rate';

    public function __construct(string $id)
    {
        parent::__construct(self::TYPE);

        $this->setId($id);
    }
}
