<?php
namespace ParcelValue\Api\JsonApi;

final class ResourceObject extends \WebServCo\Api\JsonApi\AbstractResourceObject implements
    \WebServCo\Api\JsonApi\Interfaces\ResourceObjectInterface
{
    const TYPE_TEST = 'test';
    const TYPE_CLIENT = 'client';
}
