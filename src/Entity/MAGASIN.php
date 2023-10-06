<?php

namespace App\Entity;

use App\Repository\MAGASINRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MAGASINRepository::class)]
class MAGASIN
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $nom = null;



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

    public function getFkLieudisponibilite(): ?LIEUDISPONIBILITE
    {
        return $this->fk_lieudisponibilite;
    }

    public function setFkLieudisponibilite(?LIEUDISPONIBILITE $fk_lieudisponibilite): static
    {
        $this->fk_lieudisponibilite = $fk_lieudisponibilite;

        return $this;
    }
}
