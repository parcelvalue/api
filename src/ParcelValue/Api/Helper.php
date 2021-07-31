<?php

declare(strict_types=1);

namespace ParcelValue\Api;

use WebServCo\Api\JsonApi\Document;
use WebServCo\Framework\Http\CurlClient;
use WebServCo\Framework\Http\Method;
use WebServCo\Framework\Interfaces\LoggerInterface;
use WebServCo\Framework\Interfaces\ResponseInterface;

class Helper
{
    protected LoggerInterface $logger;
    protected CurlClient $curlClient;

    public function __construct(LoggerInterface $logger, string $jwt)
    {
        $this->logger = $logger;
        $this->curlClient = new CurlClient($this->logger);
        $this->curlClient->setRequestHeader('Accept', Document::CONTENT_TYPE);
        $this->curlClient->setRequestHeader('Authorization', \sprintf('Bearer %s', $jwt));
    }

    /**
    * @param array<string,mixed>|string $requestData
    */
    public function getResponse(string $url, string $method, $requestData): ResponseInterface
    {
        switch ($method) {
            case Method::POST:
                $this->curlClient->setRequestContentType(Document::CONTENT_TYPE);
                $this->curlClient->setRequestData($requestData);
                break;
            case Method::GET:
            case Method::HEAD:
                break;
            default:
                throw new \WebServCo\Framework\Exceptions\NotImplementedException('Functionality not implemented.');
        }
        $this->curlClient->setMethod($method);
        return $this->curlClient->retrieve($url);
    }
}
