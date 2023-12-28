<?php

declare(strict_types=1);

namespace App\Application\Query;

use App\Application\Event\UserDataWasReceivedEvent;
use App\Domain\Entity\User;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Uid\Uuid;

#[AsMessageHandler]
final readonly class GetUserDataHandler
{
    public function __construct(private EventDispatcherInterface $eventDispatcher) {}

    public function __invoke(GetUserData $command): void
    {
        $user = new User(
            Uuid::fromString($command->getData()['id']),
            $command->getData()['firstName'],
            $command->getData()['surname'],
            $command->getData()['email']
        );

        $event = new UserDataWasReceivedEvent($user);
        $this->eventDispatcher->dispatch($event);
    }
}
