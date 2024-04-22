<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace Tests\Unit;

use EcPhp\CasLib\Contract\CasInterface;
use EcPhp\Ecas\Ecas;
use EcPhp\LaravelEcas\Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CasInterfaceTest extends TestCase
{
    private $response;

    public function testIfEcas()
    {
        $casInterface = app()->make(CasInterface::class);
        self::assertInstanceOf(Ecas::class, $casInterface);
    }
}
