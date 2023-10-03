<?php

namespace App\Entity;

use App\Repository\LIEUDISPONIBILITERepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LIEUDISPONIBILITERepository::class)]
class LIEUDISPONIBILITE
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\OneToMany(mappedBy: 'fk_lieudisponibilite', targetEntity: PRODUIT::class)]
    private Collection $fk_produit;

    public function __construct()
    {
        $this->fk_produit = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, PRODUIT>
     */
    public function getFkProduit(): Collection
    {
        return $this->fk_produit;
    }

    public function addFkProduit(PRODUIT $fkProduit): static
    {
        if (!$this->fk_produit->contains($fkProduit)) {
            $this->fk_produit->add($fkProduit);
            $fkProduit->setFkLieudisponibilite($this);
        }

        return $this;
    }

    public function removeFkProduit(PRODUIT $fkProduit): static
    {
        if ($this->fk_produit->removeElement($fkProduit)) {
            // set the owning side to null (unless already changed)
            if ($fkProduit->getFkLieudisponibilite() === $this) {
                $fkProduit->setFkLieudisponibilite(null);
            }
        }

        return $this;
    }
}
