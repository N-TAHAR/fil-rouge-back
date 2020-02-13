<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
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
    private $district;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\District", inversedBy="events")
     * @ORM\JoinColumn(nullable=false)
     */
    private $district_id;

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

    public function getDistrictId(): ?District
    {
        return $this->district_id;
    }

    public function setDistrictId(?District $district_id): self
    {
        $this->district_id = $district_id;

        return $this;
    }
}
