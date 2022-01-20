<?php

namespace App\Entity;

use App\Repository\FarmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FarmRepository::class)
 */
class Farm
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
     * @ORM\ManyToOne(targetEntity=FarmerRegister::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $farmer_id;

    /**
     * @ORM\OneToOne(targetEntity=Location::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $location_id;

    /**
     * @ORM\ManyToMany(targetEntity=Group::class, mappedBy="farm")
     */
    private $groups;

    /**
     * @ORM\OneToMany(targetEntity=FarmerBalance::class, mappedBy="farm_id", orphanRemoval=true)
     */
    private $farmerBalances;


    public function __construct()
    {
        $this->groups = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->farmerBalances = new ArrayCollection();
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

    public function getFarmerId(): ?FarmerRegister
    {
        return $this->farmer_id;
    }

    public function setFarmerId(?FarmerRegister $farmer_id): self
    {
        $this->farmer_id = $farmer_id;

        return $this;
    }

    public function getLocationId(): ?Location
    {
        return $this->location_id;
    }

    public function setLocationId(Location $location_id): self
    {
        $this->location_id = $location_id;

        return $this;
    }

    /**
     * @return Collection|Group[]
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    public function addGroup(Group $group): self
    {
        if (!$this->groups->contains($group)) {
            $this->groups[] = $group;
            $group->addFarm($this);
        }

        return $this;
    }

    public function removeGroup(Group $group): self
    {
        if ($this->groups->removeElement($group)) {
            $group->removeFarm($this);
        }

        return $this;
    }

    /**
     * @return Collection|FarmerBalance[]
     */
    public function getFarmerBalances(): Collection
    {
        return $this->farmerBalances;
    }

    public function addFarmerBalance(FarmerBalance $farmerBalance): self
    {
        if (!$this->farmerBalances->contains($farmerBalance)) {
            $this->farmerBalances[] = $farmerBalance;
            $farmerBalance->setFarmId($this);
        }

        return $this;
    }

    public function removeFarmerBalance(FarmerBalance $farmerBalance): self
    {
        if ($this->farmerBalances->removeElement($farmerBalance)) {
            // set the owning side to null (unless already changed)
            if ($farmerBalance->getFarmId() === $this) {
                $farmerBalance->setFarmId(null);
            }
        }

        return $this;
    }

    
}
