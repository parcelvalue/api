<?php

declare(strict_types=1);

namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Test extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    public const TYPE = 'test';

    public function __construct(?string $id = null)
    {
        parent::__construct();

        if ($id) {
            $this->setId($id);
        }
        $this->setType(self::TYPE);
    }
}
