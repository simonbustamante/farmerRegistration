<?php

namespace App\Entity;

use App\Repository\GroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupRepository::class)
 * @ORM\Table(name="`group`")
 */
class Group
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
     * @ORM\Column(type="string", length=255)
     */
    private $id_number;

    /**
     * @ORM\Column(type="datetime")
     */
    private $year_of_foundation;

    /**
     * @ORM\ManyToMany(targetEntity=Farm::class, inversedBy="groups")
     */
    private $farm;

    /**
     * @ORM\ManyToMany(targetEntity=FarmerRegister::class, mappedBy="groups")
     */
    private $farmerRegisters;

    public function __construct()
    {
        $this->farmerRegister = new ArrayCollection();
        $this->farm = new ArrayCollection();
        $this->farmerRegisters = new ArrayCollection();
    }

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

    public function getIdNumber(): ?string
    {
        return $this->id_number;
    }

    public function setIdNumber(string $id_number): self
    {
        $this->id_number = $id_number;

        return $this;
    }

    public function getYearOfFoundation(): ?\DateTimeInterface
    {
        return $this->year_of_foundation;
    }

    public function setYearOfFoundation(\DateTimeInterface $year_of_foundation): self
    {
        $this->year_of_foundation = $year_of_foundation;

        return $this;
    }

   

    /**
     * @return Collection|Farm[]
     */
    public function getFarm(): Collection
    {
        return $this->farm;
    }

    public function addFarm(Farm $farm): self
    {
        if (!$this->farm->contains($farm)) {
            $this->farm[] = $farm;
        }

        return $this;
    }

    public function removeFarm(Farm $farm): self
    {
        $this->farm->removeElement($farm);

        return $this;
    }

    public function __toString()
    {
        //dump($this->name);
        return $this->name;
    }

    /**
     * @return Collection|FarmerRegister[]
     */
    public function getFarmerRegisters(): Collection
    {
        return $this->farmerRegisters;
    }

    public function addFarmerRegister(FarmerRegister $farmerRegister): self
    {
        if (!$this->farmerRegisters->contains($farmerRegister)) {
            $this->farmerRegisters[] = $farmerRegister;
            $farmerRegister->addGroup($this);
        }

        return $this;
    }

    public function removeFarmerRegister(FarmerRegister $farmerRegister): self
    {
        if ($this->farmerRegisters->removeElement($farmerRegister)) {
            $farmerRegister->removeGroup($this);
        }

        return $this;
    }
}
