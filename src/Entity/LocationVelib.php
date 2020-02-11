<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocationVelibRepository")
 */
class LocationVelib
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
    private $LocationVelib;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocationVelib(): ?string
    {
        return $this->LocationVelib;
    }

    public function setLocationVelib(string $LocationVelib): self
    {
        $this->LocationVelib = $LocationVelib;

        return $this;
    }
}
