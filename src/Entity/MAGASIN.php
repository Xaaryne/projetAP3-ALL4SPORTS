<?php

namespace App\Entity;

use App\Repository\MAGASINRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'fk_magasin', targetEntity: LIEUDISPONIBILITE::class)]
    private Collection $fk_lieudisponibilite;

    public function __construct()
    {
        $this->fk_lieudisponibilite = new ArrayCollection();
    }



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

    public function addFkLieudisponibilite(LIEUDISPONIBILITE $fkLieudisponibilite): static
    {
        if (!$this->fk_lieudisponibilite->contains($fkLieudisponibilite)) {
            $this->fk_lieudisponibilite->add($fkLieudisponibilite);
            $fkLieudisponibilite->setFkMagasin($this);
        }

        return $this;
    }

    public function removeFkLieudisponibilite(LIEUDISPONIBILITE $fkLieudisponibilite): static
    {
        if ($this->fk_lieudisponibilite->removeElement($fkLieudisponibilite)) {
            // set the owning side to null (unless already changed)
            if ($fkLieudisponibilite->getFkMagasin() === $this) {
                $fkLieudisponibilite->setFkMagasin(null);
            }
        }

        return $this;
    }
}
