<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $language = null;
    #[ORM\Column(length: 255)]
    private ?string $gitPath = null;
    #[ORM\Column(length:10000)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function getGitPath(): ?string
    {
        return $this->gitPath;
    }

    public function setGitPath(?string $gitpath): static
    {
        $this->gitPath = $gitpath;
        
        return $this;
    }

    public function setLanguage(string $language): static
    {
        $this->language = $language;

        return $this;
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

	/**
	 * @return 
	 */
	public function getDescription(): ?string {
		return $this->description;
	}
	
	/**
	 * @param  $description 
	 * @return self
	 */
	public function setDescription(?string $description): static {
		$this->description = $description;
		return $this;
	}
}
