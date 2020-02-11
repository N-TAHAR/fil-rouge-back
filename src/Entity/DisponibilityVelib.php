<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DisponibilityVelibRepository")
 */
class DisponibilityVelib
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
    private $DisponibilityVelib;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDisponibilityVelib(): ?string
    {
        return $this->DisponibilityVelib;
    }

    public function setDisponibilityVelib(string $DisponibilityVelib): self
    {
        $this->DisponibilityVelib = $DisponibilityVelib;

        return $this;
    }
}
