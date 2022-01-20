<?php

namespace App\Entity;

use App\Repository\B2CProductRequestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=B2CProductRequestRepository::class)
 */
class B2CProductRequest
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
     * @ORM\ManyToOne(targetEntity=MayaniProductInventory::class, inversedBy="b2CProductRequests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $inventory;

    /**
     * @ORM\Column(type="float")
     */
    private $total_debits;

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

    public function getInventory(): ?MayaniProductInventory
    {
        return $this->inventory;
    }

    public function setInventory(?MayaniProductInventory $inventory): self
    {
        $this->inventory = $inventory;

        return $this;
    }

    public function getTotalDebits(): ?float
    {
        return $this->total_debits;
    }

    public function setTotalDebits(float $total_debits): self
    {
        $this->total_debits = $total_debits;

        return $this;
    }
}
