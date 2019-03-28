<?php
namespace ParcelValue\Api;

use WebServCo\Api\JsonApi\Document;
use WebServCo\Framework\Http\Method;

final class Helper
{
    protected $logger;
    protected $curlBrowser;

    public function __construct(
        \WebServCo\Framework\Interfaces\LoggerInterface $logger,
        $jwt,
        $environment //\WebServCo\Framework\Environment
    ) {
        $this->logger = $logger;
        $this->curlBrowser = new \WebServCo\Framework\CurlBrowser($this->logger);
        if (\WebServCo\Framework\Environment::ENV_DEV == $environment) {
            $this->curlBrowser->setSkipSSlVerification(true);
        }
        $this->curlBrowser->setRequestHeader('Accept', Document::CONTENT_TYPE);
        $this->curlBrowser->setRequestHeader('Authorization', sprintf('Bearer %s', $jwt));
    }

    public function getRequestHeaders()
    {
        return $this->curlBrowser->getRequestHeaders();
    }

    /*
    * @return \WebServCo\Framework\Http\Response
    */
    public function getResponse($url, $method, $requestData = null)
    {
        switch ($method) {
            case Method::POST:
                $this->curlBrowser->setRequestContentType(Document::CONTENT_TYPE);
                $this->curlBrowser->setRequestData($requestData);
                break;
            case Method::GET:
            case Method::HEAD:
                break;
            default:
                throw new \WebServCo\Framework\Exceptions\NotImplementedException('Functionality not implemented');
                break;
        }
        $this->curlBrowser->setMethod($method);
        return $this->curlBrowser->retrieve($url);
    }
}
