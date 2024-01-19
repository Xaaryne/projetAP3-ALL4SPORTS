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

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 55)]
    private ?string $reference = null;

    #[ORM\Column(length: 55, nullable: true)]
    private ?string $fournisseur = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?LISTESPORTS $sport = null;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: PANIER::class)]
    private Collection $panier;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: PHOTOSPRODUIT::class)]
    private Collection $photos;

    public function __construct()
    {
        $this->panier = new ArrayCollection();
        $this->photos = new ArrayCollection();
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

    public function setDescription(?string $description): static
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

    public function setFournisseur(?string $fournisseur): static
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getSport(): ?LISTESPORTS
    {
        return $this->sport;
    }

    public function setSport(?LISTESPORTS $sport): static
    {
        $this->sport = $sport;

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
}
