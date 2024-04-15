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

class ProxyCallbackControllerTest extends TestCase
{
    private $response;

    public function setUp(): void
    {
        parent::setUp();
        $this->response = $this->get(route('laravel-cas-proxy-callback'));
    }

    public function testIfNotFalse()
    {
        $this->assertNotFalse($this->response);
    }

    public function testIfXml()
    {
        $xml = '<?xml version="1.0" encoding="utf-8"?><proxySuccess xmlns="http://www.yale.edu/tp/casClient" />';
        $this->assertEquals($xml, $this->response->getContent());
    }
}
