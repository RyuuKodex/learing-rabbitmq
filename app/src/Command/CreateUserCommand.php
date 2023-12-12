<?php

declare(strict_types=1);

namespace App\Command;

final readonly class CreateUserCommand
{
    public function __construct(
        private string $firstName,
        private string $surname,
        private string $email
    ) {}

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
