<?php

namespace App\Entity;

use App\Repository\LIEUDISPONIBILITERepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/*Entité servant à faire le lien entre le produit et les magasins, elle est liée à ces deux entités*/
#[ORM\Entity(repositoryClass: LIEUDISPONIBILITERepository::class)]
class LIEUDISPONIBILITE
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;


    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etagere = null;

    #[ORM\Column(nullable: true)]
    private ?int $etage = null;

    #[ORM\ManyToOne(inversedBy: 'disponibilite')]
    private ?PRODUIT $produit = null;

    #[ORM\ManyToOne(inversedBy: 'disponibilite')]
    private ?MAGASIN $magasin = null;

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


    /**
     * @return Collection<int, MAGASIN>
     */

    public function getEtagere(): ?string
    {
        return $this->etagere;
    }

    public function setEtagere(?string $etagere): static
    {
        $this->etagere = $etagere;

        return $this;
    }

    public function getEtage(): ?int
    {
        return $this->etage;
    }

    public function setEtage(?int $etage): static
    {
        $this->etage = $etage;

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

    public function getMagasin(): ?MAGASIN
    {
        return $this->magasin;
    }

    public function setMagasin(?MAGASIN $magasin): static
    {
        $this->magasin = $magasin;

        return $this;
    }
}
