<?php

namespace App\Entity;

use App\Repository\LISTESPORTRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LISTESPORTRepository::class)]
class LISTESPORT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $sport = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSport(): ?string
    {
        return $this->sport;
    }

    public function setSport(string $sport): static
    {
        $this->sport = $sport;

        return $this;
    }
}
