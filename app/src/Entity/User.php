<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    public function __construct(
        #[ORM\Id]
        #[ORM\Column(type: 'uuid')]
        private readonly Uuid $id,
        #[ORM\Column(length: 255)]
        private readonly string $firstName,
        #[ORM\Column(length: 255)]
        private readonly string $surname,
        #[ORM\Column(length: 255)]
        private readonly string $email
    ) {}

    public function getId(): Uuid
    {
        return $this->id;
    }

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
