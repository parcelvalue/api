<?php

declare(strict_types=1);

namespace Tests\Api;

use ParcelValue\Api\JWT\Helper;
use PHPUnit\Framework\TestCase;

final class HelperTest extends TestCase
{
    private const string CLIENT_ID = '1';
    private const string CLIENT_KEY = 'foo';
    private const string SERVER_KEY = 'bar';

    private static string $jwt;

    /**
     * @test
     */
    public function generateReturnsExpectedValue(): void
    {
        $this->assertEquals(
            self::$jwt,
            Helper::generate(self::CLIENT_ID, self::CLIENT_KEY, self::SERVER_KEY),
        );
    }

    /**
     * @test
     */
    public function decodeReturnsExpectedValue(): void
    {
        $token = Helper::decode(self::$jwt, self::SERVER_KEY);
        $this->assertTrue($token instanceof \ParcelValue\Api\JWT\Payload);
        $this->assertEquals(self::CLIENT_ID, $token->sub);
        $this->assertEquals(self::CLIENT_KEY, $token->clientKey);
    }

    public static function setUpBeforeClass(): void
    {
        self::$jwt = \sprintf(
            '%s.%s.%s',
            'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9',
            'eyJzdWIiOiIxIiwiY2xpZW50S2V5IjoiZm9vIn0',
            '0aAijrPmrMnihsrVkW_YKm8rnGmG4IvBcacjRyYj7nw',
        );
    }
}
