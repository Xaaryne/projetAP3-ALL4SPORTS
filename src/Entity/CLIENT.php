<?php

namespace App\Entity;

use App\Repository\CLIENTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: CLIENTRepository::class)]
class CLIENT implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column(length: 55)]
    private ?string $nom = null;

    #[ORM\Column(length: 55)]
    private ?string $prenom = null;

    #[ORM\Column(length: 11, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datenaissance = null;

    #[ORM\Column]
    private ?int $nbenfants = null;

    #[ORM\Column(length: 11)]
    private ?string $code = null;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: ENFANTS::class)]
    private Collection $enfants;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: CLIENTSPORTS::class)]
    private Collection $clientsport;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: COMMANDES::class)]
    private Collection $commandes;

    public function __construct()
    {
        $this->enfants = new ArrayCollection();
        $this->clientsport = new ArrayCollection();
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(?\DateTimeInterface $datenaissance): static
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getNbenfants(): ?int
    {
        return $this->nbenfants;
    }

    public function setNbenfants(int $nbenfants): static
    {
        $this->nbenfants = $nbenfants;

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

    /**
     * @return Collection<int, ENFANTS>
     */
    public function getEnfants(): Collection
    {
        return $this->enfants;
    }

    public function addEnfant(ENFANTS $enfant): static
    {
        if (!$this->enfants->contains($enfant)) {
            $this->enfants->add($enfant);
            $enfant->setClient($this);
        }

        return $this;
    }

    public function removeEnfant(ENFANTS $enfant): static
    {
        if ($this->enfants->removeElement($enfant)) {
            // set the owning side to null (unless already changed)
            if ($enfant->getClient() === $this) {
                $enfant->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CLIENTSPORTS>
     */
    public function getClientsport(): Collection
    {
        return $this->clientsport;
    }

    public function addClientsport(CLIENTSPORTS $clientsport): static
    {
        if (!$this->clientsport->contains($clientsport)) {
            $this->clientsport->add($clientsport);
            $clientsport->setClient($this);
        }

        return $this;
    }

    public function removeClientsport(CLIENTSPORTS $clientsport): static
    {
        if ($this->clientsport->removeElement($clientsport)) {
            // set the owning side to null (unless already changed)
            if ($clientsport->getClient() === $this) {
                $clientsport->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, COMMANDES>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(COMMANDES $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setClient($this);
        }

        return $this;
    }

    public function removeCommande(COMMANDES $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getClient() === $this) {
                $commande->setClient(null);
            }
        }

        return $this;
    }
}
