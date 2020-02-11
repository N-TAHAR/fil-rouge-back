<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VelibPositionRepository")
 */
class VelibPosition
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
    private $VelibPosition;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $GetTotalVelib;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDistrict(): ?string
    {
        return $this->district;
    }

    public function setDistrict(string $district): self
    {
        $this->district = $district;

        return $this;
    }

    public function getTotalVelib(): ?string
    {
        return $this->GetTotalVelib;
    }

    public function setTotalVelib(string $GetTotalVelib): self
    {
        $this->GetTotalVelib = $GetTotalVelib;

        return $this;
    }
}
