<?php

namespace App\Entity;

use App\Repository\MAGASINRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MAGASINRepository::class)]
class MAGASIN
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 125)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'magasin', targetEntity: LIEUDISPONIBILITE::class)]
    private Collection $lieudisponibilite;

    public function __construct()
    {
        $this->lieudisponibilite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, LIEUDISPONIBILITE>
     */
    public function getLieudisponibilite(): Collection
    {
        return $this->lieudisponibilite;
    }

    public function addLieudisponibilite(LIEUDISPONIBILITE $lieudisponibilite): static
    {
        if (!$this->lieudisponibilite->contains($lieudisponibilite)) {
            $this->lieudisponibilite->add($lieudisponibilite);
            $lieudisponibilite->setMagasin($this);
        }

        return $this;
    }

    public function removeLieudisponibilite(LIEUDISPONIBILITE $lieudisponibilite): static
    {
        if ($this->lieudisponibilite->removeElement($lieudisponibilite)) {
            // set the owning side to null (unless already changed)
            if ($lieudisponibilite->getMagasin() === $this) {
                $lieudisponibilite->setMagasin(null);
            }
        }

        return $this;
    }
}
