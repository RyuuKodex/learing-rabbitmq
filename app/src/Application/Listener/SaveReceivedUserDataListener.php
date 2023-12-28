<?php

declare(strict_types=1);

namespace App\Application\Listener;

use App\Application\Event\UserDataWasReceivedEvent;
use App\Infrastructure\Repository\UserRepositoryInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener(event: UserDataWasReceivedEvent::class)]
final readonly class SaveReceivedUserDataListener
{
    public function __construct(private UserRepositoryInterface $repository) {}

    public function __invoke(UserDataWasReceivedEvent $event): void
    {
        $this->repository->save($event->getUser());
    }
}
