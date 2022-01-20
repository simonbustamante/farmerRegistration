<?php

namespace App\Entity;

use App\Repository\FarmerRegisterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FarmerRegisterRepository::class)
 */
class FarmerRegister
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
    private $middle_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $sex;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $home_address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact_number;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_of_birth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $place_of_birth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country_of_birth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $religion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $civil_status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $spouse_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $highest_education;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $government_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mayani_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $right_index;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $left_index;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $right_thumb;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $left_thumb;

    /**
     * @ORM\ManyToMany(targetEntity=Group::class, mappedBy="farmerRegister")
     */
    private $groups;

    /**
     * @ORM\OneToMany(targetEntity=FarmerBalance::class, mappedBy="farmer_id", orphanRemoval=true)
     */
    private $farmerBalances;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
        $this->farmerBalances = new ArrayCollection();
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

    public function getMiddleName(): ?string
    {
        return $this->middle_name;
    }

    public function setMiddleName(string $middle_name): self
    {
        $this->middle_name = $middle_name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(?string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getHomeAddress(): ?string
    {
        return $this->home_address;
    }

    public function setHomeAddress(string $home_address): self
    {
        $this->home_address = $home_address;

        return $this;
    }

    public function getContactNumber(): ?string
    {
        return $this->contact_number;
    }

    public function setContactNumber(string $contact_number): self
    {
        $this->contact_number = $contact_number;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->date_of_birth;
    }

    public function setDateOfBirth(\DateTimeInterface $date_of_birth): self
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->place_of_birth;
    }

    public function setPlaceOfBirth(string $place_of_birth): self
    {
        $this->place_of_birth = $place_of_birth;

        return $this;
    }

    public function getCountryOfBirth(): ?string
    {
        return $this->country_of_birth;
    }

    public function setCountryOfBirth(string $country_of_birth): self
    {
        $this->country_of_birth = $country_of_birth;

        return $this;
    }

    public function getReligion(): ?string
    {
        return $this->religion;
    }

    public function setReligion(string $religion): self
    {
        $this->religion = $religion;

        return $this;
    }

    public function getCivilStatus(): ?string
    {
        return $this->civil_status;
    }

    public function setCivilStatus(string $civil_status): self
    {
        $this->civil_status = $civil_status;

        return $this;
    }

    public function getSpouseName(): ?string
    {
        return $this->spouse_name;
    }

    public function setSpouseName(string $spouse_name): self
    {
        $this->spouse_name = $spouse_name;

        return $this;
    }

    public function getHighestEducation(): ?string
    {
        return $this->highest_education;
    }

    public function setHighestEducation(?string $highest_education): self
    {
        $this->highest_education = $highest_education;

        return $this;
    }

    public function getGovernmentId(): ?string
    {
        return $this->government_id;
    }

    public function setGovernmentId(?string $government_id): self
    {
        $this->government_id = $government_id;

        return $this;
    }

    public function getMayaniId(): ?string
    {
        return $this->mayani_id;
    }

    public function setMayaniId(string $mayani_id): self
    {
        $this->mayani_id = $mayani_id;

        return $this;
    }

    public function getRightIndex(): ?string
    {
        return $this->right_index;
    }

    public function setRightIndex(?string $right_index): self
    {
        $this->right_index = $right_index;

        return $this;
    }

    public function getLeftIndex(): ?string
    {
        return $this->left_index;
    }

    public function setLeftIndex(?string $left_index): self
    {
        $this->left_index = $left_index;

        return $this;
    }

    public function getRightThumb(): ?string
    {
        return $this->right_thumb;
    }

    public function setRightThumb(?string $right_thumb): self
    {
        $this->right_thumb = $right_thumb;

        return $this;
    }

    public function getLeftThumb(): ?string
    {
        return $this->left_thumb;
    }

    public function setLeftThumb(?string $left_thumb): self
    {
        $this->left_thumb = $left_thumb;

        return $this;
    }

    /**
     * @return Collection|Group[]
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    public function addGroup(Group $group): self
    {
        if (!$this->groups->contains($group)) {
            $this->groups[] = $group;
            $group->addFarmerRegister($this);
        }

        return $this;
    }

    public function removeGroup(Group $group): self
    {
        if ($this->groups->removeElement($group)) {
            $group->removeFarmerRegister($this);
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
            $farmerBalance->setFarmerId($this);
        }

        return $this;
    }

    public function removeFarmerBalance(FarmerBalance $farmerBalance): self
    {
        if ($this->farmerBalances->removeElement($farmerBalance)) {
            // set the owning side to null (unless already changed)
            if ($farmerBalance->getFarmerId() === $this) {
                $farmerBalance->setFarmerId(null);
            }
        }

        return $this;
    }
}
