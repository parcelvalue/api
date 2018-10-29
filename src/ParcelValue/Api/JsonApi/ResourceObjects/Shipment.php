<?php
namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Shipment extends \ParcelValue\Api\JsonApi\ResourceObject
{
    public function __construct($id = null)
    {
        parent::__construct();
        $this->setId($id);
        $this->setType(self::TYPE_SHIPMENT);
    }
}
