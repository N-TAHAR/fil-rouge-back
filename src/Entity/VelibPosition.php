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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVelibPosition(): ?string
    {
        return $this->VelibPosition;
    }

    public function setVelibPosition(string $VelibPosition): self
    {
        $this->VelibPosition = $VelibPosition;

        return $this;
    }
}
