<?php

declare(strict_types=1);

namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Shipment extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    public const DATE_FORMAT = 'Y-m-d';
    public const SERVICE_ECONOMY = 'economy';
    public const SERVICE_EXPRESS = 'express';
    public const CURRENCY_EUR = 'EUR';
    public const TYPE = 'shipment';

    public function __construct(?string $id = null)
    {
        parent::__construct(self::TYPE);

        if (!$id) {
            return;
        }

        $this->setId($id);
    }

    public function getReference(): string
    {
        return (string) $this->getMeta('reference');
    }

    public function getService(): string
    {
        return (string) $this->getMeta('service');
    }

    public function getStatus(): int
    {
        return (int) $this->getMeta('status');
    }

    public function setService(string $service): bool
    {
        $this->setMeta('service', $service);
        return true;
    }

    public function setStatus(string $status): bool
    {
        $this->setMeta('status', (int) $status);
        return true;
    }
}
