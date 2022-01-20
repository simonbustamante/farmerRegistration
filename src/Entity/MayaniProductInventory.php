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
     * @ORM\Column(type="float")
     */
    private $current_inventory_kg;

    /**
     * @ORM\Column(type="float")
     */
    private $total_farm_product_credit;

    /**
     * @ORM\ManyToMany(targetEntity=FarmProduct::class, inversedBy="mayaniProductInventories")
     */
    private $farm_product;

    /**
     * @ORM\OneToMany(targetEntity=B2CProductRequest::class, mappedBy="inventory", orphanRemoval=true)
     */
    private $b2CProductRequests;

    public function __construct()
    {
        $this->farm_product = new ArrayCollection();
        $this->b2CProductRequests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrentInventoryKg(): ?float
    {
        return $this->current_inventory_kg;
    }

    public function setCurrentInventoryKg(float $current_inventory_kg): self
    {
        $this->current_inventory_kg = $current_inventory_kg;

        return $this;
    }

    public function getTotalFarmProductCredit(): ?float
    {
        return $this->total_farm_product_credit;
    }

    public function setTotalFarmProductCredit(float $total_farm_product_credit): self
    {
        $this->total_farm_product_credit = $total_farm_product_credit;

        return $this;
    }

    /**
     * @return Collection|FarmProduct[]
     */
    public function getFarmProduct(): Collection
    {
        return $this->farm_product;
    }

    public function addFarmProduct(FarmProduct $farmProduct): self
    {
        if (!$this->farm_product->contains($farmProduct)) {
            $this->farm_product[] = $farmProduct;
        }

        return $this;
    }

    public function removeFarmProduct(FarmProduct $farmProduct): self
    {
        $this->farm_product->removeElement($farmProduct);

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
            $b2CProductRequest->setInventory($this);
        }

        return $this;
    }

    public function removeB2CProductRequest(B2CProductRequest $b2CProductRequest): self
    {
        if ($this->b2CProductRequests->removeElement($b2CProductRequest)) {
            // set the owning side to null (unless already changed)
            if ($b2CProductRequest->getInventory() === $this) {
                $b2CProductRequest->setInventory(null);
            }
        }

        return $this;
    }
}
