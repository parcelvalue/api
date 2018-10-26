<?php
namespace Tests\Api;

use ParcelValue\Api\AuthenticationToken;
use PHPUnit\Framework\TestCase;

final class AuthenticationTokenTest extends TestCase
{
    const JWT = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9'
    .'.eyJzdWIiOiIxIiwiY2xpZW50S2V5IjoiZm9vIn0.0aAijrPmrMnihsrVkW_YKm8rnGmG4IvBcacjRyYj7nw';
    const CLIENT_ID = '1';
    const CLIENT_KEY = 'foo';
    const SERVER_KEY = 'bar';

    /**
     * @test
     */
    public function generateReturnsExpectedValue()
    {
        $this->assertEquals(
            self::JWT,
            AuthenticationToken::generate(self::CLIENT_ID, self::CLIENT_KEY, self::SERVER_KEY)
        );
    }

    /**
     * @test
     */
    public function decodeReturnsExpectedValue()
    {
        $token = AuthenticationToken::decode(self::JWT, self::SERVER_KEY);
        $this->assertTrue(
            $token instanceof \stdClass
        );
        $this->assertEquals(self::CLIENT_ID, $token->sub);
        $this->assertEquals(self::CLIENT_KEY, $token->clientKey);
    }
}
