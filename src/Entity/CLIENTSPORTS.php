<?php

namespace App\Entity;

use App\Repository\CLIENTSPORTSRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CLIENTSPORTSRepository::class)]
class CLIENTSPORTS
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'clientsport')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CLIENT $client = null;

    #[ORM\ManyToOne(inversedBy: 'clientsports')]
    private ?LISTESPORTS $listesports = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getListesports(): ?LISTESPORTS
    {
        return $this->listesports;
    }

    public function setListesports(?LISTESPORTS $listesports): static
    {
        $this->listesports = $listesports;

        return $this;
    }
}
