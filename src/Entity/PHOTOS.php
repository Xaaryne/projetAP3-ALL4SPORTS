<?php

namespace App\Entity;

use App\Repository\PHOTOSRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PHOTOSRepository::class)]
class PHOTOS
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 250)]
    private ?string $photo = null;

    #[ORM\OneToMany(mappedBy: 'fk_photos', targetEntity: PRODUIT::class)]
    private Collection $fk_produit;

    public function __construct()
    {
        $this->fk_produit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

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
            $fkProduit->setFkPhotos($this);
        }

        return $this;
    }

    public function removeFkProduit(PRODUIT $fkProduit): static
    {
        if ($this->fk_produit->removeElement($fkProduit)) {
            // set the owning side to null (unless already changed)
            if ($fkProduit->getFkPhotos() === $this) {
                $fkProduit->setFkPhotos(null);
            }
        }

        return $this;
    }
}
