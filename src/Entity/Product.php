<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 */
class Product
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
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=1000, nullable=true)
     */
    private $image;

    /**
     * @var int|null
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="category", type="string", length=255, nullable=true)
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=Ingredients::class)
     */
    private $ingredients;

    /**
     * @ORM\OneToOne(targetEntity=InfosNutrition::class, cascade={"persist", "remove"})
     */
    private $nutrition;

    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Ingredients[]
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredients $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
        }

        return $this;
    }

    public function removeIngredient(Ingredients $ingredient): self
    {
        $this->ingredients->removeElement($ingredient);

        return $this;
    }

    public function getNutrition(): ?InfosNutrition
    {
        return $this->nutrition;
    }

    public function setNutrition(?InfosNutrition $nutrition): self
    {
        $this->nutrition = $nutrition;

        return $this;
    }


}