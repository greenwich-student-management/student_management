<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $score = null;

    #[ORM\ManyToOne(inversedBy: 'scores')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Studentmanagement $student = null;

    #[ORM\ManyToOne(inversedBy: 'scores')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Subjectmanagement $subject = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(float $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getStudent(): ?Studentmanagement
    {
        return $this->student;
    }

    public function setStudent(?Studentmanagement $student): self
    {
        $this->student = $student;

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
}
