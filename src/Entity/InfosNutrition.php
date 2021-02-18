<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfosNutrition
 *
 * @ORM\Table(name="infos_nutrition")
 * @ORM\Entity
 */
class InfosNutrition
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="energy", type="integer", nullable=true)
     */
    private $energy;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fat", type="integer", nullable=true)
     */
    private $fat;

    /**
     * @var int|null
     *
     * @ORM\Column(name="glucid", type="integer", nullable=true)
     */
    private $glucid;

    /**
     * @var int
     *
     * @ORM\Column(name="fiber", type="integer", nullable=false)
     */
    private $fiber;

    /**
     * @var int
     *
     * @ORM\Column(name="protein", type="integer", nullable=false)
     */
    private $protein;

    /**
     * @var int
     *
     * @ORM\Column(name="sugar", type="integer", nullable=false)
     */
    private $sugar;

    /**
     * @var int
     *
     * @ORM\Column(name="salt", type="integer", nullable=false)
     */
    private $salt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnergy(): ?int
    {
        return $this->energy;
    }

    public function setEnergy(?int $energy): self
    {
        $this->energy = $energy;

        return $this;
    }

    public function getFat(): ?int
    {
        return $this->fat;
    }

    public function setFat(?int $fat): self
    {
        $this->fat = $fat;

        return $this;
    }

    public function getGlucid(): ?int
    {
        return $this->glucid;
    }

    public function setGlucid(?int $glucid): self
    {
        $this->glucid = $glucid;

        return $this;
    }

    public function getFiber(): ?int
    {
        return $this->fiber;
    }

    public function setFiber(int $fiber): self
    {
        $this->fiber = $fiber;

        return $this;
    }

    public function getProtein(): ?int
    {
        return $this->protein;
    }

    public function setProtein(int $protein): self
    {
        $this->protein = $protein;

        return $this;
    }

    public function getSugar(): ?int
    {
        return $this->sugar;
    }

    public function setSugar(int $sugar): self
    {
        $this->sugar = $sugar;

        return $this;
    }

    public function getSalt(): ?int
    {
        return $this->salt;
    }

    public function setSalt(int $salt): self
    {
        $this->salt = $salt;

        return $this;
    }


}
