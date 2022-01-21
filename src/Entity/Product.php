<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
     * @ORM\Column(type="float")
     */
    private $price_per_kg;


    /**
     * @ORM\Column(type="float")
     */
    private $kg_per_month;

    /**
     * @ORM\ManyToOne(targetEntity=Activity::class, inversedBy="products")
     */
    private $activity_id;

    /**
     * @ORM\OneToOne(targetEntity=FarmInventory::class, mappedBy="product_id", cascade={"persist", "remove"})
     */
    private $farmInventory;

    /**
     * @ORM\ManyToOne(targetEntity=Farm::class, inversedBy="products")
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

    public function getPricePerKg(): ?float
    {
        return $this->price_per_kg;
    }

    public function setPricePerKg(float $price_per_kg): self
    {
        $this->price_per_kg = $price_per_kg;

        return $this;
    }

    

    public function getKgPerMonth(): ?float
    {
        return $this->kg_per_month;
    }

    public function setKgPerMonth(float $kg_per_month): self
    {
        $this->kg_per_month = $kg_per_month;

        return $this;
    }

    public function getActivityId(): ?Activity
    {
        return $this->activity_id;
    }

    public function setActivityId(?Activity $activity_id): self
    {
        $this->activity_id = $activity_id;

        return $this;
    }

    public function __toString()
    {
        return $this->name." ".$this->farm_id;
    }

    public function getFarmInventory(): ?FarmInventory
    {
        return $this->farmInventory;
    }

    public function setFarmInventory(?FarmInventory $farmInventory): self
    {
        // unset the owning side of the relation if necessary
        if ($farmInventory === null && $this->farmInventory !== null) {
            $this->farmInventory->setProductId(null);
        }

        // set the owning side of the relation if necessary
        if ($farmInventory !== null && $farmInventory->getProductId() !== $this) {
            $farmInventory->setProductId($this);
        }

        $this->farmInventory = $farmInventory;

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
