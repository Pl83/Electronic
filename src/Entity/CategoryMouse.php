<?php

namespace App\Entity;

use App\Repository\CategoryMouseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryMouseRepository::class)]
class CategoryMouse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Mouse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMouse(): ?string
    {
        return $this->Mouse;
    }

    public function setMouse(string $Mouse): self
    {
        $this->Mouse = $Mouse;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}
