<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace EcPhp\LaravelEcas\Auth;

use EcPhp\LaravelCas\Auth\CasUserProvider;
use EcPhp\LaravelEcas\Auth\User\EcasUser;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

final class EcasUserProvider implements UserProvider
{
    public function __construct(
        private CasUserProvider $casUserProvider
    ) {}

    public function retrieveByCredentials(array $credentials): ?Authenticatable
    {
        $maybeUser = $this->casUserProvider->retrieveByCredentials($credentials);

        if (null === $maybeUser) {
            return null;
        }

        return new EcasUser($maybeUser);
    }

    public function retrieveById($identifier)
    {
        return null;
    }

    public function retrieveByToken($identifier, $token)
    {
        return null;
    }

    public function retrieveCasUser(): ?Authenticatable
    {
        return $this->casUserProvider->retrieveCasUser();
    }

    public function updateRememberToken(Authenticatable $user, $token) {}

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return true;
    }
}
