<?php

declare(strict_types=1);

namespace ParcelValue\Api\JsonApi\ResourceObjects;

class Documents extends \WebServCo\Api\JsonApi\AbstractResourceObject
{
    public const string TYPE = 'documents';

    public function __construct(string $id)
    {
        parent::__construct(self::TYPE);

        $this->setId($id);
    }
}
