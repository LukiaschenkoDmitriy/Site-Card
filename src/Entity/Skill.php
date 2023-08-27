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

    #[ORM\Column(length: 255)]
    private ?string $icon_path = null;

	#[ORM\Column(length: 255)]
    private ?string $hljs_tag = null;

    #[ORM\Column(type:"text")]
    private ?string $description = null;
    #[ORM\Column(type:"text")]
    private ?string $base_description = null;
    #[ORM\Column]
    private ?float $rate = null;

    #[ORM\Column(type:"text")]
    private ?string $code = null;

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
     * Relative ../../assets
	 * @param  $project_language 
	 * @return self
	 */
	public function setProject_language(?string $project_language): static {
		$this->project_language = $project_language;
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

	/**
	 * @return 
	 */
	public function getCode(): ?string {
		return $this->code;
	}
	
	/**
	 * @param  $code 
	 * @return self
	 */
	public function setCode(?string $code): static {
		$this->code = $code;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getBase_description(): ?string {
		return $this->base_description;
	}
	
	/**
	 * @param  $base_description 
	 * @return self
	 */
	public function setBase_description(?string $base_description): static {
		$this->base_description = $base_description;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getHljs_tag(): ?string {
		return $this->hljs_tag;
	}
	
	/**
	 * @param  $hljs_tag 
	 * @return self
	 */
	public function setHljs_tag(?string $hljs_tag): static {
		$this->hljs_tag = $hljs_tag;
		return $this;
	}
}
