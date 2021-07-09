<?php

declare(strict_types=1);

namespace Tests\Api\JsonApi\ResourceObjects;

use PHPUnit\Framework\TestCase;

final class TestTest extends TestCase
{
    /**
     * @test
     */
    public function constantTypeHasExpectedValue()
    {
        $this->assertEquals('test', \ParcelValue\Api\JsonApi\ResourceObjects\Test::TYPE);
    }
}
