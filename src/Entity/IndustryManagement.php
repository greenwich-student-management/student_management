<?php

namespace App\Entity;

use App\Repository\IndustryManagementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IndustryManagementRepository::class)]
class IndustryManagement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $majors = null;

    #[ORM\Column(length: 255)]
    private ?string $industrycodine = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMajors(): ?string
    {
        return $this->majors;
    }

    public function setMajors(string $majors): self
    {
        $this->majors = $majors;

        return $this;
    }

    public function getIndustrycodine(): ?string
    {
        return $this->industrycodine;
    }

    public function setIndustrycodine(string $industrycodine): self
    {
        $this->industrycodine = $industrycodine;

        return $this;
    }
}
