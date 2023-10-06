<?php

namespace App\Entity;

use App\Repository\LIEUSTOCKAGERepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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


    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?PRODUIT $fk_produit = null;

    public function __construct()
    {
        $this->fk_produit = new ArrayCollection();
        $this->fk_entrepot = new ArrayCollection();
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
            $fkProduit->setFkLieustockage($this);
        }

        return $this;
    }

    public function removeFkProduit(PRODUIT $fkProduit): static
    {
        if ($this->fk_produit->removeElement($fkProduit)) {
            // set the owning side to null (unless already changed)
            if ($fkProduit->getFkLieustockage() === $this) {
                $fkProduit->setFkLieustockage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ENTREPOT>
     */
    public function getFkEntrepot(): Collection
    {
        return $this->fk_entrepot;
    }

    public function addFkEntrepot(ENTREPOT $fkEntrepot): static
    {
        if (!$this->fk_entrepot->contains($fkEntrepot)) {
            $this->fk_entrepot->add($fkEntrepot);
            $fkEntrepot->setFkLieustockage($this);
        }

        return $this;
    }

    public function removeFkEntrepot(ENTREPOT $fkEntrepot): static
    {
        if ($this->fk_entrepot->removeElement($fkEntrepot)) {
            // set the owning side to null (unless already changed)
            if ($fkEntrepot->getFkLieustockage() === $this) {
                $fkEntrepot->setFkLieustockage(null);
            }
        }

        return $this;
    }

    public function setFkProduit(?PRODUIT $fk_produit): static
    {
        $this->fk_produit = $fk_produit;

        return $this;
    }
}
