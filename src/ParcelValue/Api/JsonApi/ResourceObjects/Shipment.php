<?php

declare(strict_types=1);

namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Shipment extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    public const string DATE_FORMAT = 'Y-m-d';
    public const string SERVICE_ECONOMY = 'economy';
    public const string SERVICE_EXPRESS = 'express';
    public const string CURRENCY_EUR = 'EUR';
    public const string TYPE = 'shipment';

    public function __construct(?string $id = null)
    {
        parent::__construct(self::TYPE);

        if (!$id) {
            return;
        }

        $this->setId($id);
    }

    public function getCarrierChoice(): ?string
    {
        return (string) $this->getMeta('carrierChoice');
    }

    public function getReference(): string
    {
        return (string) $this->getMeta('reference');
    }

    public function getScheduledProcessing(): bool
    {
        return (bool) $this->getMeta('scheduledProcessing');
    }

    public function getService(): string
    {
        return (string) $this->getMeta('service');
    }

    public function getStatus(): int
    {
        return (int) $this->getMeta('status');
    }

    public function setCarrierChoice(string $carrierChoice): bool
    {
        $this->setMeta('carrierChoice', $carrierChoice);
        return true;
    }

    public function setScheduledProcessing(bool $scheduledProcessing): bool
    {
        $this->setMeta('scheduledProcessing', $scheduledProcessing);
        return true;
    }

    public function setService(string $service): bool
    {
        $this->setMeta('service', $service);
        return true;
    }

    public function setStatus(int $status): bool
    {
        $this->setMeta('status', $status);
        return true;
    }
}
