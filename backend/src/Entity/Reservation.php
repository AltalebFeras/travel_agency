<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups('api_reservation_new')]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    #[Groups('api_reservation_new')]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    #[Groups('api_reservation_new')]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    #[Groups('api_reservation_new')]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'reservations', cascade: ["persist"])]
    #[Groups('api_reservation_new')]
    private ?Trip $trip = null;

    #[ORM\ManyToOne(inversedBy: 'reservations', cascade: ["persist"])]
    #[Groups('api_reservation_new')]
    private ?Status $status = null;

    /**
     * @var Collection<int, Reply>
     */
    #[ORM\OneToMany(targetEntity: Reply::class, mappedBy: 'Reservation')]
    private Collection $replies;

    public function __construct()
    {
        $this->replies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getTrip(): ?Trip
    {
        return $this->trip;
    }

    public function setTrip(?Trip $trip): self
    {
        $this->trip = $trip;
        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Collection<int, Reply>
     */
    public function getReplies(): Collection
    {
        return $this->replies;
    }

    public function addReply(Reply $reply): static
    {
        if (!$this->replies->contains($reply)) {
            $this->replies->add($reply);
            $reply->setReservation($this);
        }

        return $this;
    }

    public function removeReply(Reply $reply): static
    {
        if ($this->replies->removeElement($reply)) {
            // set the owning side to null (unless already changed)
            if ($reply->getReservation() === $this) {
                $reply->setReservation(null);
            }
        }

        return $this;
    }
}
