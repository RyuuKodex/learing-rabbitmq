<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function save(User $entity): void;
}
