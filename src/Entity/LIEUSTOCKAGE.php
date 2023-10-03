<?php

namespace App\Entity;

use App\Repository\LIEUSTOCKAGERepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LIEUSTOCKAGERepository::class)]
class LIEUSTOCKAGE
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }
}
