<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;
    #[ORM\Column(length: 255)]
    private ?string $icon_path = null;

    #[ORM\Column(length: 255)]
    private ?string $contact = null;

    #[ORM\Column(length: 255)]
    private ?string $additional_contact = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): static
    {
        $this->contact = $contact;

        return $this;
    }

    public function getAdditionalContact(): ?string
    {
        return $this->additional_contact;
    }

    public function setAdditionalContact(string $additional_contact): static
    {
        $this->additional_contact = $additional_contact;

        return $this;
    }

	/**
	 * @return 
	 */
	public function getIcon_path(): ?string {
		return $this->icon_path;
	}
	
	/**
	 * @param  $icon_path 
	 * @return self
	 */
	public function setIcon_path(?string $icon_path): static {
		$this->icon_path = $icon_path;
		return $this;
	}
}
