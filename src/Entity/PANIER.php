<?php

namespace App\Entity;

use App\Repository\PANIERRepository;
use Doctrine\ORM\Mapping as ORM;

/*Entité représentant les paniers, elle est liée à COMMANDE et à PRODUIT, 
il peut avoir plusieur entrée/produit liée à une seule commande*/ 
#[ORM\Entity(repositoryClass: PANIERRepository::class)]
class PANIER
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'paniers')]
    private ?COMMANDES $commandes = null;

    #[ORM\ManyToOne(inversedBy: 'panier')]
    private ?PRODUIT $produit = null;


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

    public function getCommandes(): ?COMMANDES
    {
        return $this->commandes;
    }

    public function setCommandes(?COMMANDES $commandes): static
    {
        $this->commandes = $commandes;

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
