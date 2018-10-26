<?php
namespace Tests\Api\JsonApi;

use ParcelValue\Api\JsonApi\ResourceObject;
use PHPUnit\Framework\TestCase;

final class ResourceObjectTest extends TestCase
{
    /**
     * @test
     */
    public function constantTypeTestHasExpectedValue()
    {
        $this->assertEquals('test', ResourceObject::TYPE_TEST);
    }

    /**
     * @test
     */
    public function constantTypeClientHasExpectedValue()
    {
        $this->assertEquals('client', ResourceObject::TYPE_CLIENT);
    }
}
