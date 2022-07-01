<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @Assert\NotBlank (message="Ce champ ne peut être vide.")
     */

    #[ORM\Column(type: 'string', length: 255)]
    private $Nom;
    /**
     * @Assert\NotBlank (message="Ce champ ne peut être vide.")
     */

    #[ORM\Column(type: 'string', length: 255)]
    private $Prenom;
    /**
     * @Assert\NotBlank (message="Ce champ ne peut être vide.")
     */


    #[ORM\Column(type: 'string', length: 255)]
    private $Email;
      /**
     * @Assert\NotBlank (message="Ce champ ne peut être vide.")
     */

    #[ORM\Column(type: 'text')]
    private $Message;
      /**
     * @Assert\NotBlank
     */

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(string $Message): self
    {
        $this->Message = $Message;
        return $this;
    }
}
