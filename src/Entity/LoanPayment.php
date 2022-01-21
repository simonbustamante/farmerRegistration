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
}
