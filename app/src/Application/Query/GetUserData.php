<?php

declare(strict_types=1);

namespace App\Application\Query;

use App\Domain\Entity\User;

final readonly class GetUserData
{
    /** @param mixed[] $data */
    public function __construct(private array $data) {}

    /** @return mixed[] */
    public function getData(): array
    {
        return $this->data;
    }
}
