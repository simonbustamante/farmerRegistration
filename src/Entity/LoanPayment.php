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
     * @ORM\ManyToOne(targetEntity=FarmerBalance::class, inversedBy="loanPayments")
     * @ORM\JoinColumn(nullable=true)
     */
    private $farmer_balance_id;

    /**
     * @ORM\ManyToOne(targetEntity=FarmerLoans::class, inversedBy="loanPayments")
     */
    private $loan_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $quantity_paid;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLoanId(): ?FarmerLoans
    {
        return $this->loan_id;
    }

    public function setLoanId(?FarmerLoans $loan_id): self
    {
        $this->loan_id = $loan_id;

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

    public function getQuantityPaid(): ?float
    {
        return $this->quantity_paid;
    }

    public function setQuantityPaid(float $quantity_paid): self
    {
        $this->quantity_paid = $quantity_paid;

        return $this;
    }
}
