<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 555)]
    private ?string $description = null;

    /**
     * @var Collection<int, Trip>
     */
    #[ORM\ManyToMany(targetEntity: Trip::class, mappedBy: 'Category')]
    private Collection $trip_category;

    public function __construct()
    {
        $this->trip_category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Trip>
     */
    public function getTripCategory(): Collection
    {
        return $this->trip_category;
    }

    public function addTripCategory(Trip $tripCategory): static
    {
        if (!$this->trip_category->contains($tripCategory)) {
            $this->trip_category->add($tripCategory);
            $tripCategory->addCategory($this);
        }

        return $this;
    }

    public function removeTripCategory(Trip $tripCategory): static
    {
        if ($this->trip_category->removeElement($tripCategory)) {
            $tripCategory->removeCategory($this);
        }

        return $this;
    }
}