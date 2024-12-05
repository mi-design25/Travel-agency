<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $price = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $area = null;

    #[ORM\Column]
    private ?int $beds = null;

    #[ORM\Column]
    private ?int $baths = null;

    #[ORM\Column]
    private ?int $garages = null;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(string $area): static
    {
        $this->area = $area;

        return $this;
    }

    public function getBeds(): ?int
    {
        return $this->beds;
    }

    public function setBeds(int $beds): static
    {
        $this->beds = $beds;

        return $this;
    }

    public function getBaths(): ?int
    {
        return $this->baths;
    }

    public function setBaths(int $baths): static
    {
        $this->baths = $baths;

        return $this;
    }

    public function getGarages(): ?int
    {
        return $this->garages;
    }

    public function setGarages(int $garages): static
    {
        $this->garages = $garages;

        return $this;
    }
}
