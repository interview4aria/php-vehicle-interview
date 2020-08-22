<?php

namespace App\Entity;

use App\Repository\PlaneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlaneRepository::class)
 */
class Plane
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
    private $engine_type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $seating;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $crew;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicle(): ?Vehicle
    {
        return $this->vehicle;
    }

    public function setVehicle(Vehicle $vehicle): self
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

    public function getEngineType(): ?string
    {
        return $this->engine_type;
    }

    public function setEngineType(?string $engine_type): self
    {
        $this->engine_type = $engine_type;

        return $this;
    }

    public function getSeating(): ?int
    {
        return $this->seating;
    }

    public function setSeating(?int $seating): self
    {
        $this->seating = $seating;

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
