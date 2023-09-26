<?php

namespace App\Entity;

use App\Repository\ENFANTSRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ENFANTSRepository::class)]
class ENFANTS
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $age = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }
}
