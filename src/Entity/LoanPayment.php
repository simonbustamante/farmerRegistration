<?php

namespace App\Entity;

use App\Repository\LoanPaymentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LoanPaymentRepository::class)
 */
class LoanPayment
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
    private $quantity_paid;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_of_payment;

    /**
     * @ORM\ManyToOne(targetEntity=FarmerBalance::class)
     */
    private $farmer_balance_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantityPaid(): ?float
    {
        return $this->quantity_paid;
    }

    public function setQuantityPaid(float $quantity_paid): self
    {
        $this->quantity_paid = $quantity_paid;

        return $this;
    }

    public function getDateOfPayment(): ?\DateTimeInterface
    {
        return $this->date_of_payment;
    }

    public function setDateOfPayment(\DateTimeInterface $date_of_payment): self
    {
        $this->date_of_payment = $date_of_payment;

        return $this;
    }

    public function getFarmerBalanceId(): ?FarmerBalance
    {
        return $this->farmer_balance_id;
    }

    public function setFarmerBalanceId(?FarmerBalance $farmer_balance_id): self
    {
        $this->farmer_balance_id = $farmer_balance_id;

        return $this;
    }
}
