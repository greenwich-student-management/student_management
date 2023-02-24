<?php

namespace App\Entity;

use App\Repository\MajorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MajorRepository::class)]
class Major
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $codemajor = null;

    #[ORM\Column(length: 255)]
    private ?string $namemajor = null;

    #[ORM\OneToMany(mappedBy: 'major', targetEntity: Classmanagement::class)]
    private Collection $classmanagements;

    public function __construct()
    {
        $this->classmanagements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodemajor(): ?string
    {
        return $this->codemajor;
    }

    public function setCodemajor(string $codemajor): self
    {
        $this->codemajor = $codemajor;

        return $this;
    }

    public function getNamemajor(): ?string
    {
        return $this->namemajor;
    }

    public function setNamemajor(string $namemajor): self
    {
        $this->namemajor = $namemajor;

        return $this;
    }

    /**
     * @return Collection<int, Classmanagement>
     */
    public function getClassmanagements(): Collection
    {
        return $this->classmanagements;
    }

    public function addClassmanagement(Classmanagement $classmanagement): self
    {
        if (!$this->classmanagements->contains($classmanagement)) {
            $this->classmanagements->add($classmanagement);
            $classmanagement->setMajor($this);
        }

        return $this;
    }

    public function removeClassmanagement(Classmanagement $classmanagement): self
    {
        if ($this->classmanagements->removeElement($classmanagement)) {
            // set the owning side to null (unless already changed)
            if ($classmanagement->getMajor() === $this) {
                $classmanagement->setMajor(null);
            }
        }

        return $this;
    }
}
