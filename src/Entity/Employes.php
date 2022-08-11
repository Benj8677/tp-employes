<?php

namespace App\Entity;

use App\Repository\EmployesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EmployesRepository::class)]
class Employes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 127)]
    #[Assert\Length(min:2, max:127, minMessage:"Le prénom doit contenir au moins {{ limit }} caractères")]
    #[Assert\NotBlank(message:"Merci de préciser le prénom de l'employé.")]
    private ?string $prenom = null;

    #[ORM\Column(length: 127)]
    #[Assert\Length(min:2, max:127, minMessage:"Le nom doit contenir au moins {{ limit }} caractères")]
    #[Assert\NotBlank(message:"Merci de préciser le nom de l'employé.")]
    private ?string $nom = null;

    #[ORM\Column(length: 15)]
    #[Assert\Length(min:10, max:15, minMessage:"Le numéro de téléphone doit contenir au moins {{ limit }} caractères")]
    #[Assert\NotBlank(message:"Merci de préciser le numéro de téléphone de l'employé.")]
    private ?string $telephone = null;

    #[ORM\Column(length: 127)]
    #[Assert\Length(min:10, max:127, minMessage:"L'e-mail doit contenir au moins {{ limit }} caractères")]
    #[Assert\NotBlank(message:"Merci de préciser l'e-mail de l'employé.")]
    #[Assert\Email(message:"Format de l'adresse e-mail non valide.")]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:10, max:255, minMessage:"L'adresse doit contenir au moins {{ limit }} caractères")]
    #[Assert\NotBlank(message:"Merci de préciser l'adresse de l'employé.")]
    private ?string $adresse = null;

    #[ORM\Column(length: 31)]
    #[Assert\NotBlank(message:"Merci de préciser le poste de l'employé.")]
    private ?string $poste = null;

    #[ORM\Column]
    #[Assert\Type("float")]
    #[Assert\NotBlank(message:"Merci de préciser le salaire de l'employé.")]
    private ?float $salaire = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datedenaissance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(float $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(\DateTimeInterface $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }
}
