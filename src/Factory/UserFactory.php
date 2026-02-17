<?php

namespace App\Factory;

use App\Entity\User;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @extends PersistentProxyObjectFactory<User>
 */
final class UserFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct(private readonly UserPasswordHasherInterface $hasher)
    {
        parent::__construct();
    }

    public static function class(): string
    {
        return User::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'email' => self::faker()->unique()->email(),
            'firstname' => self::faker()->firstName(),
            'lastname' => self::faker()->lastName(),
            'password' => $this->hasher->hashPassword(new User(), 'abcd1234!'),
            'roles' => [self::faker()->randomElement(['ROLE_USER', 'ROLE_MODERATEUR', 'ROLE_AJOUT_DE_LIVRE', 'ROLE_EDITION_DE_LIVRE'])],
            'isVerified' => self::faker()->boolean(50),
        ];
    }

    public function admin(): self
    {
        return $this->with([
            'email' => 'admin@email.com',
            'firstname' => 'Chef', // You can even hardcode these for the Admin...
            'lastname' => 'Admin',
            'password' => $this->hasher->hashPassword(new User(), 'admin1234!'),
            'roles' => ['ROLE_ADMIN'],
        ]);
    }

    public function standardUser(): self
    {
        return $this->with([
            'email' => 'user@email.com',
            'password' => $this->hasher->hashPassword(new User(), 'abcd1234!'),
            'roles' => ['ROLE_USER'],
        ]);
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(User $user): void {})
        ;
    }
}
