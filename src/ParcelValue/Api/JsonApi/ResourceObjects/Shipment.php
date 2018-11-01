<?php
namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Shipment extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    const TYPE = 'shipment';
    const DATE_FORMAT = 'Y-m-d';

    public function __construct($id = null)
    {
        parent::__construct();
        $this->setId($id);
        $this->setType(self::TYPE);
    }
}
