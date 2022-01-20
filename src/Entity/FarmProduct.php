<?php

namespace App\Entity;

use App\Repository\FarmProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FarmProductRepository::class)
 */
class FarmProduct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Farm::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $farm_id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $product_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=MayaniProductInventory::class, inversedBy="farmProducts")
     */
    private $mayani_inventory_id;

    /**
     * @ORM\Column(type="float")
     */
    private $quatity_kg;

    /**
     * @ORM\Column(type="float")
     */
    private $total_price;

    /**
     * @ORM\ManyToMany(targetEntity=MayaniProductInventory::class, mappedBy="farm_product")
     */
    private $mayaniProductInventories;

    public function __construct()
    {
        $this->mayaniProductInventories = new ArrayCollection();
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

    public function getProductId(): ?Product
    {
        return $this->product_id;
    }

    public function setProductId(?Product $product_id): self
    {
        $this->product_id = $product_id;

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

    public function getMayaniInventoryId(): ?MayaniProductInventory
    {
        return $this->mayani_inventory_id;
    }

    public function setMayaniInventoryId(?MayaniProductInventory $mayani_inventory_id): self
    {
        $this->mayani_inventory_id = $mayani_inventory_id;

        return $this;
    }

    public function getQuatityKg(): ?float
    {
        return $this->quatity_kg;
    }

    public function setQuatityKg(float $quatity_kg): self
    {
        $this->quatity_kg = $quatity_kg;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->total_price;
    }

    public function setTotalPrice(float $total_price): self
    {
        $this->total_price = $total_price;

        return $this;
    }

    /**
     * @return Collection|MayaniProductInventory[]
     */
    public function getMayaniProductInventories(): Collection
    {
        return $this->mayaniProductInventories;
    }

    public function addMayaniProductInventory(MayaniProductInventory $mayaniProductInventory): self
    {
        if (!$this->mayaniProductInventories->contains($mayaniProductInventory)) {
            $this->mayaniProductInventories[] = $mayaniProductInventory;
            $mayaniProductInventory->addFarmProduct($this);
        }

        return $this;
    }

    public function removeMayaniProductInventory(MayaniProductInventory $mayaniProductInventory): self
    {
        if ($this->mayaniProductInventories->removeElement($mayaniProductInventory)) {
            $mayaniProductInventory->removeFarmProduct($this);
        }

        return $this;
    }
}
