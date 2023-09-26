<?php

namespace App\Entity;

use App\Repository\CLIENTSPORTRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CLIENTSPORTRepository::class)]
class CLIENTSPORT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
