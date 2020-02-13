<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DistrictRepository")
 * @ApiResource(
 * )
 */
class District
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $size;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\GreenSpace", mappedBy="district_id", orphanRemoval=true)
     */
    private $green_spaces;

    public function __construct()
    {
        $this->green_space = new ArrayCollection();
        $this->green_spaces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection|GreenSpace[]
     */
    public function getGreenSpaces(): Collection
    {
        return $this->green_spaces;
    }

    public function addGreenSpace(GreenSpace $greenSpace): self
    {
        if (!$this->green_spaces->contains($greenSpace)) {
            $this->green_spaces[] = $greenSpace;
            $greenSpace->setDistrictId($this);
        }

        return $this;
    }

    public function removeGreenSpace(GreenSpace $greenSpace): self
    {
        if ($this->green_spaces->contains($greenSpace)) {
            $this->green_spaces->removeElement($greenSpace);
            // set the owning side to null (unless already changed)
            if ($greenSpace->getDistrictId() === $this) {
                $greenSpace->setDistrictId(null);
            }
        }

        return $this;
    }
}
