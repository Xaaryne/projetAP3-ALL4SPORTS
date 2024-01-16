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




    #[ORM\Column(length: 100)]
    private ?string $nomproduit = null;


    #[ORM\OneToMany(mappedBy: 'fk_produit', targetEntity: LIEUDISPONIBILITE::class)]
    private Collection $fk_lieudisponibilite;

    #[ORM\OneToMany(mappedBy: 'fk_produit', targetEntity: LIEUSTOCKAGE::class)]
    private Collection $fk_lieustockage;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: PHOTOSPRODUIT::class)]
    private Collection $photos;

    #[ORM\ManyToOne(inversedBy: 'produit')]
    private ?LISTESPORT $listesport = null;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: PANIER::class)]
    private Collection $panier;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: LIEUDISPONIBILITE::class)]
    private Collection $disponibilite;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: LIEUSTOCKAGE::class)]
    private Collection $stockage;




    public function __construct()
    {
        $this->fk_panier = new ArrayCollection();
        $this->fk_lieudisponibilite = new ArrayCollection();
        $this->fk_lieustockage = new ArrayCollection();
        $this->photos = new ArrayCollection();
        $this->panier = new ArrayCollection();
        $this->disponibilite = new ArrayCollection();
        $this->stockage = new ArrayCollection();
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

    public function getFkLieudisponibilite(): ?LIEUDISPONIBILITE
    {
        return $this->fk_lieudisponibilite;
    }

    public function setFkLieudisponibilite(?LIEUDISPONIBILITE $fk_lieudisponibilite): static
    {
        $this->fk_lieudisponibilite = $fk_lieudisponibilite;

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

    public function getNomproduit(): ?string
    {
        return $this->nomproduit;
    }

    public function setNomproduit(string $nomproduit): static
    {
        $this->nomproduit = $nomproduit;

        return $this;
    }

    public function addFkLieudisponibilite(LIEUDISPONIBILITE $fkLieudisponibilite): static
    {
        if (!$this->fk_lieudisponibilite->contains($fkLieudisponibilite)) {
            $this->fk_lieudisponibilite->add($fkLieudisponibilite);
            $fkLieudisponibilite->setFkProduit($this);
        }

        return $this;
    }

    public function removeFkLieudisponibilite(LIEUDISPONIBILITE $fkLieudisponibilite): static
    {
        if ($this->fk_lieudisponibilite->removeElement($fkLieudisponibilite)) {
            // set the owning side to null (unless already changed)
            if ($fkLieudisponibilite->getFkProduit() === $this) {
                $fkLieudisponibilite->setFkProduit(null);
            }
        }

        return $this;
    }

    public function addFkLieustockage(LIEUSTOCKAGE $fkLieustockage): static
    {
        if (!$this->fk_lieustockage->contains($fkLieustockage)) {
            $this->fk_lieustockage->add($fkLieustockage);
            $fkLieustockage->setFkProduit($this);
        }

        return $this;
    }

    public function removeFkLieustockage(LIEUSTOCKAGE $fkLieustockage): static
    {
        if ($this->fk_lieustockage->removeElement($fkLieustockage)) {
            // set the owning side to null (unless already changed)
            if ($fkLieustockage->getFkProduit() === $this) {
                $fkLieustockage->setFkProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PHOTOSPRODUIT>
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(PHOTOSPRODUIT $photo): static
    {
        if (!$this->photos->contains($photo)) {
            $this->photos->add($photo);
            $photo->setProduit($this);
        }

        return $this;
    }

    public function removePhoto(PHOTOSPRODUIT $photo): static
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getProduit() === $this) {
                $photo->setProduit(null);
            }
        }

        return $this;
    }

    public function getListesport(): ?LISTESPORT
    {
        return $this->listesport;
    }

    public function setListesport(?LISTESPORT $listesport): static
    {
        $this->listesport = $listesport;

        return $this;
    }

    /**
     * @return Collection<int, PANIER>
     */
    public function getPanier(): Collection
    {
        return $this->panier;
    }

    public function addPanier(PANIER $panier): static
    {
        if (!$this->panier->contains($panier)) {
            $this->panier->add($panier);
            $panier->setProduit($this);
        }

        return $this;
    }

    public function removePanier(PANIER $panier): static
    {
        if ($this->panier->removeElement($panier)) {
            // set the owning side to null (unless already changed)
            if ($panier->getProduit() === $this) {
                $panier->setProduit(null);
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
            $disponibilite->setProduit($this);
        }

        return $this;
    }

    public function removeDisponibilite(LIEUDISPONIBILITE $disponibilite): static
    {
        if ($this->disponibilite->removeElement($disponibilite)) {
            // set the owning side to null (unless already changed)
            if ($disponibilite->getProduit() === $this) {
                $disponibilite->setProduit(null);
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
            $stockage->setProduit($this);
        }

        return $this;
    }

    public function removeStockage(LIEUSTOCKAGE $stockage): static
    {
        if ($this->stockage->removeElement($stockage)) {
            // set the owning side to null (unless already changed)
            if ($stockage->getProduit() === $this) {
                $stockage->setProduit(null);
            }
        }

        return $this;
    }
}
