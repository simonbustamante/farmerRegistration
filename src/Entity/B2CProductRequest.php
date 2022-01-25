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
     * @ORM\ManyToOne(targetEntity=MayaniProductInventory::class, inversedBy="b2CProductRequests")
     */
    private $mayani_inventory_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $quantity_kg;

    /**
     * @ORM\Column(type="float")
     */
    private $total_debt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getTotalDebt(): ?float
    {
        return $this->total_debt;
    }

    public function setTotalDebt(float $total_debt): self
    {
        $this->total_debt = $total_debt;

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
