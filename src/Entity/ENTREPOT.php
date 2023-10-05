<?php

namespace App\Entity;

use App\Repository\ENTREPOTRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ENTREPOTRepository::class)]
class ENTREPOT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'fk_entrepot')]
    private ?LIEUSTOCKAGE $fk_lieustockage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getFkLieustockage(): ?LIEUSTOCKAGE
    {
        return $this->fk_lieustockage;
    }

    public function setFkLieustockage(?LIEUSTOCKAGE $fk_lieustockage): static
    {
        $this->fk_lieustockage = $fk_lieustockage;

        return $this;
    }
}
