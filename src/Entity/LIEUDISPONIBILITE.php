<?php

namespace App\Entity;

use App\Repository\LIEUDISPONIBILITERepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LIEUDISPONIBILITERepository::class)]
class LIEUDISPONIBILITE
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $rayon = null;

    #[ORM\ManyToOne(inversedBy: 'lieudisponibilite')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MAGASIN $magasin = null;

    #[ORM\ManyToOne(inversedBy: 'lieudisponibilite')]
    private ?PRODUIT $produit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getRayon(): ?string
    {
        return $this->rayon;
    }

    public function setRayon(?string $rayon): static
    {
        $this->rayon = $rayon;

        return $this;
    }

    public function getMagasin(): ?MAGASIN
    {
        return $this->magasin;
    }

    public function setMagasin(?MAGASIN $magasin): static
    {
        $this->magasin = $magasin;

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
