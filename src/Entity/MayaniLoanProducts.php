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
     * @ORM\OneToMany(targetEntity=Loans::class, mappedBy="mayani_loan_product_id")
     */
    private $loans;

    public function __construct()
    {
        $this->loans = new ArrayCollection();
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
     * @return Collection|Loans[]
     */
    public function getLoans(): Collection
    {
        return $this->loans;
    }

    public function addLoan(Loans $loan): self
    {
        if (!$this->loans->contains($loan)) {
            $this->loans[] = $loan;
            $loan->setMayaniLoanProductId($this);
        }

        return $this;
    }

    public function removeLoan(Loans $loan): self
    {
        if ($this->loans->removeElement($loan)) {
            // set the owning side to null (unless already changed)
            if ($loan->getMayaniLoanProductId() === $this) {
                $loan->setMayaniLoanProductId(null);
            }
        }

        return $this;
    }
}
