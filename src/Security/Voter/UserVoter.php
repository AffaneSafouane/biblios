<?php

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authorization\Voter\Vote;

class UserVoter extends Voter
{
    public const EDIT = 'USER_EDIT';
    public const VIEW = 'USER_VIEW';
    public const LIST = 'USER_LIST';
    public const DELETE = 'USER_DELETE';
    public const CREATE = 'USER_CREATE';

    public function __construct(private readonly Security $security)
    {
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        if ($attribute === self::CREATE) {
            return true;
        }

        return in_array($attribute, [self::EDIT, self::LIST , self::VIEW, self::DELETE])
            && $subject instanceof User;
    }

    /**
     * @param string $attribute
     * @param User|null $subject
     * @param TokenInterface $token
     * @param Vote|null $vote The vote context (added in Symfony 8.0)
     * @return bool
     */
    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token, ?Vote $vote = null): bool
    {
        $user = $token->getUser();

        // if the user is anonymous, do not grant access
        if (!$user instanceof User) {
            return false;
        }

        // ... (check conditions and return true to grant permission) ...
        return match ($attribute) {
            self::EDIT, self::VIEW, self::DELETE => $subject instanceof User
            && $user->getIsVerified() === true
            && $user === $subject,
            self::LIST => $subject instanceof User
            && $user->getIsVerified() === true
            && $this->security->isGranted("ROLE_ADMIN"),
            self::CREATE => $user->getIsVerified() === true
            && $this->security->isGranted("ROLE_ADMIN"),
            default => false,
        };
    }
}
