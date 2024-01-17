<?php

namespace App\Entity;

use App\Repository\MAGASINRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/*Entité représentant les magasins*/
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

    #[ORM\OneToMany(mappedBy: 'magasin', targetEntity: LIEUDISPONIBILITE::class)]
    private Collection $disponibilite;

    public function __construct()
    {
        $this->fk_lieudisponibilite = new ArrayCollection();
        $this->disponibilite = new ArrayCollection();
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

    /**
     * @return Collection<int, LIEUDISPONIBILITE>
     */
    public function getDisponibilite(): Collection
    {
        return $this->disponibilite;
    }

    public function addDisponibilite(LIEUDISPONIBILITE $disponibilite): static
    {
        if (!$this->disponibilite->contains($disponibilite)) {
            $this->disponibilite->add($disponibilite);
            $disponibilite->setMagasin($this);
        }

        return $this;
    }

    public function removeDisponibilite(LIEUDISPONIBILITE $disponibilite): static
    {
        if ($this->disponibilite->removeElement($disponibilite)) {
            // set the owning side to null (unless already changed)
            if ($disponibilite->getMagasin() === $this) {
                $disponibilite->setMagasin(null);
            }
        }

        return $this;
    }
}
