<?php

namespace App\Entity;

use App\Repository\LISTESPORTSRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LISTESPORTSRepository::class)]
class LISTESPORTS
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $sport = null;

    #[ORM\OneToMany(mappedBy: 'sport', targetEntity: PRODUIT::class)]
    private Collection $produits;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $photos = null;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
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
     * @return Collection<int, PRODUIT>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(PRODUIT $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setSport($this);
        }

        return $this;
    }

    public function removeProduit(PRODUIT $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getSport() === $this) {
                $produit->setSport(null);
            }
        }

        return $this;
    }

    public function getPhotos(): ?string
    {
        return $this->photos;
    }

    public function setPhotos(?string $photos): static
    {
        $this->photos = $photos;

        return $this;
    }
}
