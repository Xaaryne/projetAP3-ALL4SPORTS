<?php

namespace App\Entity;

use App\Repository\ENFANTSRepository;
use Doctrine\ORM\Mapping as ORM;

/*Entité servant à gérer les enfants des utilisateurs elle est liée à l'entité CLIENT*/ 
#[ORM\Entity(repositoryClass: ENFANTSRepository::class)]
class ENFANTS
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\ManyToOne(inversedBy: 'fk_enfants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CLIENT $fk_client = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getFkClient(): ?CLIENT
    {
        return $this->fk_client;
    }

    public function setFkClient(?CLIENT $fk_client): static
    {
        $this->fk_client = $fk_client;

        return $this;
    }
}
