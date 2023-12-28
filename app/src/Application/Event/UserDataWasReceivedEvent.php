<?php

declare(strict_types=1);

namespace App\Application\Event;

use App\Domain\Entity\User;
use Symfony\Contracts\EventDispatcher\Event;

final class UserDataWasReceivedEvent extends Event
{
    public function __construct(private readonly User $user) {}

    public function getUser(): User
    {
        return $this->user;
    }
}
