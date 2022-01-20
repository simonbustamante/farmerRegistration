<?php

namespace App\Entity;

use App\Repository\ActivityTypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActivityTypeRepository::class)
 */
class ActivityType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Farm::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $farm_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFarmId(): ?Farm
    {
        return $this->farm_id;
    }

    public function setFarmId(?Farm $farm_id): self
    {
        $this->farm_id = $farm_id;

        return $this;
    }
}
