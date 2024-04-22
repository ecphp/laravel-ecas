<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace Tests\Unit;

use EcPhp\LaravelEcas\Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class ProxyCallBackControllerTest extends TestCase
{
    private $response;

    protected function setUp(): void
    {
        parent::setUp();
        $this->response = $this->get(route('laravel-cas-proxy-callback'));
    }

    public function testIfNotFalse()
    {
        self::assertNotFalse($this->response);
    }

    public function testIfXml()
    {
        $xml = '<?xml version="1.0" encoding="utf-8"?><proxySuccess xmlns="http://www.yale.edu/tp/casClient" />';
        self::assertEquals($xml, $this->response->getContent());
    }
}
