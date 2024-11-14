<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace EcPhp\LaravelEcas\Auth\User;

use EcPhp\LaravelCas\Auth\User\CasUser;
use Illuminate\Contracts\Auth\Authenticatable;

use function array_key_exists;

final class EcasUser implements Authenticatable
{
    public function __construct(private CasUser $user) {}

    public function __toString(): string
    {
        return $this->user->__toString();
    }

    public function get(string $key, $default = null)
    {
        return $this->user->get($key, $default);
    }

    public function getAssuranceLevel(): ?string
    {
        return $this->user->getAttribute('assuranceLevel');
    }

    public function getAttribute(string $key, $default = null)
    {
        return $this->user->getAttribute($key, $default);
    }

    public function getAttributes(): array
    {
        return $this->user->getAttributes();
    }

    public function getAuthIdentifier(): string
    {
        return $this->user->getAuthIdentifier();
    }

    public function getAuthIdentifierName(): string
    {
        return $this->user->getAuthIdentifier();
    }

    public function getAuthPassword(): ?string
    {
        return null;
    }

    public function getAuthPasswordName() {}

    public function getDepartmentNumber(): ?string
    {
        return $this->user->getAttribute('departmentNumber');
    }

    public function getEmail(): ?string
    {
        return $this->user->getAttribute('email');
    }

    public function getFirstName(): ?string
    {
        return $this->user->getAttribute('firstName');
    }

    public function getGroups(): array
    {
        $attributes = $this->getAttributes();

        if (!array_key_exists('groups', $attributes)) {
            return [];
        }

        return $attributes['groups'];
    }

    public function getLastName(): ?string
    {
        return $this->user->getAttribute('lastName');
    }

    public function getLocale(): ?string
    {
        return $this->user->getAttribute('locale');
    }

    public function getLoginDate(): ?string
    {
        return $this->user->getAttribute('authenticationDate');
    }

    public function getOrgId(): ?string
    {
        return $this->user->getAttribute('orgId');
    }

    public function getPassword(): ?string
    {
        return null;
    }

    public function getPgt(): ?string
    {
        return $this->user->getPgt();
    }

    public function getProxyGrantingProtocol(): ?string
    {
        return $this->user->getAttribute('proxyGrantingProtocol');
    }

    public function getRememberToken(): ?string
    {
        return null;
    }

    public function getRememberTokenName(): ?string
    {
        return null;
    }

    public function getRoles(): array
    {
        $default = ['ROLE_CAS_AUTHENTICATED'];

        return array_merge($this->getGroups(), $default);
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function getSso(): ?string
    {
        return $this->user->getAttribute('sso');
    }

    public function getStrengths(): array
    {
        $attributes = $this->getAttributes();

        if (!array_key_exists('strengths', $attributes)) {
            return [];
        }

        $strengths = $attributes['strengths'];

        return (array) $strengths;
    }

    public function getTelephoneNumber(): ?string
    {
        return $this->user->getAttribute('telephoneNumber');
    }

    public function getTeleworkingPriority(): ?bool
    {
        return $this->user->getAttribute('teleworkingPriority');
    }

    public function getTicketType(): ?string
    {
        return $this->user->getAttribute('ticketType');
    }

    public function getTimeZone(): ?string
    {
        return $this->user->getAttribute('timeZone');
    }

    public function getUid(): ?string
    {
        return $this->user->getAttribute('uid');
    }

    public function getUserManager(): ?string
    {
        return $this->user->getAttribute('userManager');
    }

    public function setRememberToken($value): void {}
}
