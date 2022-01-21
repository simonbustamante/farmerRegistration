<?php

namespace App\Entity;

use App\Repository\InventoryUpdateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InventoryUpdateRepository::class)
 */
class InventoryUpdate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FarmInventory::class, inversedBy="inventoryUpdates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $inventory_id;

    /**
     * @ORM\Column(type="float")
     */
    private $quantity_kg;

    /**
     * @ORM\Column(type="float")
     */
    private $credit;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInventoryId(): ?FarmInventory
    {
        return $this->inventory_id;
    }

    public function setInventoryId(?FarmInventory $inventory_id): self
    {
        $this->inventory_id = $inventory_id;

        return $this;
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

    public function getCredit(): ?float
    {
        return $this->credit;
    }

    public function setCredit(float $credit): self
    {
        $this->credit = $credit;

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
}
