<?php
namespace ParcelValue\Api\JsonApi;

class ResourceObject extends \WebServCo\Api\JsonApi\AbstractResourceObject implements
    \WebServCo\Api\JsonApi\Interfaces\ResourceObjectInterface
{
    const TYPE_TEST = 'test';
    const TYPE_CLIENT = 'client';
    const TYPE_SHIPMENT = 'shipment';
}
