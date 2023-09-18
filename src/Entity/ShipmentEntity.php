<?php

namespace App\Entity;

use App\Repository\ShipmentEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShipmentEntityRepository::class)]
class ShipmentEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tracknumber = null;

    #[ORM\Column(length: 255)]
    private ?string $sender = null;

    #[ORM\Column(length: 255)]
    private ?string $receiver = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $nereden = null; // New property for origin

    #[ORM\Column(length: 255)]
    private ?string $nereye = null; // New property for destination

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTracknumber(): ?string
    {
        return $this->tracknumber;
    }

    public function setTracknumber(string $tracknumber): static
    {
        $this->tracknumber = $tracknumber;

        return $this;
    }

    public function getSender(): ?string
    {
        return $this->sender;
    }

    public function setSender(string $sender): static
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReceiver(): ?string
    {
        return $this->receiver;
    }

    public function setReceiver(string $receiver): static
    {
        $this->receiver = $receiver;

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

    public function getNereden(): ?string
    {
        return $this->nereden;
    }

    public function setNereden(string $nereden): static
    {
        $this->nereden = $nereden;

        return $this;
    }

    public function getNereye(): ?string
    {
        return $this->nereye;
    }

    public function setNereye(string $nereye): static
    {
        $this->nereye = $nereye;

        return $this;
    }
}
