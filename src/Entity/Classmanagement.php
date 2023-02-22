<?php

namespace App\Entity;

use App\Repository\ClassmanagementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassmanagementRepository::class)]
class Classmanagement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $classname = null;

    #[ORM\Column(length: 255)]
    private ?string $classcode = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassname(): ?string
    {
        return $this->classname;
    }

    public function setClassname(string $classname): self
    {
        $this->classname = $classname;

        return $this;
    }

    public function getClasscode(): ?string
    {
        return $this->classcode;
    }

    public function setClasscode(string $classcode): self
    {
        $this->classcode = $classcode;

        return $this;
    }
}
