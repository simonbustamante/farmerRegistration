<?php

namespace App\Entity;

use App\Repository\FarmerBalanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FarmerBalanceRepository::class)
 */
class FarmerBalance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FarmerRegister::class, inversedBy="farmerBalances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $farmer_id;


    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_debt;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_credit;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_monthly_fee;

    /**
     * @ORM\ManyToMany(targetEntity=MayaniRequestInventory::class, mappedBy="farmer_mayani")
     */
    private $mayaniRequestInventories;

    /**
     * @ORM\OneToMany(targetEntity=LoanPayment::class, mappedBy="farmer_balance_id", orphanRemoval=true)
     */
    private $loanPayments;

    /**
     * @ORM\ManyToMany(targetEntity=FarmerLoans::class, inversedBy="farmerBalances")
     */
    private $farmer_loan_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $farmer_description;

    public function __construct()
    {
        $this->mayaniRequestInventories = new ArrayCollection();
        $this->loanPayments = new ArrayCollection();
        $this->farmer_loan_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFarmerId(): ?FarmerRegister
    {
        return $this->farmer_id;
    }

    public function setFarmerId(?FarmerRegister $farmer_id): self
    {
        $this->farmer_id = $farmer_id;

        return $this;
    }

    public function getTotalDebt(): ?float
    {
        return $this->total_debt;
    }

    public function setTotalDebt(?float $total_debt): self
    {
        $this->total_debt = $total_debt;

        return $this;
    }

    public function getTotalCredit(): ?float
    {
        return $this->total_credit;
    }

    public function setTotalCredit(?float $total_credit): self
    {
        $this->total_credit = $total_credit;

        return $this;
    }

    public function getTotalMonthlyFee(): ?float
    {
        return $this->total_monthly_fee;
    }

    public function setTotalMonthlyFee(?float $total_monthly_fee): self
    {
        $this->total_monthly_fee = $total_monthly_fee;

        return $this;
    }

    /**
     * @return Collection|MayaniRequestInventory[]
     */
    public function getMayaniRequestInventories(): Collection
    {
        return $this->mayaniRequestInventories;
    }

    public function addMayaniRequestInventory(MayaniRequestInventory $mayaniRequestInventory): self
    {
        if (!$this->mayaniRequestInventories->contains($mayaniRequestInventory)) {
            $this->mayaniRequestInventories[] = $mayaniRequestInventory;
            $mayaniRequestInventory->addFarmerMayani($this);
        }

        return $this;
    }

    public function removeMayaniRequestInventory(MayaniRequestInventory $mayaniRequestInventory): self
    {
        if ($this->mayaniRequestInventories->removeElement($mayaniRequestInventory)) {
            $mayaniRequestInventory->removeFarmerMayani($this);
        }

        return $this;
    }

    /**
     * @return Collection|LoanPayment[]
     */
    public function getLoanPayments(): Collection
    {
        return $this->loanPayments;
    }

    public function addLoanPayment(LoanPayment $loanPayment): self
    {
        if (!$this->loanPayments->contains($loanPayment)) {
            $this->loanPayments[] = $loanPayment;
            $loanPayment->setFarmerBalanceId($this);
        }

        return $this;
    }

    public function removeLoanPayment(LoanPayment $loanPayment): self
    {
        if ($this->loanPayments->removeElement($loanPayment)) {
            // set the owning side to null (unless already changed)
            if ($loanPayment->getFarmerBalanceId() === $this) {
                $loanPayment->setFarmerBalanceId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FarmerLoans[]
     */
    public function getFarmerLoanId(): Collection
    {
        return $this->farmer_loan_id;
    }

    public function addFarmerLoanId(FarmerLoans $farmerLoanId): self
    {
        if (!$this->farmer_loan_id->contains($farmerLoanId)) {
            $this->farmer_loan_id[] = $farmerLoanId;
        }

        return $this;
    }

    public function removeFarmerLoanId(FarmerLoans $farmerLoanId): self
    {
        $this->farmer_loan_id->removeElement($farmerLoanId);

        return $this;
    }

    public function getFarmerDescription(): ?string
    {
        return $this->farmer_description;
    }

    public function setFarmerDescription(?string $farmer_description): self
    {
        $this->farmer_description = $farmer_description;

        return $this;
    }

    public function __toString()
    {
        return $this->farmer_description;
    }
    
}
