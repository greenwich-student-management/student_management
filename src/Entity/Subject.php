<?php

namespace App\Entity;

use App\Repository\SubjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubjectRepository::class)]
class Subject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $namesb = null;

    #[ORM\Column(length: 255)]
    private ?string $codesb = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamesb(): ?string
    {
        return $this->namesb;
    }

    public function setNamesb(string $namesb): self
    {
        $this->namesb = $namesb;

        return $this;
    }

    public function getCodesb(): ?string
    {
        return $this->codesb;
    }

    public function setCodesb(string $codesb): self
    {
        $this->codesb = $codesb;

        return $this;
    }
}
