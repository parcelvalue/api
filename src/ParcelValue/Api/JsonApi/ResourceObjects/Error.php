<?php
namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Error extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    const TYPE = 'error';

    public function __construct()
    {
        parent::__construct();
        $this->setType(self::TYPE);
    }
}
