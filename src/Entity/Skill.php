<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
class Skill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $duration = null;

    #[ORM\Column(length: 255)]
    private ?string $project_language = null;

    #[ORM\Column(length: 10000)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $rate = null;

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

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(float $rate): static
    {
        $this->rate = $rate;

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

	/**
	 * @return 
	 */
	public function getProject_language(): ?string {
		return $this->project_language;
	}
	
	/**
	 * @param  $project_language 
	 * @return self
	 */
	public function setProject_language(?string $project_language): static {
		$this->project_language = $project_language;
		return $this;
	}
}
