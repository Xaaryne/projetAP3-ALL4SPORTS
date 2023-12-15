<?php

namespace App\Entity;

use App\Repository\LISTESPORTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'fk_listesport', targetEntity: CLIENTSPORT::class)]
    private Collection $fk_clientsport;

    #[ORM\OneToMany(mappedBy: 'fk_listesport', targetEntity: PRODUIT::class)]
    private Collection $fk_produits;






    public function __construct()
    {
        $this->fk_clientsport = new ArrayCollection();
        $this->fk_produit = new ArrayCollection();
        $this->fk_produits = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, CLIENTSPORT>
     */
    public function getFkClientsport(): Collection
    {
        return $this->fk_clientsport;
    }

    public function addFkClientsport(CLIENTSPORT $fkClientsport): static
    {
        if (!$this->fk_clientsport->contains($fkClientsport)) {
            $this->fk_clientsport->add($fkClientsport);
            $fkClientsport->setFkListesport($this);
        }

        return $this;
    }

    public function removeFkClientsport(CLIENTSPORT $fkClientsport): static
    {
        if ($this->fk_clientsport->removeElement($fkClientsport)) {
            // set the owning side to null (unless already changed)
            if ($fkClientsport->getFkListesport() === $this) {
                $fkClientsport->setFkListesport(null);
            }
        }

        return $this;
    }

    public function getFkProduit(): ?PRODUIT
    {
        return $this->fk_produit;
    }

    public function setFkProduit(?PRODUIT $fk_produit): static
    {
        $this->fk_produit = $fk_produit;

        return $this;
    }

    public function addFkProduit(PRODUIT $fkProduit): static
    {
        if (!$this->fk_produit->contains($fkProduit)) {
            $this->fk_produit->add($fkProduit);
            $fkProduit->setFkListesport($this);
        }

        return $this;
    }

    public function removeFkProduit(PRODUIT $fkProduit): static
    {
        if ($this->fk_produit->removeElement($fkProduit)) {
            // set the owning side to null (unless already changed)
            if ($fkProduit->getFkListesport() === $this) {
                $fkProduit->setFkListesport(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PRODUIT>
     */
    public function getFkProduits(): Collection
    {
        return $this->fk_produits;
    }
}
