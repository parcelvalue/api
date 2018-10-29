<?php
namespace Tests\Api\JsonApi\ResourceObjects;

use PHPUnit\Framework\TestCase;

final class ClientTest extends TestCase
{
    /**
     * @test
     */
    public function constantTypeHasExpectedValue()
    {
        $this->assertEquals('client', \ParcelValue\Api\JsonApi\ResourceObjects\Client::TYPE);
    }
}
