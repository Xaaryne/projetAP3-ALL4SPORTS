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
    private ?int $état = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'panier')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PRODUIT $produit = null;

    #[ORM\ManyToOne(inversedBy: 'panier')]
    private ?COMMANDES $commande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getétat(): ?int
    {
        return $this->état;
    }

    public function setétat(int $état): static
    {
        $this->état = $état;

        return $this;
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

    public function getProduit(): ?PRODUIT
    {
        return $this->produit;
    }

    public function setProduit(?PRODUIT $produit): static
    {
        $this->produit = $produit;

        return $this;
    }

    public function getCommande(): ?COMMANDES
    {
        return $this->commande;
    }

    public function setCommande(?COMMANDES $commande): static
    {
        $this->commande = $commande;

        return $this;
    }
}
