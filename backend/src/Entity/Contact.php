<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Groups('api_contact_new')]

    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Groups('api_contact_new')]

    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Email]
    #[Groups('api_contact_new')]

    private ?string $email = null;

    #[ORM\Column(length: 555)]
    #[Assert\NotBlank]
    #[Groups('api_contact_new')]
    private ?string $message = null;

    #[ORM\ManyToOne(inversedBy: 'contacts')]
    #[Groups('api_contact_new')]

    private ?Status $status = null;

    /**
     * @var Collection<int, ReplyToConatctRequest>
     */
    #[ORM\OneToMany(targetEntity: ReplyToConatctRequest::class, mappedBy: 'Contact')]
    private Collection $replyToConatctRequests;

    public function __construct()
    {
        $this->replyToConatctRequests = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
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
     * @return Collection<int, ReplyToConatctRequest>
     */
    public function getReplyToConatctRequests(): Collection
    {
        return $this->replyToConatctRequests;
    }

    public function addReplyToConatctRequest(ReplyToConatctRequest $replyToConatctRequest): static
    {
        if (!$this->replyToConatctRequests->contains($replyToConatctRequest)) {
            $this->replyToConatctRequests->add($replyToConatctRequest);
            $replyToConatctRequest->setContact($this);
        }

        return $this;
    }

    public function removeReplyToConatctRequest(ReplyToConatctRequest $replyToConatctRequest): static
    {
        if ($this->replyToConatctRequests->removeElement($replyToConatctRequest)) {
            // set the owning side to null (unless already changed)
            if ($replyToConatctRequest->getContact() === $this) {
                $replyToConatctRequest->setContact(null);
            }
        }

        return $this;
    }

 
}
