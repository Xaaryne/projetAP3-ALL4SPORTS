<?php

namespace App\Entity;

use App\Repository\ENTREPOTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/*Entité servant à gérer les entrepots*/
#[ORM\Entity(repositoryClass: ENTREPOTRepository::class)]
class ENTREPOT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'fk_entrepot', targetEntity: LIEUSTOCKAGE::class)]
    private Collection $fk_lieustockage;

    #[ORM\OneToMany(mappedBy: 'entrepot', targetEntity: LIEUSTOCKAGE::class)]
    private Collection $stockage;

    public function __construct()
    {
        $this->fk_lieustockage = new ArrayCollection();
        $this->stockage = new ArrayCollection();
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

    public function getFkLieustockage(): ?LIEUSTOCKAGE
    {
        return $this->fk_lieustockage;
    }

    public function setFkLieustockage(?LIEUSTOCKAGE $fk_lieustockage): static
    {
        $this->fk_lieustockage = $fk_lieustockage;

        return $this;
    }

    public function addFkLieustockage(LIEUSTOCKAGE $fkLieustockage): static
    {
        if (!$this->fk_lieustockage->contains($fkLieustockage)) {
            $this->fk_lieustockage->add($fkLieustockage);
            $fkLieustockage->setFkEntrepot($this);
        }

        return $this;
    }

    public function removeFkLieustockage(LIEUSTOCKAGE $fkLieustockage): static
    {
        if ($this->fk_lieustockage->removeElement($fkLieustockage)) {
            // set the owning side to null (unless already changed)
            if ($fkLieustockage->getFkEntrepot() === $this) {
                $fkLieustockage->setFkEntrepot(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LIEUSTOCKAGE>
     */
    public function getStockage(): Collection
    {
        return $this->stockage;
    }

    public function addStockage(LIEUSTOCKAGE $stockage): static
    {
        if (!$this->stockage->contains($stockage)) {
            $this->stockage->add($stockage);
            $stockage->setEntrepot($this);
        }

        return $this;
    }

    public function removeStockage(LIEUSTOCKAGE $stockage): static
    {
        if ($this->stockage->removeElement($stockage)) {
            // set the owning side to null (unless already changed)
            if ($stockage->getEntrepot() === $this) {
                $stockage->setEntrepot(null);
            }
        }

        return $this;
    }
}
