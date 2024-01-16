<?php

namespace App\Entity;

use App\Repository\COMMANDESRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: COMMANDESRepository::class)]
class COMMANDES
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;


    #[ORM\Column(length: 55)]
    private ?string $etat = null;


    #[ORM\ManyToOne(inversedBy: 'fk_commandes')]
    #[ORM\JoinColumn(nullable: true)]
    private ?CLIENT $fk_client = null;

    #[ORM\Column(nullable: true)]
    private ?float $prixtotal = null;

    #[ORM\OneToMany(mappedBy: 'commandes', targetEntity: PANIER::class)]
    private Collection $paniers;

    public function __construct()
    {
        $this->fk_panier = new ArrayCollection();
        $this->paniers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }


    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * @return Collection<int, CLIENT>
     */

    /**
     * @return Collection<int, PANIER>
     */
    public function getFkPanier(): Collection
    {
        return $this->fk_panier;
    }

    public function addFkPanier(PANIER $fkPanier): static
    {
        if (!$this->fk_panier->contains($fkPanier)) {
            $this->fk_panier->add($fkPanier);
            $fkPanier->setFkCommandes($this);
        }

        return $this;
    }

    public function removeFkPanier(PANIER $fkPanier): static
    {
        if ($this->fk_panier->removeElement($fkPanier)) {
            // set the owning side to null (unless already changed)
            if ($fkPanier->getFkCommandes() === $this) {
                $fkPanier->setFkCommandes(null);
            }
        }

        return $this;
    }



    public function getPrixtotal(): ?float
    {
        return $this->prixtotal;
    }

    public function setPrixtotal(?float $prixtotal): static
    {
        $this->prixtotal = $prixtotal;

        return $this;
    }

    /**
     * @return Collection<int, PANIER>
     */
    public function getPaniers(): Collection
    {
        return $this->paniers;
    }

    public function addPanier(PANIER $panier): static
    {
        if (!$this->paniers->contains($panier)) {
            $this->paniers->add($panier);
            $panier->setCommandes($this);
        }

        return $this;
    }

    public function removePanier(PANIER $panier): static
    {
        if ($this->paniers->removeElement($panier)) {
            // set the owning side to null (unless already changed)
            if ($panier->getCommandes() === $this) {
                $panier->setCommandes(null);
            }
        }

        return $this;
    }
}
