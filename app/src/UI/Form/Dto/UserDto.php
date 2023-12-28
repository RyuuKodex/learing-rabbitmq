<?php

declare(strict_types=1);

namespace App\UI\Form\Dto;

use Symfony\Component\Validator\Constraints as Assert;

final class UserDto
{
    #[Assert\NotBlank]
    private string $firstName;
    #[Assert\NotBlank]
    private string $surname;
    #[Assert\NotBlank]
    #[Assert\Email]
    private string $email;

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
