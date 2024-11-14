<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace EcPhp\LaravelEcas\Tests;

use EcPhp\LaravelCas\Providers\AppServiceProvider;
use EcPhp\LaravelEcas\Providers\LaravelEcasProvider;
use EcPhp\LaravelEcas\Tests\Providers\LaravelCasProvider;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

use function dirname;

/**
 * @internal
 */
abstract class TestCase extends OrchestraTestCase
{
    /**
     * Get application package providers.
     *
     * @param  Application $app
     *
     * @return list<class-string>
     */
    protected function getPackageProviders($app): array
    {
        $config = include dirname(__DIR__) . '/vendor/ecphp/laravel-cas/src/publishers/config/laravel-cas.php';
        config(['laravel-cas' => $config]);

        return [
            AppServiceProvider::class,
            LaravelCasProvider::class,
            LaravelEcasProvider::class,
        ];
    }
}
