<?php
namespace Tests\Api\JsonApi\ResourceObjects;

use PHPUnit\Framework\TestCase;

final class ErrorTest extends TestCase
{
    /**
     * @test
     */
    public function constantTypeHasExpectedValue()
    {
        $this->assertEquals('error', \ParcelValue\Api\JsonApi\ResourceObjects\Error::TYPE);
    }
}
