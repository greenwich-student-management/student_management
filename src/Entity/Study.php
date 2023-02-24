<?php

namespace App\Entity;

use App\Repository\StudyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudyRepository::class)]
class Study
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Term = null;

    #[ORM\Column]
    private ?int $part = null;

    #[ORM\ManyToOne(inversedBy: 'studies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Subjectmanagement $subject = null;

    #[ORM\ManyToOne(inversedBy: 'studies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classmanagement $class = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTerm(): ?string
    {
        return $this->Term;
    }

    public function setTerm(string $Term): self
    {
        $this->Term = $Term;

        return $this;
    }

    public function getPart(): ?int
    {
        return $this->part;
    }

    public function setPart(int $part): self
    {
        $this->part = $part;

        return $this;
    }

    public function getSubject(): ?Subjectmanagement
    {
        return $this->subject;
    }

    public function setSubject(?Subjectmanagement $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getClass(): ?Classmanagement
    {
        return $this->class;
    }

    public function setClass(?Classmanagement $class): self
    {
        $this->class = $class;

        return $this;
    }
}
