<?php

namespace App\Entity;

use App\Repository\MayaniRequestInventoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MayaniRequestInventoryRepository::class)
 */
class MayaniRequestInventory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $quantity_kg;

    /**
     * @ORM\Column(type="float")
     */
    private $debt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity=FarmerBalance::class, inversedBy="mayaniRequestInventories")
     */
    private $farmer_mayani;

    /**
     * @ORM\ManyToOne(targetEntity=MayaniProductInventory::class, inversedBy="mayaniRequestInventories")
     */
    private $mayani_product_inventory_id;

    /**
     * @ORM\ManyToMany(targetEntity=FarmInventory::class, inversedBy="mayaniRequestInventories")
     */
    private $farm_inventory_id;

    public function __construct()
    {
        $this->farmer_mayani = new ArrayCollection();
        $this->farm_inventory_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantityKg(): ?float
    {
        return $this->quantity_kg;
    }

    public function setQuantityKg(float $quantity_kg): self
    {
        $this->quantity_kg = $quantity_kg;

        return $this;
    }

    public function getDebt(): ?float
    {
        return $this->debt;
    }

    public function setDebt(float $debt): self
    {
        $this->debt = $debt;

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

    /**
     * @return Collection|FarmerBalance[]
     */
    public function getFarmerMayani(): Collection
    {
        return $this->farmer_mayani;
    }

    public function addFarmerMayani(FarmerBalance $farmerMayani): self
    {
        if (!$this->farmer_mayani->contains($farmerMayani)) {
            $this->farmer_mayani[] = $farmerMayani;
        }

        return $this;
    }

    public function removeFarmerMayani(FarmerBalance $farmerMayani): self
    {
        $this->farmer_mayani->removeElement($farmerMayani);

        return $this;
    }

    public function getMayaniProductInventoryId(): ?MayaniProductInventory
    {
        return $this->mayani_product_inventory_id;
    }

    public function setMayaniProductInventoryId(?MayaniProductInventory $mayani_product_inventory_id): self
    {
        $this->mayani_product_inventory_id = $mayani_product_inventory_id;

        return $this;
    }

    /**
     * @return Collection|FarmInventory[]
     */
    public function getFarmInventoryId(): Collection
    {
        return $this->farm_inventory_id;
    }

    public function addFarmInventoryId(FarmInventory $farmInventoryId): self
    {
        if (!$this->farm_inventory_id->contains($farmInventoryId)) {
            $this->farm_inventory_id[] = $farmInventoryId;
        }

        return $this;
    }

    public function removeFarmInventoryId(FarmInventory $farmInventoryId): self
    {
        $this->farm_inventory_id->removeElement($farmInventoryId);

        return $this;
    }
}
