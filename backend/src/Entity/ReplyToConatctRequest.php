<?php

namespace App\Entity;

use App\Repository\ReplyToConatctRequestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReplyToConatctRequestRepository::class)]
class ReplyToConatctRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 999, nullable: true)]
    private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'replyToConatctRequests')]
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
