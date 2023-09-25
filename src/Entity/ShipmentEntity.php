<?php

namespace App\Entity;

use App\Repository\USerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: ShipmentEntityRepository::class)]
#[ORM\Table(name: '`shipment_entity`')]
class ShipmentEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private string $tracknumber ;

    public function __construct()
    {
        //generate random trackumber
        $this->tracknumber = mt_rand(1000000000, 9999999999);
    }

    #[ORM\Column(length: 255)]
    private ?string $sender = null;

    #[ORM\Column(length: 255)]
    private ?string $receiver = null;

    

    #[ORM\Column(length: 255)]
    private ?string $sender_country = null; 

    #[ORM\Column(length: 255)]
    private ?string $receiver_country = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null; 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTracknumber(): int
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

   

    public function getsender_country(): ?string
    {
        return $this->sender_country;
    }

    public function setsender_country(string $sender_country): static
    {
        $this->sender_country = $sender_country;

        return $this;
    }

    public function getreceiver_country(): ?string
    {
        return $this->receiver_country;
    }

    public function setreceiver_country(string $receiver_country): static
    {
        $this->receiver_country = $receiver_country;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }


}
