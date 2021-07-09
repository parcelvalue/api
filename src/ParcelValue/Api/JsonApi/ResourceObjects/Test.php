<?php

declare(strict_types=1);

namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Test extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    const TYPE = 'test';

    public function __construct($id = null)
    {
        parent::__construct();
        $this->setId($id);
        $this->setType(self::TYPE);
    }
}
