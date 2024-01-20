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
    private ?float $prixtotal = null;

    #[ORM\Column(length: 55)]
    private ?string $etat = null;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: PANIER::class)]
    private Collection $panier;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?CLIENT $client = null;

    public function __construct()
    {
        $this->panier = new ArrayCollection();
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

    public function getPrixtotal(): ?float
    {
        return $this->prixtotal;
    }

    public function setPrixtotal(float $prixtotal): static
    {
        $this->prixtotal = $prixtotal;

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
     * @return Collection<int, PANIER>
     */
    public function getPanier(): Collection
    {
        return $this->panier;
    }

    public function addPanier(PANIER $panier): static
    {
        if (!$this->panier->contains($panier)) {
            $this->panier->add($panier);
            $panier->setCommande($this);
        }

        return $this;
    }

    public function removePanier(PANIER $panier): static
    {
        if ($this->panier->removeElement($panier)) {
            // set the owning side to null (unless already changed)
            if ($panier->getCommande() === $this) {
                $panier->setCommande(null);
            }
        }

        return $this;
    }

    public function getClient(): ?CLIENT
    {
        return $this->client;
    }

    public function setClient(?CLIENT $client): static
    {
        $this->client = $client;

        return $this;
    }
}
