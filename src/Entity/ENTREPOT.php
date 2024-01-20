<?php

namespace App\Entity;

use App\Repository\ENTREPOTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ENTREPOTRepository::class)]
class ENTREPOT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 125)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'entrepot', targetEntity: LIEUENTREPOT::class)]
    private Collection $lieuentrepot;

    public function __construct()
    {
        $this->lieuentrepot = new ArrayCollection();
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
     * @return Collection<int, LIEUENTREPOT>
     */
    public function getLieuentrepot(): Collection
    {
        return $this->lieuentrepot;
    }

    public function addLieuentrepot(LIEUENTREPOT $lieuentrepot): static
    {
        if (!$this->lieuentrepot->contains($lieuentrepot)) {
            $this->lieuentrepot->add($lieuentrepot);
            $lieuentrepot->setEntrepot($this);
        }

        return $this;
    }

    public function removeLieuentrepot(LIEUENTREPOT $lieuentrepot): static
    {
        if ($this->lieuentrepot->removeElement($lieuentrepot)) {
            // set the owning side to null (unless already changed)
            if ($lieuentrepot->getEntrepot() === $this) {
                $lieuentrepot->setEntrepot(null);
            }
        }

        return $this;
    }
}
