<?php

namespace App\Entity;

use App\Repository\FarmInventoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FarmInventoryRepository::class)
 */
class FarmInventory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Farm::class, inversedBy="farmInventories")
     */
    private $farm_id;


    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_price;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_kg;

    /**
     * @ORM\OneToOne(targetEntity=Product::class, inversedBy="farmInventory", cascade={"persist", "remove"})
     */
    private $product_id;

    /**
     * @ORM\OneToMany(targetEntity=InventoryUpdate::class, mappedBy="inventory_id", orphanRemoval=true)
     */
    private $inventoryUpdates;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $farm_description;

    /**
     * @ORM\ManyToMany(targetEntity=MayaniRequestInventory::class, mappedBy="farm_inventory_id")
     */
    private $mayaniRequestInventories;

    public function __construct()
    {
        $this->inventoryUpdates = new ArrayCollection();
        $this->mayaniRequestInventories = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->total_price;
    }

    public function setTotalPrice(?float $total_price): self
    {
        $this->total_price = $total_price;

        return $this;
    }

    public function getTotalKg(): ?float
    {
        return $this->total_kg;
    }

    public function setTotalKg(?float $total_kg): self
    {
        $this->total_kg = $total_kg;

        return $this;
    }

    public function getProductId(): ?Product
    {
        return $this->product_id;
    }

    public function setProductId(?Product $product_id): self
    {
        $this->product_id = $product_id;

        return $this;
    }

    public function __toString()
    {
        return $this->farm_description;
    }

    /**
     * @return Collection|InventoryUpdate[]
     */
    public function getInventoryUpdates(): Collection
    {
        return $this->inventoryUpdates;
    }

    public function addInventoryUpdate(InventoryUpdate $inventoryUpdate): self
    {
        if (!$this->inventoryUpdates->contains($inventoryUpdate)) {
            $this->inventoryUpdates[] = $inventoryUpdate;
            $inventoryUpdate->setInventoryId($this);
        }

        return $this;
    }

    public function removeInventoryUpdate(InventoryUpdate $inventoryUpdate): self
    {
        if ($this->inventoryUpdates->removeElement($inventoryUpdate)) {
            // set the owning side to null (unless already changed)
            if ($inventoryUpdate->getInventoryId() === $this) {
                $inventoryUpdate->setInventoryId(null);
            }
        }

        return $this;
    }

    public function getFarmDescription(): ?string
    {
        return $this->farm_description;
    }

    public function setFarmDescription(string $farm_description): self
    {
        $this->farm_description = $farm_description;

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
            $mayaniRequestInventory->addFarmInventoryId($this);
        }

        return $this;
    }

    public function removeMayaniRequestInventory(MayaniRequestInventory $mayaniRequestInventory): self
    {
        if ($this->mayaniRequestInventories->removeElement($mayaniRequestInventory)) {
            $mayaniRequestInventory->removeFarmInventoryId($this);
        }

        return $this;
    }
}
