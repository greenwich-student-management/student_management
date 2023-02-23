<?php

namespace App\Entity;

use App\Repository\IndustrymanagementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IndustrymanagementRepository::class)]
class Industrymanagement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $industryname = null;

    #[ORM\Column(length: 255)]
    private ?string $industrycode = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndustryname(): ?string
    {
        return $this->industryname;
    }

    public function setIndustryname(string $industryname): self
    {
        $this->industryname = $industryname;

        return $this;
    }

    public function getIndustrycode(): ?string
    {
        return $this->industrycode;
    }

    public function setIndustrycode(string $industrycode): self
    {
        $this->industrycode = $industrycode;

        return $this;
    }
}
