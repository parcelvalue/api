<?php

declare(strict_types=1);

namespace Tests\Api\JsonApi\ResourceObjects;

use PHPUnit\Framework\TestCase;

final class ShipmentTest extends TestCase
{
    /**
     * @test
     */
    public function constantTypeHasExpectedValue(): void
    {
        $this->assertEquals('shipment', \ParcelValue\Api\JsonApi\ResourceObjects\Shipment::TYPE);
    }
}
