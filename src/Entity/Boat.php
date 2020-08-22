<?php

namespace App\Entity;

use App\Repository\BoatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BoatRepository::class)
 */
class Boat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Vehicle::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $vehicle;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $num_engines;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $propulsion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $power;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $passengers;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $crew;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicleId(): ?Vehicle
    {
        return $this->vehicle;
    }

    public function setVehicleId(Vehicle $vehicle): self
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    public function getNumEngines(): ?int
    {
        return $this->num_engines;
    }

    public function setNumEngines(?int $num_engines): self
    {
        $this->num_engines = $num_engines;

        return $this;
    }

    public function getPropulsion(): ?string
    {
        return $this->propulsion;
    }

    public function setPropulsion(?string $propulsion): self
    {
        $this->propulsion = $propulsion;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(?int $power): self
    {
        $this->power = $power;

        return $this;
    }

    public function getPassengers(): ?int
    {
        return $this->passengers;
    }

    public function setPassengers(?int $passengers): self
    {
        $this->passengers = $passengers;

        return $this;
    }

    public function getCrew(): ?int
    {
        return $this->crew;
    }

    public function setCrew(?int $crew): self
    {
        $this->crew = $crew;

        return $this;
    }
}
