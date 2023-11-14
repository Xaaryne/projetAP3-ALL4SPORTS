<?php

namespace App\Entity;

use App\Repository\PHOTOSPRODUITRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PHOTOSPRODUITRepository::class)]
class PHOTOSPRODUIT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photos = null;

    #[ORM\ManyToOne(inversedBy: 'photos')]
    private ?PRODUIT $produit = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getProduit(): ?PRODUIT
    {
        return $this->produit;
    }

    public function setProduit(?PRODUIT $produit): static
    {
        $this->produit = $produit;

        return $this;
    }
}
