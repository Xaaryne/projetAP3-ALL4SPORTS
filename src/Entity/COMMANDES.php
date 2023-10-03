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

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length: 55)]
    private ?string $etat = null;

    #[ORM\OneToMany(mappedBy: 'fk_commande', targetEntity: CLIENT::class)]
    private Collection $fk_client;

    #[ORM\OneToMany(mappedBy: 'fk_commandes', targetEntity: PANIER::class, orphanRemoval: true)]
    private Collection $fk_panier;

    public function __construct()
    {
        $this->fk_client = new ArrayCollection();
        $this->fk_panier = new ArrayCollection();
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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

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
    public function getFkClient(): Collection
    {
        return $this->fk_client;
    }

    public function addFkClient(CLIENT $fkClient): static
    {
        if (!$this->fk_client->contains($fkClient)) {
            $this->fk_client->add($fkClient);
            $fkClient->setFkCommande($this);
        }

        return $this;
    }

    public function removeFkClient(CLIENT $fkClient): static
    {
        if ($this->fk_client->removeElement($fkClient)) {
            // set the owning side to null (unless already changed)
            if ($fkClient->getFkCommande() === $this) {
                $fkClient->setFkCommande(null);
            }
        }

        return $this;
    }

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
}
