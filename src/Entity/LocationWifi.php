<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocationWifiRepository")
 */
class LocationWifi
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
    private $LocationWifi;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $GetTotalWifi;

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

    public function getTotalWifi(): ?string
    {
        return $this->TotalWifi;
    }

    public function setTotalWifi(string $GetTotalWifi): self
    {
        $this->TotalWifi = $GetTotalWifi;

        return $this;
    }
}
