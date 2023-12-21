<?php

declare(strict_types=1);

namespace App\Message;

use App\Entity\User;
use App\Repository\UserRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class UserInfoHandler
{
    public function __construct(private UserRepositoryInterface $repository) {}

    public function __invoke(UserInfo $command): void
    {
        $user = new User(
            $command->getUser()->getId(),
            $command->getUser()->getFirstName(),
            $command->getUser()-> getSurname(),
            $command->getUser()->getEmail()
        );

        $this->repository->save($user);
    }
}
