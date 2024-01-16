<?php

namespace App\Entity;

use App\Repository\LIEUSTOCKAGERepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LIEUSTOCKAGERepository::class)]
class LIEUSTOCKAGE
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;




    #[ORM\ManyToOne(inversedBy: 'fk_lieustockage')]
    private ?ENTREPOT $fk_entrepot = null;

    #[ORM\ManyToOne(inversedBy: 'fk_lieustockage')]
    private ?PRODUIT $fk_produit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etagere = null;

    #[ORM\Column(nullable: true)]
    private ?int $etage = null;


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
     * @return Collection<int, ENTREPOT>
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
}
