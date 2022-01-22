<?php

namespace App\Entity;

use App\Repository\FarmerLoansRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FarmerLoansRepository::class)
 */
class FarmerLoans
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
    private $loan_debt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $time_to_pay;

    /**
     * @ORM\Column(type="float")
     */
    private $monthly_fee;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_of_approval;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=MayaniLoanProducts::class, inversedBy="farmerLoans")
     */
    private $mayani_loan_product_id;

    /**
     * @ORM\OneToMany(targetEntity=LoanPayment::class, mappedBy="loan_id")
     */
    private $loanPayments;

    /**
     * @ORM\ManyToMany(targetEntity=FarmerBalance::class, mappedBy="farmer_loan_id")
     */
    private $farmerBalances;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $loan_description;

    public function __construct()
    {
        $this->loanPayments = new ArrayCollection();
        $this->farmerBalances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLoanDebt(): ?float
    {
        return $this->loan_debt;
    }

    public function setLoanDebt(float $loan_debt): self
    {
        $this->loan_debt = $loan_debt;

        return $this;
    }

    public function getTimeToPay(): ?\DateTimeInterface
    {
        return $this->time_to_pay;
    }

    public function setTimeToPay(\DateTimeInterface $time_to_pay): self
    {
        $this->time_to_pay = $time_to_pay;

        return $this;
    }

    public function getMonthlyFee(): ?float
    {
        return $this->monthly_fee;
    }

    public function setMonthlyFee(float $monthly_fee): self
    {
        $this->monthly_fee = $monthly_fee;

        return $this;
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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

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
            $loanPayment->setLoanId($this);
        }

        return $this;
    }

    public function removeLoanPayment(LoanPayment $loanPayment): self
    {
        if ($this->loanPayments->removeElement($loanPayment)) {
            // set the owning side to null (unless already changed)
            if ($loanPayment->getLoanId() === $this) {
                $loanPayment->setLoanId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FarmerBalance[]
     */
    public function getFarmerBalances(): Collection
    {
        return $this->farmerBalances;
    }

    public function addFarmerBalance(FarmerBalance $farmerBalance): self
    {
        if (!$this->farmerBalances->contains($farmerBalance)) {
            $this->farmerBalances[] = $farmerBalance;
            $farmerBalance->addFarmerLoanId($this);
        }

        return $this;
    }

    public function removeFarmerBalance(FarmerBalance $farmerBalance): self
    {
        if ($this->farmerBalances->removeElement($farmerBalance)) {
            $farmerBalance->removeFarmerLoanId($this);
        }

        return $this;
    }

    public function getLoanDescription(): ?string
    {
        return $this->loan_description;
    }

    public function setLoanDescription(string $loan_description): self
    {
        $this->loan_description = $loan_description;

        return $this;
    }

    public function __toString()
    {
        return $this->loan_description;
    }
}
