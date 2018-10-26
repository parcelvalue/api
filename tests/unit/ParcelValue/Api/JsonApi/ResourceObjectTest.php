<?php
namespace Tests\Api\JsonApi;

use PHPUnit\Framework\TestCase;

final class ResourceObjectTest extends TestCase
{
    /**
     * @test
     */
    public function constantTypeTestHasExpectedValue()
    {
        $this->assertEquals('test', \ParcelValue\Api\JsonApi\ResourceObject::TYPE_TEST);
    }

    /**
     * @test
     */
    public function constantTypeClientHasExpectedValue()
    {
        $this->assertEquals('test', \ParcelValue\Api\JsonApi\ResourceObject::TYPE_CLIENT);
    }
}
