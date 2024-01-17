<?php

namespace App\Entity;

use App\Repository\CLIENTSPORTRepository;
use Doctrine\ORM\Mapping as ORM;

/*Entité servant à faire le lien entre l'entité CLIENT et l'entité SPORT*/
#[ORM\Entity(repositoryClass: CLIENTSPORTRepository::class)]
class CLIENTSPORT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'fk_clientsport')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CLIENT $fk_client = null;

    #[ORM\ManyToOne(inversedBy: 'fk_clientsport')]
    #[ORM\JoinColumn(nullable: false)]
    private ?LISTESPORT $fk_listesport = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFkListesport(): ?LISTESPORT
    {
        return $this->fk_listesport;
    }

    public function setFkListesport(?LISTESPORT $fk_listesport): static
    {
        $this->fk_listesport = $fk_listesport;

        return $this;
    }
}
