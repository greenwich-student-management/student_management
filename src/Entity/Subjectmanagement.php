<?php

namespace App\Entity;

use App\Repository\SubjectmanagementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubjectmanagementRepository::class)]
class Subjectmanagement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $subjectname = null;

    #[ORM\Column(length: 255)]
    private ?string $subjectcode = null;

    #[ORM\OneToMany(mappedBy: 'subject', targetEntity: Score::class)]
    private Collection $scores;

    #[ORM\OneToMany(mappedBy: 'subject', targetEntity: Study::class)]
    private Collection $studies;

    public function __construct()
    {
        $this->scores = new ArrayCollection();
        $this->studies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubjectname(): ?string
    {
        return $this->subjectname;
    }

    public function setSubjectname(string $subjectname): self
    {
        $this->subjectname = $subjectname;

        return $this;
    }

    public function getSubjectcode(): ?string
    {
        return $this->subjectcode;
    }

    public function setSubjectcode(string $subjectcode): self
    {
        $this->subjectcode = $subjectcode;

        return $this;
    }

    /**
     * @return Collection<int, Score>
     */
    public function getScores(): Collection
    {
        return $this->scores;
    }

    public function addScore(Score $score): self
    {
        if (!$this->scores->contains($score)) {
            $this->scores->add($score);
            $score->setSubject($this);
        }

        return $this;
    }

    public function removeScore(Score $score): self
    {
        if ($this->scores->removeElement($score)) {
            // set the owning side to null (unless already changed)
            if ($score->getSubject() === $this) {
                $score->setSubject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Study>
     */
    public function getStudies(): Collection
    {
        return $this->studies;
    }

    public function addStudy(Study $study): self
    {
        if (!$this->studies->contains($study)) {
            $this->studies->add($study);
            $study->setSubject($this);
        }

        return $this;
    }

    public function removeStudy(Study $study): self
    {
        if ($this->studies->removeElement($study)) {
            // set the owning side to null (unless already changed)
            if ($study->getSubject() === $this) {
                $study->setSubject(null);
            }
        }

        return $this;
    }
}
