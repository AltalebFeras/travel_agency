<?php

namespace App\Entity;

use App\Repository\TripRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TripRepository::class)]

class Trip
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('api_trip_index')]

    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups('api_trip_index' , 'api_trip_show')]

    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups('api_trip_index')]

    private ?\DateTimeInterface $departure = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups('api_trip_index')]

    private ?\DateTimeInterface $comingBack = null;

    #[ORM\Column(length: 555)]
    #[Groups('api_trip_index')]

    private ?string $description = null;

    #[ORM\Column]
    #[Groups('api_trip_index')]

    private ?int $price = null;

    /**
     * @var Collection<int, Category>
     */
    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'trip_category')]
    #[Groups('api_trip_index')]

    private Collection $Category;

    #[ORM\ManyToOne(inversedBy: 'trips')]
    #[Groups('api_trip_index')]

    private ?Destination $Destination = null;

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'trip')]
    private Collection $Reservation;

    public function __construct()
    {
        $this->Category = new ArrayCollection();
        $this->Reservation = new ArrayCollection();
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

    public function getDeparture(): ?\DateTimeInterface
    {
        return $this->departure;
    }

    public function setDeparture(\DateTimeInterface $departure): static
    {
        $this->departure = $departure;

        return $this;
    }

    public function getComingBack(): ?\DateTimeInterface
    {
        return $this->comingBack;
    }

    public function setComingBack(\DateTimeInterface $comingBack): static
    {
        $this->comingBack = $comingBack;

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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategory(): Collection
    {
        return $this->Category;
    }

    public function addCategory(Category $category): static
    {
        if (!$this->Category->contains($category)) {
            $this->Category->add($category);
        }

        return $this;
    }

    public function removeCategory(Category $category): static
    {
        $this->Category->removeElement($category);

        return $this;
    }

    public function getDestination(): ?Destination
    {
        return $this->Destination;
    }

    public function setDestination(?Destination $Destination): static
    {
        $this->Destination = $Destination;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservation(): Collection
    {
        return $this->Reservation;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->Reservation->contains($reservation)) {
            $this->Reservation->add($reservation);
            $reservation->setTrip($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->Reservation->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getTrip() === $this) {
                $reservation->setTrip(null);
            }
        }

        return $this;
    }

}
