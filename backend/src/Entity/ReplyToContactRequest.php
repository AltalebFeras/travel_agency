<?php

namespace App\Entity;

use App\Repository\ReplyToContactRequestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReplyToContactRequestRepository::class)]
class ReplyToContactRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 999, nullable: true)]
    private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'ReplyToContactRequests')]
    private ?Contact $Contact = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->Contact;
    }

    public function setContact(?Contact $Contact): static
    {
        $this->Contact = $Contact;

        return $this;
    }
}
