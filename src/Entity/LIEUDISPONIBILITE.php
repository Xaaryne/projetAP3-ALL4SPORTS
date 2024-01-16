<?php

namespace App\Entity;

use App\Repository\LIEUDISPONIBILITERepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LIEUDISPONIBILITERepository::class)]
class LIEUDISPONIBILITE
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;





    #[ORM\ManyToOne(inversedBy: 'fk_lieudisponibilite')]
    private ?MAGASIN $fk_magasin = null;

    #[ORM\ManyToOne(inversedBy: 'fk_lieudisponibilite')]
    private ?PRODUIT $fk_produit = null;


    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etagere = null;

    #[ORM\Column(nullable: true)]
    private ?int $etage = null;

    public function __construct()
    {
        $this->fk_magasin = new ArrayCollection();
    }

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
    public function getFkMagasin(): Collection
    {
        return $this->fk_magasin;
    }

    public function addFkMagasin(MAGASIN $fkMagasin): static
    {
        if (!$this->fk_magasin->contains($fkMagasin)) {
            $this->fk_magasin->add($fkMagasin);
            $fkMagasin->setFkLieudisponibilite($this);
        }

        return $this;
    }

    public function removeFkMagasin(MAGASIN $fkMagasin): static
    {
        if ($this->fk_magasin->removeElement($fkMagasin)) {
            // set the owning side to null (unless already changed)
            if ($fkMagasin->getFkLieudisponibilite() === $this) {
                $fkMagasin->setFkLieudisponibilite(null);
            }
        }

        return $this;
    }

    public function setFkProduit(PRODUIT $fk_produit): static
    {
        $this->fk_produit = $fk_produit;

        return $this;
    }

    public function setFkMagasin(?MAGASIN $fk_magasin): static
    {
        $this->fk_magasin = $fk_magasin;

        return $this;
    }

    public function getFkProduit(): ?PRODUIT
    {
        return $this->fk_produit;
    }


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
