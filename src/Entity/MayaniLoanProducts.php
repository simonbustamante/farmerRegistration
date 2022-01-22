<?php

namespace App\Entity;

use App\Repository\MayaniLoanProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MayaniLoanProductsRepository::class)
 */
class MayaniLoanProducts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $loan_interest;

    /**
     * @ORM\OneToMany(targetEntity=FarmerLoans::class, mappedBy="mayani_loan_product_id")
     */
    private $farmerLoans;

    public function __construct()
    {
        $this->farmerLoans = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLoanInterest(): ?float
    {
        return $this->loan_interest;
    }

    public function setLoanInterest(float $loan_interest): self
    {
        $this->loan_interest = $loan_interest;

        return $this;
    }

    /**
     * @return Collection|FarmerLoans[]
     */
    public function getFarmerLoans(): Collection
    {
        return $this->farmerLoans;
    }

    public function addFarmerLoan(FarmerLoans $farmerLoan): self
    {
        if (!$this->farmerLoans->contains($farmerLoan)) {
            $this->farmerLoans[] = $farmerLoan;
            $farmerLoan->setMayaniLoanProductId($this);
        }

        return $this;
    }

    public function removeFarmerLoan(FarmerLoans $farmerLoan): self
    {
        if ($this->farmerLoans->removeElement($farmerLoan)) {
            // set the owning side to null (unless already changed)
            if ($farmerLoan->getMayaniLoanProductId() === $this) {
                $farmerLoan->setMayaniLoanProductId(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->name." (".$this->loan_interest."%)";
    }
}
