<?php

declare(strict_types=1);

namespace Tests\Api\JsonApi\ResourceObjects;

use PHPUnit\Framework\TestCase;

final class ClientTest extends TestCase
{
    /**
     * @test
     */
    public function constantTypeHasExpectedValue(): void
    {
        $this->assertEquals('client', \ParcelValue\Api\JsonApi\ResourceObjects\Client::TYPE);
    }
}
