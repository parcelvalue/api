<?php

declare(strict_types=1);

namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Rate extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    public const string TYPE = 'rate';

    public function __construct(?string $id = null)
    {
        parent::__construct(self::TYPE);

        if (!$id) {
            return;
        }

        $this->setId($id);
    }
}
