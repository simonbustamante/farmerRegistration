<?php

namespace App\Entity;

use App\Repository\FarmerBalanceRepository;
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
     * @ORM\ManyToOne(targetEntity=Farm::class, inversedBy="farmerBalances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $farm_id;

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

    public function getFarmId(): ?Farm
    {
        return $this->farm_id;
    }

    public function setFarmId(?Farm $farm_id): self
    {
        $this->farm_id = $farm_id;

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
}
