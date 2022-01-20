<?php

namespace App\Entity;

use App\Repository\LoansRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LoansRepository::class)
 */
class Loans
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_of_approval;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_to_pay;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $loan_quantity;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=FarmerBalance::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $farmer_balance_id;

    /**
     * @ORM\ManyToOne(targetEntity=MayaniLoanProducts::class, inversedBy="loans")
     */
    private $mayani_loan_product_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOfApproval(): ?\DateTimeInterface
    {
        return $this->date_of_approval;
    }

    public function setDateOfApproval(\DateTimeInterface $date_of_approval): self
    {
        $this->date_of_approval = $date_of_approval;

        return $this;
    }

    public function getDateToPay(): ?\DateTimeInterface
    {
        return $this->date_to_pay;
    }

    public function setDateToPay(?\DateTimeInterface $date_to_pay): self
    {
        $this->date_to_pay = $date_to_pay;

        return $this;
    }

    public function getLoanQuantity(): ?float
    {
        return $this->loan_quantity;
    }

    public function setLoanQuantity(?float $loan_quantity): self
    {
        $this->loan_quantity = $loan_quantity;

        return $this;
    }


    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

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

    public function getMayaniLoanProductId(): ?MayaniLoanProducts
    {
        return $this->mayani_loan_product_id;
    }

    public function setMayaniLoanProductId(?MayaniLoanProducts $mayani_loan_product_id): self
    {
        $this->mayani_loan_product_id = $mayani_loan_product_id;

        return $this;
    }
}
