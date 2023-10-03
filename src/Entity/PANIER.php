<?php

namespace App\Entity;

use App\Repository\PANIERRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PANIERRepository::class)]
class PANIER
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'fk_panier')]
    #[ORM\JoinColumn(nullable: false)]
    private ?COMMANDES $fk_commandes = null;

    #[ORM\ManyToOne(inversedBy: 'fk_panier')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PRODUIT $fk_produit = null;

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

    public function getFkCommandes(): ?COMMANDES
    {
        return $this->fk_commandes;
    }

    public function setFkCommandes(?COMMANDES $fk_commandes): static
    {
        $this->fk_commandes = $fk_commandes;

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
}
