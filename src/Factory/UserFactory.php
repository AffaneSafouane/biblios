<?php

namespace App\Factory;

use App\Entity\User;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @extends PersistentObjectFactory<User>
 */
final class UserFactory extends PersistentObjectFactory
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
            'password' => $this->hasher->hashPassword(new User(), 'Abcd1234!'),
            'roles' => [self::faker()->randomElement(['ROLE_USER', 'ROLE_MODERATEUR', 'ROLE_AJOUT_DE_LIVRE', 'ROLE_EDITION_DE_LIVRE'])],
            'isVerified' => true,
        ];
    }

    public function admin(): self
    {
        return $this->with([
            'email' => 'admin@email.com',
            'firstname' => 'Chef', 
            'lastname' => 'Admin',
            'password' => $this->hasher->hashPassword(new User(), 'Admin1234!'),
            'roles' => ['ROLE_ADMIN'],
            'isVerified' => true,
        ]);
    }

    public function standardUser(): self
    {
        return $this->with([
            'email' => 'user@email.com',
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
