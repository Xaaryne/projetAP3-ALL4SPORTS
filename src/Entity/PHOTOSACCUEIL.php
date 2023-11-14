<?php

namespace App\Entity;

use App\Repository\PHOTOSACCUEILRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PHOTOSACCUEILRepository::class)]
class PHOTOSACCUEIL
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photos = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?LISTESPORT $listesport = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotos(): ?string
    {
        return $this->photos;
    }

    public function setPhotos(?string $photos): static
    {
        $this->photos = $photos;

        return $this;
    }

    public function getListesport(): ?LISTESPORT
    {
        return $this->listesport;
    }

    public function setListesport(?LISTESPORT $listesport): static
    {
        $this->listesport = $listesport;

        return $this;
    }
}
