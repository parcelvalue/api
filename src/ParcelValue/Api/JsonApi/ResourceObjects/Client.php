<?php

declare(strict_types=1);

namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Client extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    public const TYPE = 'client';

    public function __construct(?string $id = null)
    {
        parent::__construct();

        if ($id) {
            $this->setId($id);
        }
        $this->setType(self::TYPE);
    }
}
