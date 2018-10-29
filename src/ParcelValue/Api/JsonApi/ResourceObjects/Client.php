<?php
namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Client extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    const TYPE = 'client';

    public function __construct($id = null)
    {
        parent::__construct();
        $this->setId($id);
        $this->setType(self::TYPE);
    }
}
