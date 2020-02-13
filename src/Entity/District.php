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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="district_id")
     */
    private $events;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Velib", mappedBy="district_id", orphanRemoval=true)
     */
    private $velibs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Wifi", mappedBy="district_id", orphanRemoval=true)
     */
    private $wifis;

    public function __construct()
    {
        $this->green_space = new ArrayCollection();
        $this->green_spaces = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->velibs = new ArrayCollection();
        $this->wifis = new ArrayCollection();
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

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->setDistrictId($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
            // set the owning side to null (unless already changed)
            if ($event->getDistrictId() === $this) {
                $event->setDistrictId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Velib[]
     */
    public function getVelibs(): Collection
    {
        return $this->velibs;
    }

    public function addVelib(Velib $velib): self
    {
        if (!$this->velibs->contains($velib)) {
            $this->velibs[] = $velib;
            $velib->setDistrictId($this);
        }

        return $this;
    }

    public function removeVelib(Velib $velib): self
    {
        if ($this->velibs->contains($velib)) {
            $this->velibs->removeElement($velib);
            // set the owning side to null (unless already changed)
            if ($velib->getDistrictId() === $this) {
                $velib->setDistrictId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Wifi[]
     */
    public function getWifis(): Collection
    {
        return $this->wifis;
    }

    public function addWifi(Wifi $wifi): self
    {
        if (!$this->wifis->contains($wifi)) {
            $this->wifis[] = $wifi;
            $wifi->setDistrictId($this);
        }

        return $this;
    }

    public function removeWifi(Wifi $wifi): self
    {
        if ($this->wifis->contains($wifi)) {
            $this->wifis->removeElement($wifi);
            // set the owning side to null (unless already changed)
            if ($wifi->getDistrictId() === $this) {
                $wifi->setDistrictId(null);
            }
        }

        return $this;
    }
}
