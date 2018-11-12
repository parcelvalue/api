<?php
namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Documents extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    const TYPE = 'documents';

    public function __construct($id)
    {
        parent::__construct();
        $this->setId($id);
        $this->setType(self::TYPE);
    }
}
