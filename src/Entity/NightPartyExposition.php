<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NightPartyExpositionRepository")
 */
class NightPartyExposition
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
    private $TotalNightPartyExposition;

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

    public function getTotalNightPartyExposition(): ?string
    {
        return $this->TotalNightPartyExposition;
    }

    public function setTotalNightPartyExposition(string $TotalNightPartyExposition): self
    {
        $this->TotalNightPartyExposition = $TotalNightPartyExposition;

        return $this;
    }
}
