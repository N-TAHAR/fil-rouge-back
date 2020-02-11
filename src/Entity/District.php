<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DistrictRepository")
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
    private $green_space;

    /**
     * @ORM\Column(type="integer")
     */
    private $size;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGreenSpace(): ?string
    {
        return $this->green_space;
    }

    public function setGreenSpace(string $green_space): self
    {
        $this->green_space = $green_space;

        return $this;
    }

    public function getVelib(): ?string
    {
        return $this->Velib;
    }

    public function setVelib(string $Velib): self
    {
        $this->Velib = $Velib;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }
}
