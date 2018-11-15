<?php
namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Shipment extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    const TYPE = 'shipment';
    const DATE_FORMAT = 'Y-m-d';
    const SERVICE_ECONOMY = 'economy';
    const SERVICE_EXPRESS = 'express';
    const CURRENCY_EUR = 'EUR';

    public function __construct($id = null)
    {
        parent::__construct();
        $this->setId($id);
        $this->setType(self::TYPE);
    }

    public function getReference()
    {
        return $this->getMeta('reference');
    }

    public function getService()
    {
        return $this->getMeta('service');
    }

    public function getStatus()
    {
        return $this->getMeta('status');
    }

    public function setService($service)
    {
        $this->setMeta('service', $service);
        return true;
    }

    public function setStatus($status)
    {
        $this->setMeta('status', (int) $status);
        return true;
    }
}
