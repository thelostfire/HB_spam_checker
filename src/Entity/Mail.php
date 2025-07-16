<?php

namespace App\Entity;

use App\Repository\MailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MailRepository::class)]
class Mail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mailDomain = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMailDomain(): ?string
    {
        return $this->mailDomain;
    }

    public function setMailDomain(string $mailDomain): static
    {
        $this->mailDomain = $mailDomain;

        return $this;
    }
}
