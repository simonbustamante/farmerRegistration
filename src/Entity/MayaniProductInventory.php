<?php

namespace App\Entity;

use App\Repository\MayaniProductInventoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MayaniProductInventoryRepository::class)
 */
class MayaniProductInventory
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
    private $description;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_inventory_kg;

    /**
     * @ORM\Column(type="float")
     */
    private $total_value;

    /**
     * @ORM\OneToMany(targetEntity=B2CProductRequest::class, mappedBy="mayani_inventory_id")
     */
    private $b2CProductRequests;

    /**
     * @ORM\OneToMany(targetEntity=MayaniRequestInventory::class, mappedBy="mayani_product_inventory_id")
     */
    private $mayaniRequestInventories;

    public function __construct()
    {
        $this->b2CProductRequests = new ArrayCollection();
        $this->mayaniRequestInventories = new ArrayCollection();
    }

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTotalInventoryKg(): ?float
    {
        return $this->total_inventory_kg;
    }

    public function setTotalInventoryKg(float $total_inventory_kg): self
    {
        $this->total_inventory_kg = $total_inventory_kg;

        return $this;
    }

    public function getTotalValue(): ?float
    {
        return $this->total_value;
    }

    public function setTotalValue(float $total_value): self
    {
        $this->total_value = $total_value;

        return $this;
    }

    /**
     * @return Collection|B2CProductRequest[]
     */
    public function getB2CProductRequests(): Collection
    {
        return $this->b2CProductRequests;
    }

    public function addB2CProductRequest(B2CProductRequest $b2CProductRequest): self
    {
        if (!$this->b2CProductRequests->contains($b2CProductRequest)) {
            $this->b2CProductRequests[] = $b2CProductRequest;
            $b2CProductRequest->setMayaniInventoryId($this);
        }

        return $this;
    }

    public function removeB2CProductRequest(B2CProductRequest $b2CProductRequest): self
    {
        if ($this->b2CProductRequests->removeElement($b2CProductRequest)) {
            // set the owning side to null (unless already changed)
            if ($b2CProductRequest->getMayaniInventoryId() === $this) {
                $b2CProductRequest->setMayaniInventoryId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MayaniRequestInventory[]
     */
    public function getMayaniRequestInventories(): Collection
    {
        return $this->mayaniRequestInventories;
    }

    public function addMayaniRequestInventory(MayaniRequestInventory $mayaniRequestInventory): self
    {
        if (!$this->mayaniRequestInventories->contains($mayaniRequestInventory)) {
            $this->mayaniRequestInventories[] = $mayaniRequestInventory;
            $mayaniRequestInventory->setMayaniProductInventoryId($this);
        }

        return $this;
    }

    public function removeMayaniRequestInventory(MayaniRequestInventory $mayaniRequestInventory): self
    {
        if ($this->mayaniRequestInventories->removeElement($mayaniRequestInventory)) {
            // set the owning side to null (unless already changed)
            if ($mayaniRequestInventory->getMayaniProductInventoryId() === $this) {
                $mayaniRequestInventory->setMayaniProductInventoryId(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->description;
    }

}
