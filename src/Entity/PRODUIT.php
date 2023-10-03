<?php

namespace App\Entity;

use App\Repository\PRODUITRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PRODUITRepository::class)]
class PRODUIT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length: 150)]
    private ?string $description = null;

    #[ORM\Column(length: 55)]
    private ?string $reference = null;

    #[ORM\Column(length: 55)]
    private ?string $fournisseur = null;

    #[ORM\OneToMany(mappedBy: 'fk_produit', targetEntity: PANIER::class)]
    private Collection $fk_panier;

    #[ORM\OneToMany(mappedBy: 'fk_produit', targetEntity: LISTESPORT::class)]
    private Collection $fk_listesport;

    #[ORM\ManyToOne(inversedBy: 'fk_produit')]
    private ?LIEUDISPONIBILITE $fk_lieudisponibilite = null;

    public function __construct()
    {
        $this->fk_panier = new ArrayCollection();
        $this->fk_listesport = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getFournisseur(): ?string
    {
        return $this->fournisseur;
    }

    public function setFournisseur(string $fournisseur): static
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * @return Collection<int, PANIER>
     */
    public function getFkPanier(): Collection
    {
        return $this->fk_panier;
    }

    public function addFkPanier(PANIER $fkPanier): static
    {
        if (!$this->fk_panier->contains($fkPanier)) {
            $this->fk_panier->add($fkPanier);
            $fkPanier->setFkProduit($this);
        }

        return $this;
    }

    public function removeFkPanier(PANIER $fkPanier): static
    {
        if ($this->fk_panier->removeElement($fkPanier)) {
            // set the owning side to null (unless already changed)
            if ($fkPanier->getFkProduit() === $this) {
                $fkPanier->setFkProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LISTESPORT>
     */
    public function getFkListesport(): Collection
    {
        return $this->fk_listesport;
    }

    public function addFkListesport(LISTESPORT $fkListesport): static
    {
        if (!$this->fk_listesport->contains($fkListesport)) {
            $this->fk_listesport->add($fkListesport);
            $fkListesport->setFkProduit($this);
        }

        return $this;
    }

    public function removeFkListesport(LISTESPORT $fkListesport): static
    {
        if ($this->fk_listesport->removeElement($fkListesport)) {
            // set the owning side to null (unless already changed)
            if ($fkListesport->getFkProduit() === $this) {
                $fkListesport->setFkProduit(null);
            }
        }

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
