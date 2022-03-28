<?php

declare(strict_types=1);

namespace ParcelValue\Api\JsonApi\ResourceObjects;

class ShipmentSummary extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    public const TYPE = 'shipmentSummary';

    public function __construct(?string $id = null)
    {
        parent::__construct(self::TYPE);

        if (!$id) {
            return;
        }

        $this->setId($id);
    }
}
