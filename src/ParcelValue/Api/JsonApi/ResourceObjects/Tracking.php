<?php

declare(strict_types=1);

namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Tracking extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    public const TYPE = 'tracking';

    public function __construct(string $id)
    {
        parent::__construct(self::TYPE);

        $this->setId($id);
    }
}
