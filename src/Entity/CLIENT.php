<?php

namespace App\Entity;

use App\Repository\CLIENTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CLIENTRepository::class)]
class CLIENT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $nom = null;

    #[ORM\Column(length: 55)]
    private ?string $prenom = null;

    #[ORM\Column(length: 60)]
    private ?string $mail = null;

    #[ORM\Column(length: 11)]
    private ?string $telephone = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_naissance = null;

    #[ORM\Column(length: 11)]
    private ?string $code = null;

    #[ORM\Column(nullable: true)]
    private ?int $nb_enfant = null;

    #[ORM\OneToMany(mappedBy: 'fk_client', targetEntity: ENFANTS::class, orphanRemoval: true)]
    private Collection $fk_enfants;

    #[ORM\OneToMany(mappedBy: 'fk_client', targetEntity: CLIENTSPORT::class, orphanRemoval: true)]
    private Collection $fk_clientsport;

    #[ORM\OneToMany(mappedBy: 'fk_client', targetEntity: COMMANDES::class)]
    private Collection $fk_commandes;



    public function __construct()
    {
        $this->fk_enfants = new ArrayCollection();
        $this->fk_clientsport = new ArrayCollection();
        $this->fk_commandes = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getNbEnfant(): ?int
    {
        return $this->nb_enfant;
    }

    public function setNbEnfant(?int $nb_enfant): static
    {
        $this->nb_enfant = $nb_enfant;

        return $this;
    }

    /**
     * @return Collection<int, ENFANTS>
     */
    public function getFkEnfants(): Collection
    {
        return $this->fk_enfants;
    }

    public function addFkEnfant(ENFANTS $fkEnfant): static
    {
        if (!$this->fk_enfants->contains($fkEnfant)) {
            $this->fk_enfants->add($fkEnfant);
            $fkEnfant->setFkClient($this);
        }

        return $this;
    }

    public function removeFkEnfant(ENFANTS $fkEnfant): static
    {
        if ($this->fk_enfants->removeElement($fkEnfant)) {
            // set the owning side to null (unless already changed)
            if ($fkEnfant->getFkClient() === $this) {
                $fkEnfant->setFkClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CLIENTSPORT>
     */
    public function getFkClientsport(): Collection
    {
        return $this->fk_clientsport;
    }

    public function addFkClientsport(CLIENTSPORT $fkClientsport): static
    {
        if (!$this->fk_clientsport->contains($fkClientsport)) {
            $this->fk_clientsport->add($fkClientsport);
            $fkClientsport->setFkClient($this);
        }

        return $this;
    }

    public function removeFkClientsport(CLIENTSPORT $fkClientsport): static
    {
        if ($this->fk_clientsport->removeElement($fkClientsport)) {
            // set the owning side to null (unless already changed)
            if ($fkClientsport->getFkClient() === $this) {
                $fkClientsport->setFkClient(null);
            }
        }

        return $this;
    }

    public function getFkCommande(): ?COMMANDES
    {
        return $this->fk_commande;
    }

    public function setFkCommande(?COMMANDES $fk_commande): static
    {
        $this->fk_commande = $fk_commande;

        return $this;
    }

    /**
     * @return Collection<int, COMMANDES>
     */
    public function getFkCommandes(): Collection
    {
        return $this->fk_commandes;
    }

    public function addFkCommande(COMMANDES $fkCommande): static
    {
        if (!$this->fk_commandes->contains($fkCommande)) {
            $this->fk_commandes->add($fkCommande);
            $fkCommande->setFkClient($this);
        }

        return $this;
    }

    public function removeFkCommande(COMMANDES $fkCommande): static
    {
        if ($this->fk_commandes->removeElement($fkCommande)) {
            // set the owning side to null (unless already changed)
            if ($fkCommande->getFkClient() === $this) {
                $fkCommande->setFkClient(null);
            }
        }

        return $this;
    }
}
